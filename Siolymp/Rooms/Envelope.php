<?php

include_once("Envelope/Search.php");
include_once("Envelope/CGI.php");
include_once("Envelope/Data.php");
include_once("Envelope/Read.php");
include_once("Envelope/Cells.php");
include_once("Envelope/Rows.php");
include_once("Envelope/Table.php");
include_once("Envelope/Update.php");


class Rooms_Envelope extends Rooms_Envelope_Update
{
    //*
    //* function Room_Envelopes_Handle, Parameter list: $room=array()
    //*
    //* Displays list of participants in envelope $room.
    //*
    
    function Room_Envelopes_Handle($room=array())
    {
        $edit=1;

        foreach (array("ParticipantsObj","QuestionsObj","AssessmentsObj","CorrectionsObj") as $obj)
        {
            $this->$obj()->Sql_Table_Structure_Update();
        }
        
        if (empty($room))
        {
            $roomid=$this->CGI_GETint("ID");
            if (empty($roomid)) { $roomid=$this->CGI_GETint("Room"); }
    
            $room=$this->Sql_Select_Hash(array("ID" => $roomid));
        }
        
        $levelid=$this->CGI_GETint("Level");

        $level=array();
        if (!empty($levelid))
        {
            $level=$this->LevelsObj()->Sql_Select_Hash(array("ID" => $levelid));
        }

        
        $table=array
        (
           $this->Room_Envelopes_Cities_Menu($room),
           $this->Room_Envelopes_City_Rooms_Menu($room),
           $this->Room_Envelopes_City_Room_Levels_Menu($room,$level),
        );

        if (!empty($room))
        {
            array_push
            (
               $table,
               array
               (
                   $this->H(4,$this->MyMod_ItemName()).
                   $this->MyMod_Item_Table_Html
                   (
                       0,
                       $room,
                       $this->Room_Envelope_Data_Show()
                   )
               )
            );

            $table=array_merge
            (
               $table,
               array($this->Room_Envelopes_Search_Form()),
               $this->Room_Envelope_Tables($edit,$room,$level)
            );
        }
        
        echo
            $this->Html_Form
            (
               $this->Html_Table
               (
                  "",
                  $table
               ),
               $edit,
               "",
               array(),
               "",
               "CITY"
            ).
            "";
    }
    
    //*
    //* function Room_Envelopes_Cities_Menu, Parameter list: $room
    //*
    //* Creates menu with links to Cities.
    //*
    
    function Room_Envelopes_Cities_Menu($room)
    {
        $cityid=$this->CGI_GET("City");
        $cities=$this->CitiesObj()->GetCurrentCities(array("ID","Name"));
        
        $args=$this->CGI_URI2Hash();
        unset($args[ "ID" ]);
        unset($args[ "Room" ]);
        
        $hrefs=array();    
        foreach ($cities as $city)
        {
            $href=$city[ "Name" ];
            if ($city[ "ID" ]!=$cityid)
            {
                $args[ "City" ]=$city[ "ID" ];
                $href=
                    $this->Href
                    (
                       "?".$this->CGI_Hash2URI($args),
                       $city[ "Name" ],
                       "","","",FALSE,array(),
                       "CITY"
                    );
            }

            array_push($hrefs,$href);
        }
        
        return
            $this->Anchor("CITY").
            $this->Center
            (
               $this->B($this->CitiesObj()->MyMod_ItemName("ItemsName").": ").
               "[ ".
               join(" | ",$hrefs).
               " ]"
            );
    }

    
    //*
    //* function Room_Envelopes_City_Rooms_Menu, Parameter list: &$room
    //*
    //* Creates menu with links to Rooms in City.
    //*
    
    function Room_Envelopes_City_Rooms_Menu(&$room)
    {
        $cityid=$this->CGI_GET("City");
        if (!empty($room)) { $cityid=$room[ "City" ]; }
        
        $rooms=
            $this->GetCityRooms
            (
               array("ID" => $cityid),
               array("ID","Name","City")
            );
        if (empty($room) && !empty($rooms))
        {
            $room=$rooms[0];
        }

        $args=$this->CGI_URI2Hash();

        $roomid=$this->CGI_GET("Room");
        $hrefs=array();    
        foreach ($rooms as $rroom)
        {
            $href=$rroom[ "Name" ];
            if ($rroom[ "ID" ]!=$roomid)
            {
                $args[ "Room" ]=$rroom[ "ID" ];
                $href=
                    $this->Href
                    (
                       "?".$this->CGI_Hash2URI($args),
                       $rroom[ "Name" ],
                       "","","",FALSE,array(),
                       "CITY"
                    );
            }
            array_push($hrefs,$href);
        }

        return
            $this->Center
            (
               $this->B($this->MyMod_ItemName("ItemsName").": ").
               "[ ".
               join(" | ",$hrefs).
               " ]"
            );
    }

    //*
    //* function Room_Envelopes_City_Room_Levels_Menu, Parameter list: $room,&$level
    //*
    //* Creates menu with links to Levels in $room.
    //*
    
    function Room_Envelopes_City_Room_Levels_Menu($room,&$level)
    {
        $le=$this->CGI_GET("City");
        if (!empty($room)) { $cityid=$room[ "City" ]; }
        
        $levels=$this->GetRoomLevels($room);
        if (empty($level) && !empty($levels))
        {
            $level=$levels[0];
        }

        $args=$this->CGI_URI2Hash();

        $hrefs=array();    
        foreach ($levels as $rlevel)
        {
            $href=$rlevel[ "Name" ];
            if ($level[ "ID" ]!=$rlevel[ "ID" ])
            {
                $args[ "Level" ]=$rlevel[ "ID" ];
                $href=
                    $this->Href
                    (
                       "?".$this->CGI_Hash2URI($args),
                       $rlevel[ "Name" ],
                       "","","",FALSE,array(),
                       "CITY"
                    );
            }
            
            array_push($hrefs,$href);
        }

        return
            $this->Center
            (
                $this->B($this->LevelsObj()->MyMod_ItemName("ItemsName").": ").
               "[ ".
               join(" | ",$hrefs).
               " ]"
            );
    }

    

}

?>