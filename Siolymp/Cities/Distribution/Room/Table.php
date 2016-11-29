<?php

class Cities_Distribution_Room_Table extends Cities_Distribution_Room_Rows
{
    //*
    //* function City_Distribution_Room_Rows, Parameter list: $edit,$n,$city,$room
    //*
    //* Creates $city/$room distribution rows.
    //* Generates table, and adds two empty rows..
    //*

    function City_Distribution_Room_Rows($edit,$n,$city,$room)
    {
        $table=$this->City_Distribution_Room_Table($edit,$n,$city,$room);
        foreach (array_keys($table) as $id)
        {
            if (count($table[ $id ])>1) { array_push($table[ $id ],""); }

            if (!empty($table[ $id ][ "Row" ]))
            {
                array_unshift($table[ $id ][ "Row" ],"","");
            }
            else
            {
                array_unshift($table[ $id ],"","");
            }
        }

        return $table;
    }
    
    //*
    //* function City_Distribution_Room_Table, Parameter list: $edit,$n,$city,$room
    //*
    //* Creates $city/$room distribution table.
    //*

    function City_Distribution_Room_Table($edit,$n,$city,$room)
    {
        $participants=$this->City_Distribution_Room_Participants($city,$room);
        
        $ndist=count($participants);
        $nfree=$room[ "Capacity" ]-$ndist;
        
        $table=array();
        if (count($participants)>0)
        {
            array_push
            (
               $table,
               array
               (
                  $this->H(5,$this->Language_Message("Cities_Room_Distributed_Title")),
               ),
               $this->ParticipantsObj()->Participants_Titles()
            );
        
            $table=array_merge
            (
               $table,
               $this->ParticipantsObj()->Participants_Rows(0,$participants)
            );
        }


        $participants=$this->City_Distribution_Room_Participants($city,array("ID" => 0));

        $update=FALSE;
        if ($edit==1 && $this->CGI_POST("Update")==1)
        {
            $update=TRUE;
        }
        

        if ($nfree>0 && count($participants)>0)
        {
            array_push
            (
               $table,
               array
               (
                  $this->H(5,$this->Language_Message("Cities_Room_Undistributed_Title")),
               ),
               $this->ParticipantsObj()->Participants_Titles()
            );
        
            for ($p=$ndist+1;$p<=$room[ "Capacity" ];$p++)
            {
                if (count($participants)>0)
                {
                    $participant=array_shift($participants);
                    $participant[ "Room" ]=$room[ "ID" ];
                    
                    array_push
                    (
                       $table,
                       $this->ParticipantsObj()->Participant_Row($edit,$p,$participant)
                    );

                    //Go away in future rooms
                    $this->Participants[ $participant[ "ID" ] ]=$participant;

                    if ($update)
                    {
                        $this->ParticipantsObj()->Sql_Update_Item_Values_Set(array("Room"),$participant);
                    }
                }

            }

            if ($edit==1)
            {
                array_push
                (
                   $table,
                   array
                   (
                      $this->Buttons
                      (
                         $this->Language_Message("Cities_Room_Distribute_Title")
                      ),
                   )
                );
            }
        }

        return $table;
    }
}

?>