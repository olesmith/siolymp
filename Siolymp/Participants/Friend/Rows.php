<?php

class Participants_Friend_Rows extends Participants_Friend_Read
{
    //*
    //* function Participants_Friend_Level_Titles, Parameter list: 
    //*
    //* Returns level title row.
    //*

    function Participants_Friend_Level_Titles()
    {
        return
            array
            (
                "Row" => $this->GetDataTitles($this->Participants_Friend_Data()),
                "Class" => 'head',
            );
    }

    
    //*
    //* function Participant_Friend_Level_Row, Parameter list: $edit,$level,$friend,$participant
    //*
    //* Creates form for editing participants.
    //*

    function Participant_Friend_Level_Row($edit,$n,$level,$friend,$participant)
    {
        return
            array_merge
            (
               $this->MyMod_Items_Table_Row
               (
                  0,
                  $n,
                  $participant,
                  $this->Participants_Friend_Data_Show(),
                  TRUE,
                  $this->Participants_Friend_CGI_Pre($participant)
               ),
               $this->MyMod_Items_Table_Row
               (
                  $edit,
                  $n,
                  $participant,
                  $this->Participants_Friend_Data_Edit(),
                  TRUE,
                  $this->Participants_Friend_CGI_Pre($participant)
                )
             );
    }

    //*
    //* function Participant_Friend_Level_Empty_Row, Parameter list: $edit,$level,$friend
    //*
    //* Creates form for editing participants.
    //*

    function Participant_Friend_Level_Empty_Row($edit,$n,$level,$friend,$added)
    {
        $participant=$this->Participant_Friend_Level_New($n,$level,$friend,$added);

        return
            array_merge
            (
               $this->MyMod_Items_Table_Row
               (
                  0,
                  $n,
                  $participant,
                  $this->Participants_Friend_Data_Show(),
                  TRUE,
                  $this->Participants_Friend_CGI_Add_Pre($level,$n)
               ),
               $this->MyMod_Items_Table_Row
               (
                  $edit,
                  $n,
                  $participant,
                  $this->Participants_Friend_Data_Edit(),
                  TRUE,
                  $this->Participants_Friend_CGI_Add_Pre($level,$n)
                )
             );
    }
}

?>