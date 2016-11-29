<?php

class Cities_Distribution_Room_Rows extends Cities_Distribution_Room_Data
{
    //*
    //* function City_Distribution_Room_Row, Parameter list: $n,$room
    //*
    //* Room info row.
    //*

    function City_Distribution_Room_Row($n,$room)
    {
        $row=
            $this->RoomsObj()->MyMod_Items_Table_Row
            (
               0,
               $n,
               $room,
               $this->City_Distribution_Room_Data(FALSE)
            );

        array_unshift($row,"");
        
        return $row;
    }
    
    //*
    //* function City_Distribution_Titles, Parameter list: $n
    //*
    //* Room info titles row.
    //*

    function City_Distribution_Room_Titles()
    {
        $row=
            $this->RoomsObj()->GetDataTitles
            (
               $this->City_Distribution_Room_Data(FALSE)
            );
        
        array_unshift($row,"");
        
        return $this->Html_Table_Head_Row($row);
    }
    
}

?>