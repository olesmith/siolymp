<?php


class Participants_Levels extends Participants_Rows
{
    var $Levels=array();
    
    //*
    //* function Levels, Parameter list: 
    //*
    //* Levels accessor.
    //*

    function Levels($levelid=0,$key="")
    {
        $this->Participants_Levels_Read();

        if (!empty($levelid))
        {
            if (!empty($key))
            {
                return $this->Levels[ $levelid ][ $key ];
            }
            
            return $this->Levels[ $levelid ];
        }
        
        return $this->Levels;
    }
    
    //*
    //* function Participants_Levels_Read, Parameter list: 
    //*
    //* Title row for participant mark tables.
    //*

    function Participants_Levels_Read()
    {
        if (empty($this->Levels))
        {
            $this->Levels=$this->LevelsObj()->ReadCurrentLevels(array("ID","Name","Number","NQuestions"));
            $this->Levels=$this->MyHash_HashesList_2ID($this->Levels,"ID");
        }
    }
        
    
}

?>