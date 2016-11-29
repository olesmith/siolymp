<?php


class Participants_Room extends Participants_Friend
{
    //*
    //* function Participants_Room_Where, Parameter list: $room,$deficiency=FALSE
    //*
    //* Returns $city/$level participants where clause.
    //*

    function Participants_Room_Where($room,$deficiency=FALSE)
    {
        $where=
            $this->UnitEventWhere
            (
               array
               (
                  "Room" =>$room [ "ID" ],
                  "City" =>$room [ "City" ],
               )
            );
        
        if ($deficiency)
        {
            $where[ "Deficiency" ]=2;
        }

        return $where;
    }
    
    //*
    //* function Participants_Room_Has, Parameter list: $room,$deficiency=FALSE
    //*
    //* Returns TRUE if $city has participants.
    //*

    function Participants_Room_Has($room,$deficiency=FALSE)
    {
        $n=
            $this->Sql_Select_NHashes
            (
               $this->Participants_Room_Where($room,$deficiency)
            );

        $res=FALSE;
        if ($n>0) { $res=TRUE; }

        return $res;
    }
    
}

?>