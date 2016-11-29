<?php

class Rooms_Envelope_Data extends Rooms_Envelope_CGI
{
    //*
    //* function Room_Envelope_Data_Show, Parameter list:
    //*
    //* Dasta to display in Room info table.
    //*

    function Room_Envelope_Data_Show()
    {
        return $this->ItemDataSGroups("Basic","Data");
    }
    
    //*
    //* function Room_Envelope_Participants_Data_Show, Parameter list:
    //*
    //* Dasta to display for Participants in Room info table.
    //*

    function Room_Envelope_Participants_Data_Show()
    {
        return $this->ParticipantsObj()->ItemDataGroups("Envelope","ShowDatas");
    }
    
    //*
    //* function Room_Envelope_Participants_Data_Edit, Parameter list:
    //*
    //* Data to edit for Participants in Room info table.
    //*

    function Room_Envelope_Participants_Data_Edit()
    {
        return $this->ParticipantsObj()->ItemDataGroups("Envelope","EditDatas");
    }
    
    //*
    //* function Room_Envelope_Participants_Data, Parameter list:
    //*
    //* Data to edit for Participants in Room info table.
    //*

    function Room_Envelope_Participants_Data()
    {
        return
            array_merge
            (
               $this->Room_Envelope_Participants_Data_Show(),
               $this->Room_Envelope_Participants_Data_Edit()
            );
    }
}

?>