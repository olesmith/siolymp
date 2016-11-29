<?php

include_once("City/Read.php");
include_once("City/Data.php");
include_once("City/Rows.php");
include_once("City/Table.php");


class Cities_Distribution_City extends Cities_Distribution_City_Table
{
    //*
    //* function City_CGI_Value, Parameter list: 
    //*
    //* Detects City ID from CGI.
    //*

    function City_CGI_Value()
    {
        $cityid=$this->CGI_GETint("City");

        return $cityid;
    }
    
    //*
    //* function City_Distribution_Zero, Parameter list: $edit,$n,$city
    //*
    //* Zeroes  city/room - or all city.
    //*

    function City_Distribution_Zero($edit,$city)
    {
        $action=$this->CGI_GET("Action");
        if ($edit==1)
        {
            $cityid=$this->City_CGI_Value();
            if (!empty($cityid))
            {
                $where=array();
                if ($action=="ZeroCity")
                {
                    $where[ "City" ]=$cityid;
                }
                elseif ($action=="ZeroRoom")
                {
                    $roomid=$this->CGI_GETint("Room");
                    if (!empty($roomid))
                    {
                        $where[ "City" ]=$cityid;
                        $where[ "Room" ]=$roomid;
                    }
                }

                if (!empty($where))
                {
                    $where=$this->UnitEventWhere($where);
                    $res=$this->ParticipantsObj()->Sql_Update_Where
                    (
                        array("Room" => 0),
                        $where,
                        array("Room")
                    );
                }
            }
        }
    }
}

?>