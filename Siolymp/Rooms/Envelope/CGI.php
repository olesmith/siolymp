<?php

class Rooms_Envelope_CGI extends Rooms_Envelope_Search
{
    //*
    //* function Room_Envelope_Particant_CGI_Pre, Parameter list:
    //*
    //* Returns $participant CGI prekey.
    //*

    function Room_Envelope_Particant_CGI_Pre($participant)
    {
        return $participant[ "ID" ]."_";
    }
    
    //*
    //* function Room_Envelope_Particant_Mark_CGI_Pre, Parameter list:$participant,$question
    //*
    //* Returns $participant $question mark CGI prekey.
    //*

    function Room_Envelope_Particant_Mark_CGI_Pre($participant,$question)
    {
        return
            $this->Room_Envelope_Particant_CGI_Pre($participant).
            $question[ "ID" ]."_";
    }
    
    //*
    //* function Room_Envelope_Particant_Mark_CGI_Key, Parameter list:$participant,$question
    //*
    //* Returns $participant $question mark CGI key.
    //*

    function Room_Envelope_Particant_Mark_CGI_Key($participant,$question)
    {
        return
            $this->Room_Envelope_Particant_Mark_CGI_Pre($participant,$question).
            "Mark";
    }
    
    //*
    //* function Room_Envelope_Particant_Mark_CGI_Value, Parameter list:$participant,$question
    //*
    //* Returns $participant $question mark CGI value.
    //*

    function Room_Envelope_Particant_Mark_CGI_Value($participant,$question)
    {
        return preg_replace
        (
           '/,/',
           ".",
            $this->CGI_POST
            (
              $this->Room_Envelope_Particant_Mark_CGI_Key($participant,$question)
            )
        );
    }
    
    //*
    //* function Room_Level_Assessor_CGI_Key, Parameter list: $room,$level,$type
    //*
    //* Returns $room,$level  assessor CGI prekey.
    //*

    function Room_Level_Assessor_CGI_Key($room,$level,$question,$type)
    {
        return $room[ "ID" ]."_".$level[ "ID" ]."_".$question[ "ID" ]."_".$type."_Assessor";
    }
    
    //*
    //* function Room_Level_Assessor_CGI_Value, Parameter list: $room,$level,$type
    //*
    //* Returns $room,$level  assessor CGI prekey.
    //*

    function Room_Level_Assessor_CGI_Value($room,$level,$question,$type)
    {
        return
            $this->CGI_POSTint
            (
              $this->Room_Level_Assessor_CGI_Key($room,$level,$question,$type)
            );
    }
    
}

?>