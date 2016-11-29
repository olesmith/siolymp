<?php


class Participants_City extends Participants_Room
{
    //*
    //* function Participants_City_Has, Parameter list: $city,$deficiency=FALSE
    //*
    //* Returns TRUE if $city has participants.
    //*

    function Participants_City_Has($city,$deficiency=FALSE)
    {
        $n=
            $this->Sql_Select_NHashes
            (
               $this->Participants_City_Where($city,$deficiency)
            );

        $res=FALSE;
        if ($n>0) { $res=TRUE; }

        return $res;
    }
    
}

?>