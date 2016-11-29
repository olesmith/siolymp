<?php

class Participants_Friend_Read extends Participants_Friend_Data
{
    //*
    //* function Participants_Friend_Levels, Parameter list: 
    //*
    //* Creates form for editing participants.
    //*

    function Participants_Friend_Levels()
    {
        if (empty($this->Levels))
        {
            $this->Levels=$this->LevelsObj()->ReadCurrentLevels();
        }

        return $this->Levels;
    }
    
    //*
    //* function Inscription_Participants_Read, Parameter list: $friend,$datas=array()
    //*
    //* Reads all $inscription participants.
    //*

    function Participants_Friend_Read($friend,$datas=array())
    {
        if (empty($this->Participants))
        {
            $this->Participants=
                $this->Sql_Select_Hashes
                (
                   $this->Participants_Friend_Where($friend),
                   $datas,
                   "SortName,ID",
                   TRUE //postprocess
                );
            
            $this->Participants=
                $this->MyHash_HashesList_2IDs($this->Participants,"Level");
        }


        return $this->Participants;        
    }
}

?>