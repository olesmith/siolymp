<?php

include_once("Latex/Wall.php");
include_once("Latex/Rooms.php");
include_once("Latex/Envelopes.php");

class Cities_Distribution_Latex extends Cities_Distribution_Latex_Envelopes
{
    //*
    //* function City_Distribution_Info_Table, Parameter list: $city
    //*
    //* Creates City latex info table.
    //*

    function City_Distribution_Info_Table($city)
    {
        return $this->MyMod_Item_Table(0,$city,$this->City_Distribution_Data());
    }

    //*
    //* function City_Distribution_Latex_Info_Table, Parameter list: $city
    //*
    //* Creates City latex info table.
    //*

    function City_Distribution_Latex_Info_Table($city)
    {
        return
            $this->LatexTable
            (
               "",
               $this->City_Distribution_Info_Table($city)
            );
    }

    //*
    //* function City_Distribution_Room_Info_Table, Parameter list: $city
    //*
    //* Creates City latex info table.
    //*

    function City_Distribution_Room_Info_Table($room)
    {
        return $this->RoomsObj()->MyMod_Item_Table(0,$room,$this->City_Distribution_Room_Data());
    }

        
    //*
    //* function City_Distribution_Latex_Room_Info_Table, Parameter list: $city,$room
    //*
    //* Creates City latex info table.
    //*

    function City_Distribution_Latex_Room_Info_Table($city,$room)
    {
        return
            $this->LatexTable
            (
               "",
               array_merge
               (
                  $this->City_Distribution_Room_Info_Table($room)
               )
            );
    }

    //*
    //* function City_Distribution_Level_Info_Table, Parameter list: $room,$level
    //*
    //* Creates Level/Room latex info table.
    //*

    function City_Distribution_Level_Info_Table($city,$room,$level)
    {
        $table=array();
        if (!empty($room))
        {
            $table=
                $this->RoomsObj()->MyMod_Item_Table
                (
                  0,
                   $room,
                   $this->City_Distribution_Room_Data()
                );
        }
        else
        {
            $table=$this->City_Distribution_Info_Table($city);
        }
        
        return
            array_merge
            (
               $table,
               $this->LevelsObj()->MyMod_Item_Table
               (
                  0,
                  $level,
                  $this->City_Distribution_Level_Data()
               )
            );
    }

     //*
    //* function City_Distribution_Latex_Level_Info_Table, Parameter list: $city,$room,$level
    //*
    //* Creates Level/Room latex info table.
    //*

    function City_Distribution_Latex_Level_Info_Table($city,$room,$level)
    {
        return
            $this->LatexTable
            (
               "",
               array_merge
               (
                  $this->City_Distribution_Level_Info_Table($city,$room,$level)
               )
            );
    }

       
}

?>