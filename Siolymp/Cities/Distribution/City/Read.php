<?php

class Cities_Distribution_City_Read extends Cities_Cells
{
    //*
    //* function City_Distribution_Participants, Parameter list: $city
    //*
    //* Reads participants in $city.
    //*

    function City_Distribution_Participants($city)
    {
        return $this->ParticipantsObj()->Participants_City_Read($city);
    }
    
    //*
    //* function City_Distribution_Not_Distributed_Participants, Parameter list: $city
    //*
    //* Room title.
    //*

    function City_Distribution_Not_Distributed_Participants($city)
    {
        if (empty($this->Participants))
        {
            $this->Participants=$this->ParticipantsObj()->Participants_City_Read($city);
        }
        
        return
            $this->MyHashes_Search
            (
               $this->Participants,
               array("Room" => 0)
            );
    }
}

?>