<?php

class Levels_Cells extends Levels_Override
{
    //*
    //* function Level_Noof_Participants, Parameter list: $level=array()
    //*
    //* Returns number of participants inscribed for level $level.
    //* If $level empty, returns number of participants for all levels.
    //*

    function Level_Noof_Participants($level=array())
    {
        $where=$this->UnitEventWhere();
        if (!empty($level))
        {
            $where[ "Level" ]=$level[ "ID" ];
        }
        
        return $this->ParticipantsObj()->Sql_Select_NHashes($where);
    }
    
    //*
    //* function Level_Noof_Participants, Parameter list: $level=array()
    //*
    //* Returns cell with no of participants inscribed for level $level.
    //*

    function Level_Noof_Participants_Cell($edit=0,$level=array())
    {
        if (is_array($edit)) { $level=$edit; }
        
        if (empty($level))
        {
            return $this->Language_Message("Levels_Noof_Participants_Cell_Title");
        }
        
        return
            $this->Div
            (
               $this->Level_Noof_Participants($level),
               array("CLASS" => 'right')
            );
    }
    
    //*
    //* function Levels_Rooms_Capacity, Parameter list:
    //*
    //* Returns cell with sum of number of vacancies.
    //*

    function Levels_Rooms_Capacity()
    {
        return $this->RoomsObj()->Rooms_Capacity();
    }
    
    //*
    //* function Levels_Noof_Participants, Parameter list:
    //*
    //* Returns cell with no of participants inscribed for level all levels.
    //*

    function Levels_Noof_Participants_Cell()
    {
        $cell=
            $this->Level_Noof_Participants().
            $this->H
            (
               5,
               $this->MyLanguage_GetMessage("Levels_Rooms_Capacity_Cell_Title").
               ": ".
               $this->Levels_Rooms_Capacity()
            ).
            "";

        return $cell;
    }
    
}

?>