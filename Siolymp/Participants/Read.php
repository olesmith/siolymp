<?php


class Participants_Read extends Participants_Where
{
    //*
    //* function Participants_City_Read, Parameter list: $city,$deficiency=FALSE
    //*
    //* Reads $city/$level participoants.
    //*

    function Participants_City_Read($city,$deficiency=FALSE)
    {
        return
            $this->MyHash_HashesList_2ID
            (
               $this->Sql_Select_Hashes
               (
                  $this->Participants_City_Where($city,$deficiency),
                  $this->Participants_Data_Read(),
                  "Level,SortName,ID"
               ),
               "ID"
             );
    }
}

?>