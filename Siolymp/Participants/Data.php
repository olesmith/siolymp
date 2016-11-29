<?php


class Participants_Data extends Participants_Read
{
    //*
    //* function Participants_Data_Read, Parameter list: 
    //*
    //* Show data.
    //*

    function Participants_Data_Read()
    {
        return array("ID","City","Friend","Level","Name","BirthDay","Deficiency","Room");
    }
    
    //*
    //* function Participant_Data_Show, Parameter list: 
    //*
    //* Show data.
    //*

    function Participants_Data_Show()
    {
        $datas=array("No",);
        if (!$this->LatexMode()) { array_push($datas,"Edit"); }
        
        array_push($datas,"Level","Name");

        if (!$this->LatexMode()) { array_push($datas,"BirthDay"); }
        
        array_push($datas,"Deficiency");
        return $datas;
    }
    
    //*
    //* function Participants_Data_Edit, Parameter list: 
    //*
    //* Edit data.
    //*

    function Participants_Data_Edit()
    {
        return array("Room");
    }
    
    //*
    //* function Participants_Data, Parameter list: 
    //*
    //* All data to show/edit.
    //*

    function Participants_Data()
    {
        return
            array_merge
            (
               $this->Participants_Data_Show(),
               $this->Participants_Data_Edit()
            );
    }
}

?>