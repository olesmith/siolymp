<?php

include_once("Assessors/Access.php");



class Assessors extends AssessorsAccess
{
    //*
    //* function Units, Parameter list: $args=array()
    //*
    //* Constructor.
    //*

    function Assessors($args=array())
    {
        $this->Hash2Object($args);
        $this->AlwaysReadData=array("Name","Title");
        $this->IncludeAllDefault=TRUE;
        $this->Sort=array("Name");
        $this->CellMethods[ "Assessor_Corrections_Weight" ]=TRUE;
        $this->CellMethods[ "Assessor_Corrections_Noof" ]=TRUE;
    }

    //*
    //* function SqlTableName, Parameter list: $table=""
    //*
    //* Overrides SqlTableName, prepending period id.
    //* Calls ApplicationObj->SqlPeriodTableName.
    //*

    function SqlTableName($table="")
    {
        return $this->ApplicationObj()->SqlEventTableName("Assessors",$table);
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
        if ($module!="Assessors")
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
    //* function Assessor_Corrections_Noof, Parameter list: $assessor=array()
    //*
    //* Returns noof participants inscribed in $room
    //*

    function Assessor_Corrections_Noof($assessor=array())
    {
        if (empty($assessor)) { return $this->Language_Message("Assessor_Corrections_Noof_Title"); }

        return
            $this->CorrectionsObj()->Sql_Select_NHashes
            (
               $this->UnitEventWhere
               (
                  array
                  (
                     "Assessor" => $assessor[ "ID" ],
                  )
               )
            );
    }
    
    //*
    //* function Assessor_Corrections_Weight, Parameter list: $assessor=array()
    //*
    //* Returns noof participants inscribed in $room
    //*

    function Assessor_Corrections_Weight($assessor=array())
    {
        if (empty($assessor)) { return $this->Language_Message("Assessor_Corrections_Weight_Title"); }
        
        return
            $this->CorrectionsObj()->Sql_Select_Calc
            (
               $this->UnitEventWhere
               (
                  array
                  (
                     "Assessor" => $assessor[ "ID" ],
                  )
               ),
               "NParticipants"
            );
    }
    
}

?>