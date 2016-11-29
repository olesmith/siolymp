<?php

include_once("Participants/Access.php");
include_once("Participants/Where.php");
include_once("Participants/Read.php");
include_once("Participants/Data.php");
include_once("Participants/Rows.php");
include_once("Participants/Levels.php");
include_once("Participants/Marks.php");
include_once("Participants/Latex.php");
include_once("Participants/Friend.php");
include_once("Participants/Room.php");
include_once("Participants/City.php");
include_once("Participants/Certificate.php");



class Participants extends Participants_Certificate
{
    var $Certificate_Type=2;
    
    //*
    //* function Units, Parameter list: $args=array()
    //*
    //* Constructor.
    //*

    function Participants($args=array())
    {
        $this->Hash2Object($args);
        $this->AlwaysReadData=
            array
            (
                "Unit","Event",
                "Friend","Name","SortName","Title",
                "Presence","Certificate","Certificate_CH","Code",
            );
        $this->IncludeAllDefault=TRUE;
        $this->Sort=array("SortName,Level,City");
        $this->SortsAsOrderBy=TRUE;

        $this->CellMethods[ "Participant_Envelope_Link" ]=TRUE;
    }

    //*
    //* function SqlTableName, Parameter list: $table=""
    //*
    //* Overrides SqlTableName, prepending period id.
    //* Calls ApplicationObj->SqlPeriodTableName.
    //*

    function SqlTableName($table="")
    {
        return $this->ApplicationObj()->SqlEventTableName("Participants",$table);
    }
    
    //*
    //* function PreProcessItemData, Parameter list:
    //*
    //* Post process item data; this function is called BEFORE
    //* any updating DB cols, so place any additonal data here.
    //*

    function PreProcessItemData()
    {
        array_push
        (
           $this->ItemDataFiles,
           "Data.Certificate.php"
        );
    }
    
    //*
    //* function PostProcessItemData, Parameter list:
    //*
    //* Post process item data; this function is called BEFORE
    //* any updating DB cols, so place any additonal data here.
    //*

    function PostProcessItemData()
    {
        $this->PostProcessUnitData();
        $this->PostProcessEventData();

        $this->CertificatesObj()->Sql_Table_Structure_Update();
    }

    
    
    //*
    //* function PostInit, Parameter list:
    //*
    //* Runs right after module has finished initializing.
    //*

    function PostInit()
    {
    }

    //*
    //* function PostProcess, Parameter list: $item
    //*
    //* Postprocesses and returns $item.
    //*

    function PostProcess($item)
    {
        $module=$this->GetGET("ModuleName");
        if (preg_match('/"(Participants|Inscription)$/',$module))
        {
            return $item;
        }

        if (!isset($item[ "ID" ]) || $item[ "ID" ]==0) { return $item; }

        $updatedatas=array();

        $name=$item[ "Name" ];        
        $name=preg_replace('/&nbsp;/i',"",$name);        
        $name=preg_replace('/^\s+/',"",$name);        
        $name=preg_replace('/\s+$/',"",$name);
        $name=preg_replace('/\s+/'," ",$name);
        $name=$this->TrimCase($name);

        if ($item[ "Name" ]!=$name)
        {
            $item[ "Name" ]=$name;
            array_push($updatedatas,"Name");
        }

        
        if (!empty($item[ "Mark" ]))
        {
            if (empty($item[ "Presence" ]) || $item[ "Presence" ]!=2)
            {
                $item[ "Presence" ]=2;
                $item[ "Presence_ReadOnly" ]=TRUE;
                array_push($updatedatas,"Presence");
            }
        }

        $sortname=$this->Text2Sort($item[ "Name" ]);
        $sortname=$this->Html2Sort($sortname);

        if ($item[ "SortName" ]!=$sortname)
        {
            $item[ "SortName" ]=$sortname;
            array_push($updatedatas,"SortName");
        }

        if ($item[ "Presence" ]==2)
        {
            if ($item[ "Certificate" ]!=2)
            {
                $item[ "Certificate" ]=2;
                $item[ "Certificate_CH" ]=$this->Event("Certificates_Participants_CH");
                array_push($updatedatas,"Certificate","Certificate_CH");
            }
        }
        else
        {
            if ($item[ "Certificate" ]!=1)
            {
                $item[ "Certificate" ]=1;
                $item[ "Certificate_CH" ]=0;
                array_push($updatedatas,"Certificate","Certificate_CH");
            }
        }

        $this->PostProcess_Code($item,$updatedatas);        
        $this->PostProcess_Certificate($item);
        
        if (count($updatedatas)>0)
        {
            $this->Sql_Update_Item_Values_Set($updatedatas,$item);
        }
        
        return $item;
    }
    
