<?php

include_once("Room/Read.php");
include_once("Room/Data.php");
include_once("Room/Rows.php");
include_once("Room/Table.php");
include_once("Room/Html.php");

class Cities_Distribution_Room extends Cities_Distribution_Room_Html
{
     //*
    //* function City_Distribution_Room_Info, Parameter list: $n,$room
    //*
    //* Room info rows.
    //*

    function City_Distribution_Room_Info($n,$room)
    {
        return
            array
            (
             //array("",$this->City_Distribution_Room_Title($room)),
             //  $this->City_Distribution_Room_Titles($n,$room),
               $this->City_Distribution_Room_Row($n,$room),
            );
    }
    


    

}

?>