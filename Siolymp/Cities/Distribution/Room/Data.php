<?php

class Cities_Distribution_Room_Data extends Cities_Distribution_Room_Read
{
     //*
    //* function City_Distribution_Title, Parameter list: $room
    //*
    //* Room title.
    //*

    function City_Distribution_Room_Title($room)
    {
        return
            $this->H
            (
               4,
               $this->RoomsObj()->MyMod_ItemName().": ".$room[ "Name" ]
             );
    }
    
    //*
    //* function City_Distribution_Room_Data, Parameter list: 
    //*
    //* Room info row.
    //*

    function City_Distribution_Room_Data($single=TRUE)
    {
        $datas=$this->RoomsObj()->GetGroupDatas($this->RoomGroup,$single);

        if ($this->LatexMode())
        {
            $datas=$this->RoomsObj()->MyMod_Datas_Actions_Remove($datas);
        }
        
        return $datas;
    }
}

?>