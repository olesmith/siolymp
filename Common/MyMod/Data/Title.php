<?php

trait MyMod_Data_Title
{
    function MyMod_Data_Titles($datas,$nohtml=0)
    {
        $titles=array();
        for ($n=0;$n<count($datas);$n++)
        {
            $titles[$n]=$this->MyMod_Data_Title($datas[$n],$nohtml);
        }

        return $titles;
    }


    function MyMod_Data_Title($data,$nohtml=0)
    {
        if (is_array($data)) { $data=array_shift($data); }
      
        $title="";
        if ($data=="No")
        {
            $title="No";
        }
        elseif (preg_match('/^text_/',$data))
        {
            return "";
        }
        /* elseif (!empty($this->ItemFieldMethods[ $data ])) */
        /* { */
        /*     $method=$this->ItemFieldMethods[ $data ]; */
        /*     return $this->$method(); */
        /* } */
        elseif (isset($this->ItemDerivedData[ $data ]))
        {
            if ($this->ItemDerivedData[ $data ][ $this->TitleKeyName ]!="")
            {
                $title=$this->GetRealNameKey($this->ItemDerivedData[ $data ],$this->TitleKeyName);
            }
        }
        elseif (isset($this->ItemData[ $data ]))
        {
            $itemdata=$this->ItemData[ $data ];
            if (!empty($itemdata[ $this->TitleKeyShortName ]))
            {
                $title=$this->GetRealNameKey($this->ItemData[ $data ],$this->TitleKeyShortName);
            }
            elseif (!empty($itemdata[ $this->TitleKeyName ]))
            {
                $title=$this->GetRealNameKey($this->ItemData[ $data ],$this->TitleKeyName);
            }
            elseif (!empty($itemdata[ $this->TitleKeyTitle ]))
            {
                $title=$this->GetRealNameKey($this->ItemData[ $data ],$this->TitleKeyTitle);
            }
        }
        elseif (isset($this->Actions[ $data ]))
        {
            $action=$this->Actions[ $data ];
            return "";
            if (!empty($action[ $this->TitleKeyName ]))
            {
                $title=$this->GetRealNameKey($this->Actions[ $data ],$this->TitleKeyName);
            }
        }
        elseif (method_exists($this,$data) && !empty( $this->CellMethods[ $data ]))
        {
            $title=$this->$data();

            if (is_array($title)) { $title=""; }
        }
        else
        {
            $comps=preg_split('/_/',$data);
            if (count($comps)>1)
            {
                $pridata=array_shift($comps);
                $secdata=join("_",$comps);

                if (isset($this->ItemData[ $pridata ]) && is_array($this->ItemData[ $pridata ]))
                {
                    if ($this->ItemData[ $pridata ][ "SqlObject" ]!="")
                    {
                        $object=$this->ItemData[ $pridata ][ "SqlObject" ];
                        $title=
                            $this->GetDataTitle($pridata,$nohtml).", ".
                            $this->$object->GetDataTitle($secdata,$nohtml);
                    }
                }
            }
        }

        //if ($title=="") { $title=$data; }

        return $title;
    }
}

?>