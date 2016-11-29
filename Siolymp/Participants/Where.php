<?php


class Participants_Where extends Participants_Access
{
    //*
    //* function Participants_City_Where, Parameter list: $city,$deficiency=FALSE
    //*
    //* Returns $city/$level participants where clause.
    //*

    function Participants_City_Where($city,$deficiency=FALSE)
    {
        $where=
            $this->UnitEventWhere
            (
               array
               (
                  "City" => $city[ "ID" ],
               )
            );
        
        if ($deficiency)
        {
            $where[ "Deficiency" ]=2;
        }

        return $where;
    }
}

?>