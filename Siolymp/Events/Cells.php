<?php

class EventsCells extends EventsAccess
{
    //*
    //* function Event_Caravans_Info, Parameter list: $event=array()
    //*
    //* Generates event info text.
    //*

    function Event_Inscriptions_Info($event=array())
    {
        if (empty($event)) { $event=$this->Event(); }
        
        $text="";
        if (!empty($event[ "Info" ]))
        {
            $text=
                $this->MyMod_Data_Fields_Show("Info",$event).
                $this->BR();
        }

        return $text;
    }
    
     //*
    //* function Event_Caravans_InfoCell, Parameter list: $edit,$item=array()
    //*
    //* Generates event info cell;
    //*

    function Event_Inscriptions_InfoCell($event=array())
    {
        if (empty($event)) { return $this->MyLanguage_GetMessage("Event_Inscriptions_InfoCell_Title"); }

        $msgs=array();
        if ($this->Event_Collaborations_Inscriptions_Open($event))
        {
            array_push
            (
               $msgs,
               $this->MyLanguage_GetMessage("Event_Inscriptions_Collaborations_Has")
            );
        }
        
        if ($this->Event_Submissions_Inscriptions_Open($event))
        {
            array_push
            (
               $msgs,
               $this->MyLanguage_GetMessage("Event_Inscriptions_Submissions_Has")
            );
        }
        
        if ($this->Event_Caravans_Inscriptions_Open($event))
        {
            array_push
            (
               $msgs,
               $this->MyLanguage_GetMessage("Event_Inscriptions_Caravans_Has")
            );
        }

        $cell=$this->Event_Inscriptions_Info($event);
        
        if (count($msgs)>0)
        {
            $cell=$this->HtmlList($msgs);
            if ($this->EventsObj()->Friend_Inscribed_Is($event,$this->LoginData()))
            {
                $cell.=
                    $this->MyLanguage_GetMessage("Event_Inscriptions_InfoCell_Message_Inscribed").
                    "";
            }
            else
            {
                $cell.=
                    $this->MyLanguage_GetMessage("Event_Inscriptions_InfoCell_Message_Inscribe").
                    "";
            }
        }
        
        return $cell;
    }
    
    //*
    //* function NoOfParticipantsCell, Parameter list:$edit=0,$event=array(),$data=""
    //*
    //* Returns number of participants in sql table.
    //*

    function NoOfParticipantsCell($edit=0,$event=array(),$data="")
    {
        if (empty($event)) { return $this->Language_Message("Events_Participants_Cell_Noof_Title"); }
       
        $sqltable=$this->SqlEventTableName("Participants",$event);
        
        $ninscribed="-";
        if ($this->ParticipantsObj()->Sql_Table_Exists($sqltable))
        {
            $ninscribed=$this->ParticipantsObj()->Sql_Select_NHashes
            (
               $this->UnitEventWhere(),
               $sqltable
            );
        }

        return $ninscribed;
    }
               
    //*
    //* function NoOfParticipantsCitiesCell, Parameter list:$edit=0,$event=array(),$data=""
    //*
    //* Returns number of cities in participants in sql table.
    //*

    function NoOfParticipantCitiesCell($edit=0,$event=array(),$data="")
    {
        if (empty($event)) { return $this->Language_Message("Events_Participant_Cities_Cell_Noof_Title"); }
       
        $sqltable=$this->SqlEventTableName("Participants",$event);
        
        $cell="-";
        if ($this->ParticipantsObj()->Sql_Table_Exists($sqltable))
        {
            $cell=$this->ParticipantsObj()->Sql_Select_Unique_Col_NValues
            (
               "City",
               $this->UnitEventWhere(),
               $sqltable
            );
        }

        return $cell;
    }
        
}

?>