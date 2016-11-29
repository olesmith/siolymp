<?php


include_once("../EventApp/MyInscriptions.php"); 


include_once("Inscriptions/Access.php");
include_once("Inscriptions/Overrides.php");
include_once("Inscriptions/Read.php");
include_once("Inscriptions/Tables.php");
include_once("Inscriptions/Inscribe.php");
include_once("Inscriptions/Update.php");
include_once("Inscriptions/Form.php");
include_once("Inscriptions/Latex.php");
include_once("Inscriptions/Certificate.php");
include_once("Inscriptions/Handle.php");


include_once("../Common/Barcode.php");



class Inscriptions extends InscriptionsHandle
{
    use Barcode;
    
    var $Certificate_Type=1;

    var $Load_Other_Data=TRUE;
    
    //*
    //* function Inscriptions, Parameter list: $args=array()
    //*
    //* Constructor.
    //*

    function Inscriptions($args=array())
    {
        $this->Hash2Object($args);
        $this->AlwaysReadData=array("Friend","School","Name","SortName","Unit","Event","CH");
        $this->Sort=array("SortName");
        $this->InscriptionEventTableSGroups= array
        (
           array
           (
              "Basic" => 0,
              "Inscriptions" => 0,
           ),
        );
        
        $this->InscriptionFriendLatexTableData=
            array
            (
               "Name","School",
               "INEP","Address",
               "City","Area",
               "ZIP","Phone",
               "Cell"
            );
        $this->IncludeAllDefault=TRUE;
        $this->CellMethods[ "Inscriptions_Noof_Participants"  ]=TRUE;
        $this->CellMethods[ "Inscriptions_Noof_Presents"  ]=TRUE;
    }


    //*
    //* function SqlTableName, Parameter list: $table=""
    //*
    //* Overrides SqlTableName, prepending period id.
    //* Calls ApplicationObj->SqlPeriodTableName.
    //*

    function SqlTableName($table="")
    {
        return $this->ApplicationObj->SqlEventTableName("Inscriptions",$table);
    }

    //*
    //* function PreProcessItemDataGroups, Parameter list:
    //*
    //* 
    //*

    function PreProcessItemDataGroups()
    {
        parent::PreProcessItemDataGroups();

        /* $event=$this->Event(); */
        /* if ($this->EventsObj()->Event_Certificates_Has($event)) */
        /* { */
        /*     array_push($this->ItemDataSGroupFiles,"SGroups.Certificates.php"); */
        /* } */

        if (!$this->Load_Other_Data) { return; }
    }
    
    //*
    //* function PostProcessItemDataGroups, Parameter list:
    //*
    //* 
    //*

    function PostProcessItemDataGroups()
    {
        parent::PostProcessItemDataGroups();
        
        if ($this->Current_User_Event_Coordinator_Is())
        {
        }
    }
    

    //*
    //* function PreProcessItemData, Parameter list:
    //*
    //* Post process item data; this function is called BEFORE
    //* any updating DB cols, so place any additonal data here.
    //*

    function PreProcessItemData()
    {
        parent::PreProcessItemData();

        array_push
        (
           $this->ItemDataFiles,
           "Data.Certificate.php"
        );
        
        /* $event=$this->Event(); */
        /* if ($this->EventsObj()->EventCertificates($event)) */
        /* { */
        /*     $this->CertificatesObj()->ItemData("ID"); */
        /* } */
        
        if (!$this->Load_Other_Data) { return; }
    }
    
    //*
    //* function MyMod_Setup_ProfilesDataFile, Parameter list:
    //*
    //* Returns name of file with Permissions and Accesses to Modules.
    //* Overrides trait!
    //*

    function MyMod_Setup_ProfilesDataFile()
    {
        return "System/Inscriptions/Profiles.php";
    }
    
    //*
    //* function PostProcessItemData, Parameter list:
    //*
    //* Post process item data; this function is called BEFORE
    //* any updating DB cols, so place any additonal data here.
    //*

    function PostProcessItemData()
    {
        parent::PostProcessItemData();
    }

    //*
    //* function PostInit, Parameter list:
    //*
    //* Runs right after module has finished initializing.
    //*

    function PostInit()
    {
        parent::PostInit();
    }

    //*
    //* function PostProcess, Parameter list: $item
    //*
    //* Postprocesses and returns $item.
    //*

    function PostProcess($item)
    {
        $module=$this->GetGET("ModuleName");
        if (!preg_match('/^(Inscriptions|Events)$/',$module))
        {
            return $item;
        }

        if (empty($item[ "ID" ])) { return $item; }

        $item=parent::PostProcess($item);

        $updatedatas=array();

        $this->PostProcess_Friend_Data($item,$updatedatas);
        $this->PostProcess_Code($item,$updatedatas);
        $this->PostProcess_Certificate($item,$updatedatas);
        $this->PostProcess_Certificate_CH($item,$updatedatas);
        
        if (count($updatedatas)>0)
        {
            $this->Sql_Update_Item_Values_Set($updatedatas,$item);
        }
        
        return $item;
    }
    
    //*
    //* function Certificate_Code, Parameter list: $item
    //*
    //* Generates certificate code.
    //*

    function Certificate_Code($item)
    {
        return $this->CertificatesObj()->Certificate_Code($item,$this->Certificate_Type);
    }
    
    
    //*
    //* function PostProcessFriendData, Parameter list: &$item,&$updatedatas
    //*
    //* Postprocesses and returns $item.
    //*

