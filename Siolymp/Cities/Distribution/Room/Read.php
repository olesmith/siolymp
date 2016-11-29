<?php

class Cities_Distribution_Room_Read extends Cities_Distribution_City
{
    //*
    //* function City_Distribution_Room_Participants, Parameter list: $room
    //*
    //* Room title.
    //*

    function City_Distribution_Room_Participants($city,$room)
    {
        if (empty($this->Participants))
        {
            $this->Participants=$this->ParticipantsObj()->Participants_City_Read($city);
        }
        
        return
            $this->MyHashes_Search
            (
               $this->Participants,
               array("Room" => $room[ "ID" ])
            );
    }
}

?>