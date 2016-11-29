<?php

class Rooms_Envelope_Cells extends Rooms_Envelope_Read
{
    //*
    //* function Room_Envelope_Particant_Mark_Cell, Parameter list: $n,$room,$participant,$question,$assessment
    //*
    //* Creates $participant Marks row for $questions.
    //*

    function Room_Envelope_Particant_Mark_Cell($edit,$n,$room,$participant,$question,$assessment,$tabindex)
    {
        return
            $this->AssessmentsObj()->MyMod_Data_Field
            (
               $edit,
               $assessment,
               "Mark",
               TRUE,
               $tabindex,
               $this->Room_Envelope_Particant_Mark_CGI_Key($participant,$question)
            );
        
    }

    
    //*
    //* function Room_Envelope_Particant_Marks_Sum, Parameter list: $participant,$questions
    //*
    //* Creates $participant Marks row for $questions.
    //*

    function Room_Envelope_Particant_Mark_Sum($participant,$questions)
    {
        $cell=0.0;
        $questions=$this->MyHash_HashesList_2ID($questions,"ID");
        $where=$this->UnitEventWhere
        (
           array
           (
              "Participant" => $participant[ "ID" ],
              "Question" => "IN ('".join("','",array_keys($questions))."')",
           )
        );
        
        $cell=
            $this->AssessmentsObj()->Sql_Select_Calc
            (
               $where,
               "Mark"
            );

        return sprintf("%.1f",$cell);
        
    }
}

?>