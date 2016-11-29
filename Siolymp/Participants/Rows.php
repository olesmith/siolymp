<?php


class Participants_Rows extends Participants_Data
{
    //*
    //* function Participants_Titles, Parameter list: 
    //*
    //* Title row for participant tables.
    //*

    function Participants_Titles()
    {
        return
            $this->Html_Table_Head_Row
            (
               $this->GetDataTitles($this->Participants_Data())
            );
    }
    
    //*
    //* function Participant_Row, Parameter list: $edit,$n,$participant,$signaturecell=FALSE
    //*
    //* Handles Cities distribution.
    //*

    function Participant_Row($edit,$n,$participant,$signaturecell=FALSE)
    {
        $participant[ "Name" ]=$this->TrimCase($participant[ "Name" ]);

        $row=
            array_merge
            (
               $this->MyMod_Items_Table_Row
               (
                  0,
                  $n,
                  $participant,
                  $this->Participants_Data_Show()
               ),
               $this->MyMod_Items_Table_Row
               (
                  $edit,
                  $n,
                  $participant,
                  $this->Participants_Data_Edit(),
                  TRUE,
                  $participant[ "ID" ]."_"
                )
            );

        if ($signaturecell)
        {
            array_push($row,"\\underline{\\hspace{5cm}}");
        }
        
        return $row;
    }
    
    //*
    //* function Participants_Rows, Parameter list: $edit,$participants,$signaturecell=FALSE
    //*
    //* Generates $participants rows.
    //*

    function Participants_Rows($edit,$participants,$signaturecell=FALSE)
    {
        $p=1;

        $table=array();
        foreach ($participants as $participant)
        {
            array_push
            (
               $table,
               $this->Participant_Row(0,$p++,$participant,$signaturecell)
            );            
        }

        return $table;
    }
}

?>