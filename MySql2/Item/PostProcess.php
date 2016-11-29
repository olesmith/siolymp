<?php

class ItemPostProcess extends ItemReads
{

    var $PostProcessed=array();

    //*
    //* function PostInitItem, Parameter list:
    //*
    //* Post Initializer. Should be called when data definitions has been read.
    //* Gathers allowed Data SGroups, Single Item Groups, based on LoginType.
    //*

    function PostInitItem()
    {
        if (!is_array($this->ItemDataSGroups)) { return; }

        $rgroups=array();
        foreach ($this->ItemDataSGroups as $groupname => $group)
        {
            //Check if group allowed
            if ($this->ItemDataSGroups[ $groupname ][ $this->LoginType ]>0)
            {
                array_push($rgroups,$groupname);
            }
        }

        $this->ItemDataSGroupNames=$rgroups;
    }


    //*
    //* function PostProcessItem, Parameter list: $item
    //*
    //* Post process item. That is: calls TrimCaseItem,
    //* if $this->ItemPostProcessor is set, and is
    //* a method, this method is called for post specialized
    //* post processing.
    //* Finally, call TestItem.
    //* Returns modified item.
    //*

    function PostProcessItem($item)
    {
        if (
            !isset($item[ "ID" ])
            ||
            isset($this->PostProcessed[ $item[ "ID" ] ])
           )
        {
            return $item;
        }

        $ritem=$this->ApplyAllEnums($item);
        $updatedatas=array();

        foreach ($this->DatasRead as $id => $data)
        {
            $hashdef=$this->ItemData($data);
            if (empty($hashdef)) { continue; }
            if (empty($item[ $data ])) { continue; }
            
            $value=preg_replace('/^\s*/',"",$item[ $data ]);
            $value=preg_replace('/\s*$/',"",$value);
            $value=preg_replace('/&#39;/',"'",$value);

            if (!empty($hashdef[ "Format" ]))
            {
                $value=sprintf($hashdef[ "Format" ],$value);
            }

            if ($item[ $data ]!=$value)
            {
                $item[ $data ]!=$value;
                array_push($updatedatas,$data);
            }
            
            $postdata=$this->ItemData($data,"Post_Data");
            if (!empty($postdata))
            {
                $this->MyMod_Item_PostProcess_Data($item,$data,$updatedatas);
            }
        }

        if (count($updatedatas)>0)
        {
            $this->Sql_Update_Item_Values_Set($updatedatas,$item);
        }
        
        $item=$this->MyMod_Item_PostProcess_Trim($item);

        $post=$this->ItemPostProcessor;
        if ($post=="")
        {
            $post="PostProcess";
        }

        if (method_exists($this,$post))
        {
            $item=$this->$post($item);
        }
        else
        {
            $this->AddMsg("Warning! No such postprocessor: $post");
        }

        $item=$this->TestItem($item);

        if (isset($item[ "ID" ]))
        {
            $this->PostProcessed[ $item[ "ID" ] ]=TRUE;
        }

        return $item;
    }

    //*
    //* function PostProcessSqlObjects, Parameter list: $item
    //*
    //* 
    //*

    function PostProcessNestedData($item,$datadefs)
    {
        $updatedatas=array();
        foreach ($datadefs as $n => $datadef)
        {
            $startdata1=$datadef[ "From1" ];
            $startdata2=$datadef[ "From2" ];
            if ($startdata2=="") { $startdata2=$startdata1; }

            $destdata=$datadef[ "Dest" ];

            if (isset($item[ $startdata1 ]))
            {
                if (
                    isset($item[ $startdata2 ])
                    &&
                    $item[ $startdata2 ]>0
                    &&
                    (
                     !isset($item[ $destdata ])
                     ||
                     $item[ $destdata ]!=$item[ $startdata2 ]
                    )
                   )
                {
                    $item[ $destdata ]=$item[ $startdata2 ];
                    array_push($updatedatas,$destdata);
                }
            }
        }

        if (count($updatedatas)>0)
        {
            //var_dump($updatedatas);
            $this->MySqlSetItemValues
            (
               "",
               $updatedatas,
               $item
            );
        }

        return $item;
    }

}
?>