<?php

class Rooms_Envelope_Rows extends Rooms_Envelope_Cells
{
    //*
    //* function Room_Envelope_Corrections_Row, Parameter list: $edit,$room,$level,$questions,$type
    //*
    //* Creates row with fields to define correction
    //*

    function Room_Envelope_Corrections_Row($edit,$room,$level,$questions,$type)
    {
        $corrections=$this->Room_Envelope_Corrections_Read($room,$level,$questions,$type);

        if ($edit==1 && $this->CGI_POSTint("Update")==1)
        {
            $this->Room_Envelope_Questions_Assessors_Update
            (
                $room,
                $level,
                $questions,
                $corrections,
                $type
            );
        }

        $row=
            array
            (
               $this->MultiCell
               (
                   $this->MyLanguage_GetMessage("Rooms_Envelope_Assessor_".$type."_Title")." $type:",
                   count($this->Room_Envelope_Participants_Data_Show())
               ),
            );
        
        foreach ($questions as $question)
        {
            $cell=
                $this->CorrectionsObj()->MyMod_Data_Field
                (
                   $edit,
                   $corrections[ $question[ "ID" ] ],
                   "Assessor",
                   TRUE,
                   $tabindex="",
                   $this->Room_Level_Assessor_CGI_Key($room,$level,$question,$type)
                );

            array_push($row,$cell);
        }

        return $row;
    }
    
    //*
    //* function Room_Envelope_Participants_Titles, Parameter list: $edit,$room,$level,$questions
    //*
    //* Titles of cells pertaining to Participants data.ç
    //*

    function Room_Envelope_Participants_Titles($edit,$room,$level,$questions)
    {
        $titles3=$this->Room_Envelope_Corrections_Row($edit,$room,$level,$questions,1);
        $titles4=$this->Room_Envelope_Corrections_Row($edit,$room,$level,$questions,2);
        
        $titles1=
               $this->ParticipantsObj()->GetDataTitles
               (
                  $this->Room_Envelope_Participants_Data_Show()
               );
        array_unshift($titles1,"Nº");
        array_unshift($titles3,"");
        array_unshift($titles4,"");
        
        $titles2=
            array
            (
               $this->MultiCell
               (
                  $this->ParticipantsObj()->MyMod_ItemName("ItemsName"),
                  count($this->Room_Envelope_Participants_Data_Show())+1
               ),
               $this->MultiCell
               (
                  $this->QuestionsObj()->MyMod_ItemName("ItemsName"),
                  count($questions)
               ),
               $this->MultiCell
               (
                  $this->Language_Message("Rooms_Envelope_Results_Title"),
                  count($this->Room_Envelope_Participants_Data_Edit())
               ),
            );
        
        
        foreach ($questions as $question)
        {
            array_push($titles1,$question[ "Number" ]);
        }
        
        $titles1=
            array_merge
            (
               $titles1,
               $this->ParticipantsObj()->GetDataTitles
               (
                 $this->Room_Envelope_Participants_Data_Edit()
               )
            );
        
        return
            array
            (
               $titles4,
               $titles3,
               $titles2,
               $titles1,
            );
    }
    
    //*
    //* function Room_Envelope_Particant_Row, Parameter list: $n,$room,$questions,$participant
    //*
    //* Creates ro for $participant.
    //*

    function Room_Envelope_Particant_Row($edit,$n,$room,$questions,$participant)
    {
        //Read assessments, keyed per Question
        $assessments=$this->Room_Envelope_Participant_Assessments_Read($questions,$participant);
        
        if ($edit==1 && $this->CGI_POSTint("Update")==1)
        {
            $this->Room_Envelope_Particant_Update($participant,$questions,$assessments);
        }
        
        $row=
            array_merge
            (
                array($this->B($n)),
                $this->ParticipantsObj()->MyMod_Items_Table_Row
                (
                    0,
                    $n,
                    $participant,
                    $this->Room_Envelope_Participants_Data_Show()
                ),
                $this->Room_Envelope_Particant_Marks_Row
                (
                    $edit,
                    $n,
                    $room,
                    $questions,
                    $participant,
                    $assessments
                ),
                $this->ParticipantsObj()->MyMod_Items_Table_Row
                (
                    $edit,
                    $n,
                    $participant,
                    $this->Room_Envelope_Participants_Data_Edit(),
                    TRUE,
                    $this->Room_Envelope_Particant_CGI_Pre($participant)
                )
            );
        
       return $row;
    }

    
     //*
    //* function Room_Envelope_Particant_Question_Assessment, Parameter list:
    
    //*
    //* Returns 
    //*

    function Room_Envelope_Particant_Question_Assessment($question,$assessments)
    {
        $assessment=array();
        if (!empty($assessments[ $question[ "ID" ] ]))
        {
            $assessment=$assessments[ $question[ "ID" ] ];
        }

        return $assessment;
    }
    
    
    //*
    //* function Room_Envelope_Particant_Marks_Row, Parameter list: $edit,$n,$room,$questions,$participant,$assessments
    //*
    //* Creates $participant Marks row for $questions.
    //*

    function Room_Envelope_Particant_Marks_Row($edit,$n,$room,$questions,$participant,$assessments)
    {
        $row=array();

        $m=1;
        foreach ($questions as $question)
        {
            $assessment=$this->Room_Envelope_Particant_Question_Assessment($question,$assessments);
            
            array_push
            (
               $row,
               $this->Room_Envelope_Particant_Mark_Cell
               (
                  $edit,
                  $m,
                  $room,
                  $participant,
                  $question,
                  $assessment,
                  0 //count($questions)*$m //tabindex
               )
            );

            $m++;
        }
        
        
        return $row;
    }
}

?>