    function PostProcess_Friend_Data(&$item,&$updatedatas)
    {
        $this->MakeSureWeHaveRead("",$item,array("Friend","Name","SortName","Email"));
        $friend=
            $this->FriendsObj()->Sql_Select_Hash
            (
                array("ID" => $item[ "Friend" ]),
                array("ID","Name","School","SortName","Email")
            );
        

        if (empty($item[ "Name" ]) || $item[ "Name" ]!=$friend[ "Name" ])
        {
            $item[ "Name" ]=$friend[ "Name" ];
            array_push($updatedatas,"Name");
        }
        
        if (empty($item[ "Email" ]) || $item[ "Email" ]!=$friend[ "Email" ])
        {
            $item[ "Email" ]=$friend[ "Email" ];
            array_push($updatedatas,"Email");
        }

        $friend[ "SortName" ]=$this->Html2Sort($friend[ "School" ]." ".$friend[ "Name" ]);
        if (empty($item[ "SortName" ]) || $item[ "SortName" ]!=$friend[ "SortName" ])
        {
            $item[ "SortName" ]=$friend[ "SortName" ];
            array_push($updatedatas,"SortName");
        }
    }
    
    //*
    //* function PostProcessCertificate, Parameter list: &$item,&$updatedatas
    //*
    //* Postprocesses inscription certificate.
    //*

    function PostProcess_Certificate(&$item,&$updatedatas)
    {
        $nparts=
            $this->ParticipantsObj()->Sql_Select_NHashes
            (
                array
                (
                    "Unit" =>  $item[ "Unit" ],
                    "Event" => $item[ "Event" ],
                    "Friend" => $item[ "Friend" ],
                    "Certificate" => 2,
                )
            );
        
        $cert=1;
        if ($nparts>0)
        {
            $cert=2;
        }

        if (empty($item[ "Certificate" ]) || $cert!=$item[ "Certificate" ])
        {
            $item[ "Certificate" ]=$cert;
            array_push($updatedatas,"Certificate");
        }

        if (!empty($item[ "Certificate" ]))
        {
            $where=$this->Inscription_Certificate_Where($item,$this->Certificate_Type);

            $certs=$this->CertificatesObj()->Sql_Select_Hashes($where);

            if ($item[ "Certificate" ]==1)
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
                           "Inscription" => $item[ "ID" ],
                           "Unit"        => $item[ "Unit" ],
                           "Event"        => $item[ "Event" ],
                           "Friend"       => $item[ "Friend" ],
                           "Type"         => $this->Certificate_Type,
                           "Name"         => $item[ "Name" ],
                           "Code"         => $item[ "Code" ],
                        );

                    $this->CertificatesObj()->Sql_Insert_Item($cert);
                }
            }
        }
    }

    
    //*
    //* function PostProcessCode, Parameter list: &$item,&$updatedatas
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
            $code=$this->Certificate_Code($item);
            if (!empty($code) && empty($item[ "Code" ]) || $item[ "Code" ]!=$code)
            {
                $item[ "Code" ]=$code;
                array_push($updatedatas,"Code");
            }
        }
    }

    

    //*
    //* function PostProcess_Certificate, Parameter list: &$item,&$updatedatas
    //*
    //* Postprocesses and returns $item.
    //*

    function PostProcess_Certificate_CH(&$item,&$updatedatas)
    {
        $event=$this->Event();
        if ($this->EventsObj()->EventCertificates($event))
        {
            $this->MakeSureWeHaveRead("",$item,array("Certificate","Certificate_CH"));

            if (!empty($item[ "Certificate" ]) && $item[ "Certificate" ]==2)
            {
                if (empty($item[ "Certificate_CH" ]))
                {
                    $item[ "Certificate_CH" ]=$event[ "Certificates_CH" ];
                    array_push($updatedatas,"Certificate_CH");
                }
            }
        }
    }

    
    //*
    //* function InitPrint, Parameter list: $item
    //*
    //* Does some casing before printing.
    //*

    function InitPrint($item)
    {
        $item[ "Name" ]=$this->TrimCase($item[ "Name" ]);

        return $item;
    }
    
     //*
    //* function Inscriptions_Noof_Participants, Parameter list: $inscription=array()
    //*
    //* Returns number of participants registered for $inscription.
    //*

    function Inscriptions_Noof_Participants($inscription=array())
    {
        if (empty($inscription))
        {
            return $this->Language_Message("Inscriptions_NoParticipants_Message");
        }
        
        return
            $this->ParticipantsObj()->Sql_Select_NHashes
            (
                $this->UnitEventWhere
                (
                    array
                    (
                        "Friend" => $inscription[ "Friend" ],
                    )
                )
            );
    }
    
     //*
    //* function Inscriptions_Noof_Presents, Parameter list: $inscription=array()
    //*
    //* Returns number of participants registered for $inscription.
    //*

    function Inscriptions_Noof_Presents($inscription=array())
    {
        if (empty($inscription))
        {
            return $this->Language_Message("Inscriptions_NoPresents_Message");
        }
        
        return
            $this->ParticipantsObj()->Sql_Select_NHashes
            (
                $this->UnitEventWhere
                (
                    array
                    (
                        "Friend" => $inscription[ "Friend" ],
                        "Presence" => 2,
                    )
                )
            );
    }
    
    
}

?>