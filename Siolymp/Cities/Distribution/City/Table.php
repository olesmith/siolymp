<?php

class Cities_Distribution_City_Table extends Cities_Distribution_City_Rows
{
    //*
    //* function City_Distribution_Table, Parameter list: $edit,$n,$city
    //*
    //* Creates city distribution table.
    //*

    function City_Distribution_Table($edit,$n,$city)
    {
        $this->City_Distribution_Zero($edit,$city);
        
        $this->Rooms=$this->RoomsObj()->GetCityRooms($city);
        $this->Participants=$this->ParticipantsObj()->Participants_City_Read($city);

        $titles=$this->City_Distribution_Room_Titles($n);
        
        $table=array($titles);
        
        $roomid=$this->CGI_GETint("Room");

        $m=1;
        foreach ($this->Rooms as $room)
        {
            $table=
                array_merge
                (
                   $table,
                   $this->City_Distribution_Room_Info($m,$room)
                );
                
            if (empty($roomid) || $roomid==$room[ "ID" ])
            {
                $table=array_merge
                (
                   $table,
                   array_merge
                   (
                      $this->City_Distribution_Room_Rows
                      (
                         $edit,
                         $m++,
                         $city,
                         $room
                      )
                   )
                );

                if ($m<count($this->Rooms))
                {
                    array_push
                    (
                       $table,
                       $titles
                    );
                }
            }
        }

        array_push
        (
           $table,
           $this->City_Distribution_Table_Non_Distributed($city)
         );
        
        return $table;
    }
    
    //*
    //* function City_Distribution_Table_Non_Distributed, Parameter list: $city
    //*
    //* Creates city non distributed table.
    //*

    function City_Distribution_Table_Non_Distributed($city)
    {
        $participants=
            $this->MyHashes_Search
            (
               $this->Participants,
               array("Room" => 0)
            );

        if (count($participants)==0) { return ""; }

        return
            $this->H(4,$this->Language_Message("Cities_Non_Distributed_Title")).
            $this->Html_Table
            (
               "",
               $this->ParticipantsObj()->Participants_Rows(1,$participants)
            );
    }
    
}

?>