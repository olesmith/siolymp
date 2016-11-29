<?php

class Cities_Distribution_Room_Html extends Cities_Distribution_Room_Table
{
    //*
    //* function City_Distribution_Room_Table_Html, Parameter list: $edit,$n,$city,$room
    //*
    //* Creates $city/$room distribution html table.
    //*

    function City_Distribution_Room_Table_Html_ddis($edit,$n,$city,$room)
    {
        $table=
            $this->City_Distribution_Room_Table
            (
               $edit,
               $n,
               $city,
               $room
            );
        
        if (count($table)>0)
        {
            return
                $this->FrameIt
                (
                   $this->Html_Table
                   (
                      "",
                      $table
                   )
                ).
                "";
        }

        return "";
    }    
}

?>