    //*
    //* function Participants_Noof, Parameter list: $where=array()
    //*
    //* Returns number of participants according to $where. 
    //*

    function Participants_Noof($where=array())
    {
        $where=$this->UnitEventWhere($where);
        
        return $this->Sql_Select_NHashes($where);
    }

     //*
    //* function Participant_Envelope_Link, Parameter list: $participant
    //*
    //* Returns number of participants according to $where. 
    //*

    function Participant_Envelope_Link($edit=0,$participant=array())
    {
        if (empty($participant)) { return ""; }
        
        $args=$this->CGI_URI2Hash();
        foreach (array("City","Room","Level") as $data)
        {
            $args[ $data ]=$participant[ $data ];
        }
        
        $args[ "ModuleName" ]="Cities";
        $args[ "Action" ]="Envelopes";

        return
            $this->Href
            (
                "?".$this->CGI_Hash2URI($args),
                "Envelopa",
                $title="",$target="",$class="",$noqueryargs=FALSE,$options=array(),
                $anchor="CITY"
            );
            
    }

 

    //Accumulative storage for Rooms.
    var $Rooms=array();
    
   
    //*
    //* function Participant_Room_Select_Field, Parameter list: $where=array()
    //*
    //* Generates item based $room select field.
    //*

    function Participant_Room_Select_Field($data,$item,$edit,$rdata)
    {
        $cityid=$item[ "City" ];
        if (!isset($this->Rooms[ $cityid ]))
        {
            $where=$this->UnitEventWhere(array("City" => $cityid));
            
            $this->Rooms[ $cityid ]=
                $this->RoomsObj()->Sql_Select_Hashes
                (
                   $where,
                   array("ID","Name","Capacity"),
                   "Name"
                );
        }

        $value=0;
        if (!empty($item[ $data ]))
        {
            $value=$item[ $data ];
        }
        
        return
            $this->Html_SelectField
            (
               $this->Rooms[ $cityid ],
               $rdata,
               "ID",
               "#Name",
               "#Name - #Capacity ".$this->MyMod_Data_Field(0,$item,"City"),
               $value
            ).
            "";
    }
    
    //*
    //* function PostProcess_Code, Parameter list: &$item,&$updatedatas
    //*
    //* Postprocesses inscription code.
    //*

    function PostProcess_Code(&$item,&$updatedatas)
    {
        if (
              !empty($item[ "ID" ])
              &&
              !empty($item[ "Friend" ])
              &&
              !empty($item[ "Event" ])
           )
        {
            $code=$this->CertificatesObj()->Certificate_Code($item,$this->Certificate_Type);
            if (empty($item[ "Code" ]) || $item[ "Code" ]!=$code)
            {
                $item[ "Code" ]=$code;
                array_push($updatedatas,"Code");
            }
        }
    }
    
    //*
    //* function PostProcess_Certificate, Parameter list: &$item
    //*
    //* Postprocesses $item collaboration certificate.
    //*

    function PostProcess_Certificate(&$item)
    {
        if (!empty($item[ "ID" ]))
        {
            foreach (array("Friend") as $fdata)
            {
                if (empty($item[ $fdata ])) { continue; }
                
                $where=$this->Participant_Certificate_Where($item,$item[ $fdata ]);
                $certs=$this->CertificatesObj()->Sql_Select_Hashes($where);

                if (empty($item[ "Certificate" ]) || $item[ "Certificate" ]==1)
                {
                    if (count($certs)>0)
                    {
                        $this->CertificatesObj()->Sql_Delete_Items($where);
                    }
                }
                elseif ($item[ "Certificate" ]==2)
                {
                    if (empty($certs))
                    {
                        $cert=
                            array
                            (
                               "Participant" => $item[ "ID" ],
                               "Unit"        => $this->Unit("ID"),
                               "Event"        => $item[ "Event" ],
                               "Friend"       => $item[ $fdata ],
                               "Type"         => $this->Certificate_Type,
                               "Name"         => $item[ "Name" ],
                               "Code"         => $item[ "Code" ],
                            );

                        $this->CertificatesObj()->Sql_Insert_Item($cert);
                    }
                }
            }
        }
    }

}

?>