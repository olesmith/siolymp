<?php

class Rooms_Envelope_Table extends Rooms_Envelope_Rows
{
    //*
    //* function Room_Envelope_Table, Parameter list: $edit,$room,$level
    //*
    //* Generates the $room envelops participants assessments table.
    //*
    
    function Room_Envelope_Tables($edit,$room,$level)
    {
        $n=1;
        $tables=array();
        foreach ($this->Room_Envelope_Participants_Read($room,$level) as $levelid => $participants)
        {
            if ($level[ "ID" ]!=$levelid) { continue; }
            
            $level=$this->LevelsObj()->Sql_Select_Hash(array("ID" => $levelid));

            $level[ "__NP__" ]=count($participants);
            $questions=$this->Room_Envelope_Level_Questions_Read($level);
            
            $table=array();
            if ($edit==1)
            {
                array_push
                (
                   $table,
                   $this->Buttons()
                );
            }
            
            foreach ($participants as $participant)
            {
                array_push
                (
                   $table,
                   $this->Room_Envelope_Particant_Row($edit,$n++,$room,$questions,$participant)
                );
            }

            if ($edit==1)
            {
                array_push
                (
                   $table,
                   $this->Buttons()
                );
            }

            array_push
            (
               $tables,
               $this->H
               (
                  5,
                  $this->LevelsObj()->MyMod_ItemName().": ".$level[ "Name" ]
               ).
               $this->Html_Table
               (
                   $this->Room_Envelope_Participants_Titles($edit,$room,$level,$questions),
                   $table
               )
            );
        }
        
        return $tables;
    }
}

?>