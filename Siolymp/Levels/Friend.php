<?php

class Levels_Friend extends Levels_Cells
{
    var $Levels_Friend_Table_Data_Show=array("No","Name","Title","NParticipants",);
    
    //*
    //* function Participants_Levels_Table_Htm, Parameter list: $friend 
    //*
    //* Creates form for editing participants.
    //*

    function Participants_Levels_Table_Html($friend)
    {
         return
            $this->Html_Table
            (
               $this->Participants_Levels_Titles(),
               $this->Participants_Levels_Table($friend)
            ).
            "";
    }
    
    //*
    //* function Participants_Levels_Table, Parameter list: $friend 
    //*
    //* Creates table for editing participants.
    //*

    function Participants_Levels_Table($friend)
    {
        $edit=0;
        $table=array();
        $n=1;

        foreach ($this->ReadCurrentLevels() as $level)
        {
            array_push
            (
               $table,
               $this->Participants_Level_Row($edit,$n++,$friend,$level)
            );
        }

        array_push($table,$this->Participants_Levels_Totals($friend));

        return $table;
    }

    
    //*
    //* function Participants_Level_Row, Parameter list: $edit,$n,$friend,$level
    //*
    //* Creates trow for $level.
    //*

    function Participants_Level_Row($edit,$n,$friend,$level)
    {
        $row=$this->MyMod_Items_Table_Row($edit,$n,$level,$this->Levels_Friend_Table_Data_Show);

        $nparticipants=
            $this->ParticipantsObj()->Sql_Select_NHashes
            (
               $this->ParticipantsObj()->Participants_Friend_Level_Where($friend,$level)
            );
            
        array_push
        (
           $row,
           $nparticipants,
           $level[ "NParticipants" ]-$nparticipants
        );
        
        return $row;
    }
    
     //*
    //* function Participants_Levels_Titles, Parameter list: 
    //*
    //* Creates title row for displaying $friend levels info.
    //*

    function Participants_Levels_Titles()
    {
        return
            array_merge
            (
               $this->GetDataTitles($this->Levels_Friend_Table_Data_Show),
               array("Participantes","Vagas")
            );
    }
    
     //*
    //* function Participants_Levels_Participants_NoOf, Parameter list: 
    //*
    //* Creates title row for displaying $friend levels info.
    //*

    function Participants_Levels_Participants_NoOf($friend)
    {
        return
            $this->ParticipantsObj()->Sql_Select_NHashes
            (
               $this->ParticipantsObj()->Participants_Friend_Where($friend)
            );
    }
    
     //*
    //* function Participants_Levels_Vacancies, Parameter list: 
    //*
    //* Creates title row for displaying $friend levels info.
    //*

    function Participants_Levels_Vacancies()
    {
        return
            $this->LevelsObj()->Sql_Select_Calc
            (
               $this->UnitEventWhere(),
               "NParticipants"
            );
    }
    
     //*
    //* function Participants_Levels_Totals, Parameter list: 
    //*
    //* Creates title row for displaying $friend levels info.
    //*

    function Participants_Levels_Totals($friend)
    {
        $vacancies=$this->Participants_Levels_Vacancies();
        $participants=$this->Participants_Levels_Participants_NoOf($friend);
        
        return
            array
            (
               $this->MultiCell
               (
                  $this->ApplicationObj()->Sigma,
                  count($this->Levels_Friend_Table_Data_Show)-1,
                  "r"
               ),
               $vacancies,
               $participants,
               $vacancies-$participants
            );
    }
}

?>