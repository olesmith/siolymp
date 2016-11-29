<?php

class Participants_Friend_Update extends Participants_Friend_Table
{
    //*
    //* function Participants_Friend_Levels_Table, Parameter list: $edit,$inscription,$participants
    //*
    //* Updates all levels participants.
    //*

    function Participants_Friend_Levels_Update($friend)
    {
        $addeds=array();
        foreach ($this->Participants_Friend_Levels() as $level)
        {
            $addeds[ $level[ "ID" ] ]=$this->Participants_Friend_Level_Update($friend,$level);
        }

        return $addeds;
    }

    //*
    //* function Participants_Friend_Level_Update, Parameter list: $edit,$inscription,$level
    //*
    //* Updates $level of participants.
    //*

    function Participants_Friend_Level_Update($friend,$level)
    {
        $n=1;
        foreach (array_keys($this->Participants_Friend_Level($level)) as $pid)
        {
            $this->Participant_Friend_Level_Update
            (
               $this->Participants[ $level[ "ID" ] ][ $pid ]
            );
        }

        $addeds=array();
        for (;$n<=$level[ "NParticipants" ];$n++)
        {
            $addeds[ $n ]=$this->Participant_Friend_Level_Add($friend,$level,$n);
        }

        return $addeds;
    }
    
    //*
    //* function Participant_Friend_Level_Update, Parameter list: &$participant
    //*
    //* Updates one already registered participant.
    //*

    function Participant_Friend_Level_Update(&$participant)
    {
        $participant=
            $this->MyMod_Item_Update_CGI
            (
               $participant,
               $this->Participants_Friend_Data_Edit(),
               $this->Participants_Friend_CGI_Pre($participant)
            );
    }
    
    //*
    //* function Participant_Friend_Level_Add, Parameter list: $friend,$level,$n
    //*
    //* Conditionally updates new participant no $n.
    //*

    function Participant_Friend_Level_Add($friend,$level,$n)
    {
        $participant=$this->Participant_Friend_Level_New($n,$level,$friend);

        $add=TRUE;
        foreach ($this->Participants_Friend_Table_Data_New as $data)
        {
            if (empty($participant[ $data ])) { $add=FALSE; }
        }

        $nitems=
            $this->Sql_Select_NHashes
            (
               $this->Participants_Friend_Level_Where($friend,$level)
            );

        //Check if limits reached
        if ($nitems>=$level[ "NParticipants" ])
        {
            $add=FALSE;
        }
        
        if ($add)
        {
            $participant=$this->TrimDateData($participant,"BirthDay",$participant[ "BirthDay" ]);
            $participant[ "SortName" ]=$this->Text2Sort($participant[ "Name" ]);
            $participant[ "SortName" ]=$this->Html2Sort($participant[ "SortName" ]);


            $this->Sql_Insert_Item($participant);
            if (empty($this->Participants[ $level[ "ID" ] ])) { $this->Participants[ $level[ "ID" ] ]=array(); }
            array_push($this->Participants[ $level[ "ID" ] ],$participant);
        }

        return $add;
    }
    
    //*
    //* function Participant_Friend_Level_New, Parameter list: $edit,$level,$friend,$added=FALSE
    //*
    //* Creates form for editing participants.
    //*

    function Participant_Friend_Level_New($n,$level,$friend,$added=FALSE)
    {
        $participant=array
        (
           "Unit" => $this->Unit("ID"),
           "Event" => $this->Event("ID"),
           "Friend" => $friend[ "ID" ],
           "City" => $friend[ "City" ],
           "Level" => $level[ "ID" ],
        );

        if (!$added)
        {
            foreach ($this->Participants_Friend_Table_Data_New as $data)
            {
                $value=$this->Participants_Friend_CGI_Add_Data_Value($level,$n,$data);
                if (!empty($value) || empty($participant[ $data ]))
                {
                    $participant[ $data ]=$this->Participants_Friend_CGI_Add_Data_Value($level,$n,$data);
                }
            }
         }

         return $participant;
    }
}

?>