<?php

class Rooms_Envelope_Update extends Rooms_Envelope_Table
{
    //*
    //* function Room_Envelope_Particant_Update, Parameter list: &$participant,$questions,&$assessments
    //*
    //* Updates $participant.
    //*

    function Room_Envelope_Particant_Update(&$participant,$questions,&$assessments)
    {
        if ($this->CGI_POSTint("Update")==1)
        {
            $participant=
                $this->ParticipantsObj()->MyMod_Item_Update_CGI
                (
                   $participant,
                   $this->Room_Envelope_Participants_Data_Edit(),
                   $this->Room_Envelope_Particant_CGI_Pre($participant)
                );

            $this->Room_Envelope_Particant_Questions_Update($participant,$questions,$assessments);
        }
    }

    //*
    //* function Room_Envelope_Particant_Questions_Update, Parameter list: $participant,$questions,&$assessments
    //*
    //* Updates $participant $questions $assessments.
    //*

    function Room_Envelope_Particant_Questions_Update(&$participant,$questions,&$assessments)
    {
        $mark=0.0;
        foreach ($questions as $question)
        {
            $assessment=$this->Room_Envelope_Particant_Question_Assessment($question,$assessments);
            $mark+=$this->Room_Envelope_Particant_Question_Update($participant,$question,$assessment);
            $assessments[ $question[ "ID" ] ]=$assessment;
        }

        $media=$mark/(1.0*count($questions));

        $updatedatas=array();
        
        if ($participant[ "Mark" ]!=$mark)
        {
            $participant[ "Mark" ]=$mark;
            array_push($updatedatas,"Mark");
        }
        
        if ($participant[ "Media" ]!=$media)
        {
            $participant[ "Media" ]=$media;
            array_push($updatedatas,"Media");
        }
        
        if ($mark>0.0)
        {
            if ($participant[ "Presence" ]!=2)
            {
                $participant[ "Presence" ]=2;
                array_push($updatedatas,"Presence");
            }
        }

        if (count($updatedatas)>0)
        {
            $this->ParticipantsObj()->Sql_Update_Item_Values_Set($updatedatas,$participant);
        }
     }

    //*
    //* function Room_Envelope_Particant_Question_Update, Parameter list: $participant,$question,&$assessment
    //*
    //* Updates $participant $question $assessment.
    //*

    function Room_Envelope_Particant_Question_Update($participant,$question,&$assessment)
    {
        $newvalue=$this->Room_Envelope_Particant_Mark_CGI_Value($participant,$question);
        if ($assessment[ "Mark" ]!=$newvalue)
        {
            if (empty($assessment[ "ID" ]))
            {
                $assessment[ "Mark" ]=$newvalue;
                //var_dump("insert: ".$newvalue);
                $this->AssessmentsObj()->Sql_Insert_Item($assessment);
            }
            else
            {
                //var_dump("update: ".$newvalue);
                $assessment[ "Mark" ]=$newvalue;
                $this->AssessmentsObj()->Sql_Update_Item_Values_Set(array("Mark"),$assessment);
            }
        }

        return $newvalue;
    }

    
    //*
    //* function Room_Envelope_Questions_Assessor_Update, Parameter list: $room,$level,$questions,&$corrections,$type
    //*
    //* Updates $room/$level/$questions $corrections.
    //*

    function Room_Envelope_Questions_Assessors_Update($room,$level,$questions,&$corrections,$type)
    {
        foreach ($questions as $question)
        {
            $questionid=$question[ "ID" ];
            
            $newvalue=$this->Room_Level_Assessor_CGI_Value($room,$level,$question,$type);

            $updatedatas=array();
            
            if (empty($corrections[ $questionid ][ "ID" ]))
            {
                $corrections[ $questionid ][ "NParticipants" ]=$level[ "__NP__" ];
                $corrections[ $questionid ][ "Assessor" ]=$newvalue;
                
                $this->CorrectionsObj()->Sql_Insert_Item($corrections[ $question[ "ID" ] ]);
            }
            elseif ($corrections[ $questionid ][ "Assessor" ]!=$newvalue)
            {
                $corrections[ $questionid ][ "Assessor" ]=$newvalue;
                array_push($updatedatas,"Assessor");
            }


            if ($corrections[ $questionid ][ "NParticipants" ]!=$level[ "__NP__" ])
            {
                $corrections[ $questionid ][ "NParticipants" ]=$level[ "__NP__" ];
                array_push($updatedatas,"NParticipants");
            }

            if (count($updatedatas)>0)
            {
                $this->CorrectionsObj()->Sql_Update_Item_Values_Set
                (
                   $updatedatas,
                   $corrections[ $questionid ]
                );
            }
        }
        
    }
}

?>