<?php

include_once("Cities/Access.php");
include_once("Cities/Cells.php");
include_once("Cities/Distribution.php");
include_once("Cities/Handle.php");



class Cities extends Cities_Handle
{
    //*
    //* function Units, Parameter list: $args=array()
    //*
    //* Constructor.
    //*

    function Cities($args=array())
    {
        $this->Hash2Object($args);
        $this->AlwaysReadData=array("Name","Title");
        $this->IncludeAllDefault=TRUE;
        $this->Sort=array("Name");
        

        $this->CellMethods[ "Cities_Noof_Participants_Cell" ]=TRUE;
        $this->CellMethods[ "Cities_Noof_Rooms_Cell" ]=TRUE;
        $this->CellMethods[ "Cities_Capacity_Cell" ]=TRUE;
        $this->CellMethods[ "Cities_Vacancies_Cell" ]=TRUE;
        
    }

    //*
    //* function SqlTableName, Parameter list: $table=""
    //*
    //* Overrides SqlTableName, prepending period id.
    //* Calls ApplicationObj->SqlPeriodTableName.
    //*

    function SqlTableName($table="")
    {
        return $this->ApplicationObj()->SqlEventTableName("Cities",$table);
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
        if ($module!="Cities")
        {
            return $item;
        }

        if (!isset($item[ "ID" ]) || $item[ "ID" ]==0) { return $item; }

        $updatedatas=array();

 
        if (count($updatedatas)>0)
        {
            $this->Sql_Update_Item_Values_Set($updatedatas,$item);
        }
        
        return $item;
    }
    
    
    //*
    //* function GetCurrentCities, Parameter list: $datas=array()
    //*
    //* Returns ordered list of current cities.
    //*

    function GetCurrentCities($datas=array())
    {
        return 
            $this->Sql_Select_Hashes
            (
               $this->UnitEventWhere(),
               $datas,
               "Name"
            );
    }
    
    //*
    //* function PostInterfaceMenu, Parameter list: 
    //*
    //* Prints warning messages.
    //*

    function PostInterfaceMenu($args=array())
    {
        $res=$this->ItemExistenceMessage();

        return $res;
    }
    //*
    //* function SumVarsRows, Parameter list: $datas,$sums
    //*
    //* Overrides sum vars row.
    //* 

    function SumVarsRows($datas,$sums)
    {
        $row=$this->SumVarsRow($datas,$sums);

        $nparts=$this->ParticipantsObj()->Participants_Noof();
        $capacity=$this->RoomsObj()->Rooms_Capacity();

        $row[ count($row)-4 ]=
            $this->Div
            (
               $this->B($this->RoomsObj()->Rooms_Noof()),
               array("CLASS" => 'right')
            );

        $row[ count($row)-3 ]=
            $this->Div
            (
               $this->B($capacity),
               array("CLASS" => 'right')
            );

        $row[ count($row)-2 ]=
            $this->Div
            (
               $this->B($nparts),
               array("CLASS" => 'right')
            );

        $row[ count($row)-1 ]=
            $this->Div
            (
               $this->B($capacity-$nparts),
               array("CLASS" => 'right')
            );

        return array($row);
    }
}

?>