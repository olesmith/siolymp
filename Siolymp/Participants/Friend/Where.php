<?php

class Participants_Friend_Where extends Participants_Friend_CGI
{
    //*
    //* function Participants_Friend_Where, Parameter list: $friend
    //*
    //* Returns sql where, for reading all $inscription participants.
    //*

    function Participants_Friend_Where($friend,$where=array())
    {
        $where[ "Friend" ]=$friend[ "ID" ];
    
        return $this->UnitEventWhere($where);
    }
    
    //*
    //* function Participants_Friend_Level_Where, Parameter list: $friend
    //*
    //* Returns sql where, for reading all $inscription participants.
    //*

    function Participants_Friend_Level_Where($friend,$level)
    {
        return
            $this->Participants_Friend_Where
            (
               $friend,
               array("Level" => $level[ "ID" ])
            );
    }
    
}

?>