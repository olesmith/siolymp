<?php

class Participants_Friend_CGI extends Participants_Latex
{
    //*
    //* function Participants_Friend_CGI_Pre, Parameter list: $participant
    //*
    //* Prekey to $participant data.
    //*

    function Participants_Friend_CGI_Pre($participant)
    {
        return $participant[ "ID" ]."_";
    }
    
    //*
    //* function Participants_Friend_CGI_Data_Key, Parameter list: $participant,$data
    //*
    //* Prekey to $participant $data key.
    //*

    function Participants_Friend_CGI_Data_Key($participant,$data)
    {
        return $this->Participants_Friend_CGI_Pre($participant).$data;
    }
    
    //*
    //* function Participants_Friend_CGI_Add_Pre, Parameter list: $level,$n
    //*
    //* Prekey to $participant $data key.
    //*

    function Participants_Friend_CGI_Add_Pre($level,$n)
    {
        return "Add_".$level[ "ID" ]."_".$n."_";
    }
    
    //*
    //* function Participants_Friend_CGI_Add_Data_Key, Parameter list: $level,$n,$data
    //*
    //* Prekey to $participant $data key.
    //*

    function Participants_Friend_CGI_Add_Data_Key($level,$n,$data)
    {
        return $this->Participants_Friend_CGI_Add_Pre($level,$n).$data;
    }
    
    //*
    //* function Participants_Friend_CGI_Add_Data_Valye, Parameter list: $level,$n,$data
    //*
    //* Prekey to $participant $data key.
    //*

    function Participants_Friend_CGI_Add_Data_Value($level,$n,$data)
    {
        return
            $this->CGI_POST
            (
               $this->Participants_Friend_CGI_Add_Data_Key($level,$n,$data)
            );
    }
    
}

?>