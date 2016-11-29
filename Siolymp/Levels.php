<?php

include_once("Levels/Access.php");
include_once("Levels/Override.php");
include_once("Levels/Cells.php");
include_once("Levels/Friend.php");
include_once("Levels/Questions.php");
include_once("Levels/Exam.php");
include_once("Levels/Ranking.php");



class Levels extends Levels_Ranking
{
    //*
    //* function Units, Parameter list: $args=array()
    //*
    //* Constructor.
    //*

    function Levels($args=array())
    {
        $this->Hash2Object($args);
        $this->AlwaysReadData=array("Name","Title");
        $this->IncludeAllDefault=TRUE;
        $this->Sort=array("Name");
        $this->SumVars=array("NParticipants");
        $this->UploadPath="Uploads/".$this->Unit("ID")."/".$this->Event("ID")."/Levels";
        
        $this->CellMethods[ "Level_Noof_Participants_Cell" ]=TRUE;
    }

    //*
    //* function SqlTableName, Parameter list: $table=""
    //*
    //* Overrides SqlTableName, prepending period id.
    //* Calls ApplicationObj->SqlPeriodTableName.
    //*

    function SqlTableName($table="")
    {
        return $this->ApplicationObj()->SqlEventTableName("Levels",$table);
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
        if ($module!="Levels")
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
    //* function GetCurrentLevels, Parameter list: 
    //*
    //* Returns ordered list of current dates.
    //*

    function GetCurrentLevels($key="Name",$sortkey="")
    {
        if (empty($sortkey)) $sortkey=$key;
        
        return $this->Sql_Select_Hashes($this->UnitEventWhere(),array($key,$sortkey));
   }
    
    //*
    //* function ReadCurrentLevels, Parameter list: $datas=array()
    //*
    //* Returns ordered list of current dates.
    //*

    function ReadCurrentLevels($datas=array())
    {
        return $this->Sql_Select_Hashes($this->UnitEventWhere(),$datas);
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
    //* function SumVarsRows, Parameter list: $datas,$sums,$items
    //*
    //* Overrides sum vars row.
    //* 

    function SumVarsRows($datas,$sums,$items)
    {
        $row=$this->SumVarsRow($datas,$sums,$items);

        $row[ count($row)-1 ]=
            $this->Div
            (
               $this->B($this->Level_Noof_Participants()),
               array("CLASS" => 'right')
            );

        return array($row);
    }
}

?>