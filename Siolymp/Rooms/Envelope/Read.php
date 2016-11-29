<?php

class Rooms_Envelope_Read extends Rooms_Envelope_Data
{
    //*
    //* function Room_Envelope_Participants_Read, Parameter list: $room
    //*
    //* Reads participants in $room
    //*

    function Room_Envelope_Participants_Read($room,$level)
    {
        $participants=
            $this->MyHash_HashesList_2IDs
            (
               $this->ParticipantsObj()->Sql_Select_Hashes
               (
                  $this->UnitEventWhere
                  (
                      array
                      (
                          "Room" => $room[ "ID" ],
                          "Level" => $level[ "ID" ],
                      )
                  ),
                  array(),
                  "SortName,ID"
               ),
               "Level"
            );

        //Order by Levels, Name key.
        $levels=
            $this->LevelsObj()->Sql_Select_Hashes
               (
                  $this->UnitEventWhere
                  (
                     array
                     (
                        "ID" => array_keys($participants),
                     )
                  ),
                  array("Name","ID"),
                  "Name,ID"
                );

        $rparticipants=array();
        foreach ($levels as $level)
        {
            $rparticipants[ $level[ "ID" ] ]=$participants[ $level[ "ID" ] ];
        }

        return $rparticipants;
    }
    
    //*
    //* function Room_Envelope_Participants_Read, Parameter list: $room
    //*
    //* Reads participants in $room
    //*

    function Room_Envelope_Level_Questions_Read($level)
    {
        return
            $this->QuestionsObj()->Sql_Select_Hashes
            (
               $this->UnitEventWhere(array("Level" => $level[ "ID" ])),
               array(),
               "Number,ID"
            );
    }
    
    //*
    //* function Room_Envelope_Participant_Assessments_Read, Parameter list: $questions,$participant
    //*
    //* Reads participants in $room
    //*

    function Room_Envelope_Participant_Assessments_Read($questions,$participant)
    {
        $assessments=
            $this->AssessmentsObj()->Sql_Select_Hashes
            (
               $this->UnitEventWhere
               (
                  array
                  (
                     "Participant" => $participant[ "ID" ],
                     "Level" => $participant[ "Level" ],
                  )
               )
            );

       $assessments=$this->MyHash_HashesList_2IDs($assessments,"Question");

       //foreach ($assessments as $questionid => $assessments)
       foreach ($questions as $qid => $question)
       {
           $qassessments=array();
           if (!empty($assessments[ $question[ "ID" ] ]))
           {
               $qassessments=$assessments[ $question[ "ID" ] ];
           }
           
           if (empty($qassessments))
           {
               $assessments[ $question[ "ID" ] ]=
                   $this->Room_Envelope_Participant_Question_Assessment_New
                   (
                      $question,
                      $participant
                   );
           }
           elseif (count($assessments[ $question[ "ID" ] ])==1)
           {
               $assessments[ $question[ "ID" ] ]=array_pop($assessments[ $question[ "ID" ] ]);
           }
           else
           {
               var_dump("should del");
           }
       }

       return $assessments;
       
    }
    
    //*
    //* function Room_Envelope_Participant_Question_Assessment_New, Parameter list: $questions,$participant
    //*
    //* Returns new assessment for $participant $question.
    //*

    function Room_Envelope_Participant_Question_Assessment_New($question,$participant)
    {
        return
            $this->UnitEventWhere
            (
               array
               (
                  "Room"        => $participant[ "Room" ],
                  "Level"       => $participant[ "Level" ],
                  "Participant" => $participant[ "ID" ],
                  "Question"    => $question[ "ID" ],
                  "Mark"        => 0.0,
               )
            );
    }
    
    //*
    //* function Room_Envelope_Corrections_Read, Parameter list: $room,$level,$questions,$type
    //*
    //* Reads participants in $room
    //*

    function Room_Envelope_Corrections_Read($room,$level,$questions,$type)
    {
        $questionids=$this->MyHash_HashesList_Values($questions,"ID");

        $corrections=
            $this->MyHash_HashesList_2IDs
            (
               $this->CorrectionsObj()->Sql_Select_Hashes
               (
                  $this->UnitEventWhere
                  (
                     array
                     (
                        "Room" => $room[ "ID" ],
                        "Level" => $level[ "ID" ],
                        "Type" => $type,
                        "Question" => "IN ('".join("','",$questionids)."')",
                     )
                  ),
                  array(),
                  "Question,ID"
               ),
               "Question"
            );

        foreach ($questions as $question)
        {
            if (empty($corrections[ $question[ "ID" ] ]))
            {
                $corrections[ $question[ "ID" ] ]=
                    $this->Room_Envelope_Question_Correction_New($room,$level,$question,$type);
            }
            elseif (count($corrections[ $question[ "ID" ] ])==1)
            {
                $corrections[ $question[ "ID" ] ]=
                    array_pop($corrections[ $question[ "ID" ] ]);
            }
            else
            {
                var_dump("should del");
                $corrections[ $question[ "ID" ] ]=
                    array_pop($corrections[ $question[ "ID" ] ]);
            }
        }
        
        return $corrections;
    }
    
    //*
    //* function Room_Envelope_Question_Correction_New, Parameter list: $room,$level,$question,$type
    //*
    //* Creates new $room $level $question  correction hash.
    //*

    function Room_Envelope_Question_Correction_New($room,$level,$question,$type)
    {
        return
            $this->UnitEventWhere
            (
               array
               (
                  "Room"          => $room[ "ID" ],
                  "Level"         => $level[ "ID" ],
                  "NParticipants" => $level[ "__NP__" ],
                  "Question"      => $question[ "ID" ],
                  "Assessor"      => 0,
                  "Comment"       => "",
                  "Name"          => "",
                  "Type" => $type,
               )
            );
    }
}

?>