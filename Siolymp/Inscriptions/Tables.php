<?php



class InscriptionsTables extends InscriptionsRead
{
    //*
    //* function InscriptionSGroupsTable, Parameter list: $edit,$buttons=FALSE,$inscription=array(),$includeassessments=FALSE
    //*
    //* Creates Inscription edit table as matrix.
    //*

    function InscriptionSGroupsTable($edit,$inscription)
    {
        $submit=
            $this->GetMessage($this->HtmlMessages,"SendButton").
            " ".
            $this->MyMod_ItemName();

        $buttons="";
        if ($edit==1) { $buttons=$this->Buttons($submit); }
        
        $this->SGroups_NumberItems=FALSE;

        return
            $this->MyMod_Item_Group_Tables_Form
            (
               $edit,
               "Update",
               $this->MyMod_Item_SGroups($edit),
               $inscription,
               FALSE,  //mayupdate, done elsewhere
               FALSE, //plural
               "",
               $buttons
            );
    }
    
    //*
    //* function Inscription_Event_Info, Parameter list: 
    //*
    //* Returns event info.
    //*

    function Inscription_Event_Info()
    {
        $eventmessage=$this->EventsObj()->Event_Inscriptions_Info();
        if (!empty($eventmessage))
        {
            $eventmessage=$this->FrameIt($eventmessage);
        }
        
        return $eventmessage;
    }
    
    //*
    //* function InscriptionTable, Parameter list: $edit,$buttons=FALSE,$inscription=array(),$includeassessments=FALSE
    //*
    //* Creates Inscription edit table as matrix.
    //*

    function InscriptionTable($edit,$buttons=FALSE,$inscription=array(),$includeassessments=FALSE)
    {
        if (empty($inscription)) { $inscription=$this->Inscription; }

        $submit=
            $this->GetMessage($this->HtmlMessages,"SendButton").
            " ".
            $this->MyMod_ItemName();

        $buttons="";
        if ($edit==1 && !empty($inscription[ "ID" ])) { $buttons=$this->Buttons($submit); }
        
        $this->SGroups_NumberItems=FALSE;

        $table=array($this->InscriptionSGroupsTable($edit,$inscription));
        

        if (empty($inscription[ "ID" ]) && $edit==1 && $buttons)
        {
            $title="";
            if (!empty($inscription[ "ID" ]))
            {
                $title=$this->MyLanguage_GetMessage("Inscription_Button_Inscribed");
            }
            else
            {
                $title=$this->MyLanguage_GetMessage("Inscription_Button_Inscribe");
            }
            
            array_push($table,$this->Button("submit",$title));
        }

        array_unshift
        (
           $table,
           $this->Anchor("INSCR").
           $this->InscriptionDiagList($inscription)
        );

        array_push
        (
           $table,
           $this->Anchor("TABLE").
           $this->Inscription_Event_Info()
        );
        
        return $table;
    }
    
    //* function Inscription_Event_Typed_Tables, Parameter list: $edit,$friend,$inscription
    //*
    //* Creates Event typed tables:
    //*
    //* Pariticpants ifno.
    //*
    //*

    function Inscription_Event_Typed_Tables($edit,$friend,$inscription)
    {
        if (empty($inscription[ "ID" ])) { return ""; }
 
        $where=$this->UnitWhere(array("ID" => $inscription[ "Friend" ]));
                                
        $friend=$this->FriendsObj()->Sql_Select_Hash($where);

        $friend[ "City" ]=$inscription[ "City" ];

        if (preg_match('/^(Admin|Coordinator)$/',$this->Profile())) { $edit=1; }
        
        $tables=array
        (
           $this->ParticipantsObj()->Participants_Friend_Form
           (
              $edit,
              $friend,
              $this->Inscription_Event_Typed_Menu($inscription)
           )
        );
        
        if (!empty($tables))
        {
            return
                $this->Html_Table("",$tables).
                "";
        }

        return "";
    }
    
    //* function Inscription_Event_Print_Link, Parameter list: $inscription,$action="Inscription"
    //*
    //* Creates $inscriptions print link.
    //*
    //*

    function Inscription_Event_Print_Link($inscription,$action="Inscription")
    {
        $this->Actions[ $action ][ "HrefArgs" ].="&Latex=1";

        $keys=preg_grep('/^(Name|Title)/',array_keys($this->Actions[ $action ]));
        $paction="Latex";
        
        foreach ($keys as $key)
        {
            //$this->Actions[ $action ][ $key ]=$this->Actions[ $paction ][ $key ];
        }

        return $this->MyActions_Entry($action,$inscription,TRUE);
    }

    
    //* function Inscription_Event_Typed_Menu, Parameter list: $inscription
    //*
    //* Creates Event typed tables:
    //*
    //* Pariticpants info.
    //*
    //*

    function Inscription_Event_Typed_Menu($inscription)
    {
        return
            $this->MyMod_HorMenu_Actions
            (
                $this->MyMod_HorMenu_Menu_Actions("ActionsSingular"),
                "",
                $inscription[ "ID" ]
            ).
            $this->Center
            (
                $this->U($this->MyLanguage_GetMessage("Printable_Versions").":").
                " [ ".
                $this->Inscription_Event_Print_Link($inscription).
                " | ".
                $this->Inscription_Event_Print_Link($inscription,"Inscription_Info").
                " ]".
                ""
            ).
            $this->BR().
            $this->Center
            (
                $this->U($this->MyLanguage_GetMessage("Certificate_Link").":").
                " [ ".
                $this->Inscription_Event_Print_Link($inscription,"GenCert").
                " ]".
                ""
            ).
            $this->BR().
            "";
        
    }
    
}

?>