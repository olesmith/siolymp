<?php

include_once("Rooms/Access.php");
include_once("Rooms/Envelope.php");



class Rooms extends Rooms_Envelope
{
    //*
    //* function Units, Parameter list: $args=array()
    //*
    //* Constructor.
    //*

    function Rooms($args=array())
    {
        $this->Hash2Object($args);
        $this->AlwaysReadData=array("Name","Title");
        $this->IncludeAllDefault=TRUE;
        $this->Sort=array("City","Name");
        
        $this->SumVars=array("Capacity");

        $this->CellMethods[ "Rooms_Participants_Noof_Cell" ]=TRUE;
        $this->CellMethods[ "Rooms_Vacancies_Noof_Cell" ]=TRUE;
    }

    //*
    //* function SqlTableName, Parameter list: $table=""
    //*
    //* Overrides SqlTableName, prepending period id.
    //* Calls ApplicationObj->SqlPeriodTableName.
    //*

    function SqlTableName($table="")
    {
        return $this->ApplicationObj()->SqlEventTableName("Rooms",$table);
    }
    
   
    //*
    //* function PostProcessItemData, Parameter list:
    //*
    //* Post process item data; this function is called BEFORE
    //* any updating DB cols, so place any additonal data here.
    //*

    function PostProcessItemData()
    {
        $this->PostProcessUnitData();
        $this->PostProcessEventData();
    }

    
    
    //*
    //* function PostInit, Parameter list:
    //*
    //* Runs right after module has finished initializing.
    //*

    function PostInit()
    {
    }

    //*
    //* function PostProcess, Parameter list: $item
    //*
    //* Postprocesses and returns $item.
    //*

    function PostProcess($item)
    {
        $module=$this->GetGET("ModuleName");
        if ($module!="Rooms")
        {
            return $item;
        }

        if (!isset($item[ "ID" ]) || $item[ "ID" ]==0) { return $item; }

        $updatedatas=array();

 
        if (count($updatedatas)>0)
        {
            $this->Sql_Update_Item_Values_Set($updatedatas,$item);
        }
        
        return $item;
    }
    
    
    //*
    //* function GetCityRooms, Parameter list: $city,$datas=array()
    //*
    //* Reads $city rooms.
    //*

    function GetCityRooms($city,$datas=array())
    {
        $where[ "City" ]=$city[ "ID" ];
    
        return
            $this->Sql_Select_Hashes
            (
               $this->UnitEventWhere($where),
               $datas,
              "Name,ID"
            );
    }
    
    //*
    //* function GetRoomLevels, Parameter list: $room,$datas=array()
    //*
    //* Reads $city rooms.
    //*

    function GetRoomLevels($room,$datas=array())
    {
        $levelids=
            $this->ParticipantsObj()->Sql_Select_Unique_Col_Values
            (
                "Level",
                $this->UnitEventWhere
                (
                    array
                    (
                        "Room" => $room[ "ID" ],
                    )
                )
            );

        return
            $this->LevelsObj()->Sql_Select_Hashes
            (
                $this->UnitEventWhere
                (
                    array
                    (
                        "ID" => $levelids,
                    )
                ),
                $datas
            );
        
    }
    
    //*
    //* function PostInterfaceMenu, Parameter list: 
    //*
    //* Prints warning messages.
    //*

    function PostInterfaceMenu($args=array())
    {
        $res=$this->ItemExistenceMessage();

        return $res;
    }
        
    //*
    //* function Rooms_Noof, Parameter list: $where=array()
    //*
    //* Returns all rooms
    //*

    function Rooms_Noof($where=array())
    {
        return $this->Sql_Select_NHashes($this->UnitEventWhere($where));
    }
    
    //*
    //* function Rooms_Capacity, Parameter list: $where=array()
    //*
    //* Returns all rooms
    //*

    function Rooms_Capacity($where=array())
    {
        return
            $this->Sql_Select_Calc
            (
               $this->UnitEventWhere($where),
               "Capacity"
            );
    }
    
    //*
    //* function Rooms_Participants_Noof, Parameter list: $room
    //*
    //* Returns noof participants inscribed in $room
    //*

    function Rooms_Participants_Noof($room)
    {
        if (empty($room)) { return $this->Language_Message("Rooms_Participants_Noof_Cell_Title"); }

        return
            $this->ParticipantsObj()->Participants_Noof
            (
               $this->UnitEventWhere
               (
                  array("Room" => $room[ "ID" ])
               )
            );
    }
    
    //*
    //* function Rooms_Participants_Noof_Cell, Parameter list: $edit=0,$room=array()
    //*
    //* Returns noof participants inscribed in $room
    //*

    function Rooms_Participants_Noof_Cell($edit=0,$room=array())
    {
        if (is_array($edit)) { $room=$edit; }
        
        if (empty($room)) { return $this->Language_Message("Rooms_Participants_Noof_Cell_Title"); }

        return
            $this->Div
            (
               $this->Rooms_Participants_Noof($room),
               array("CLASS" => 'right')
            );
    }
    
    //*
    //* function Rooms_Vacancies_Noof, Parameter list: $room
    //*
    //* Returns noof participants inscribed in $room
    //*

    function Rooms_Vacancies_Noof($room)
    {
        if (empty($room)) { return $this->Language_Message("Rooms_Vacancies_Noof_Cell_Title"); }

        return
            $room[ "Capacity" ]
            -
            $this->Rooms_Participants_Noof($room);
    }
    
    //*
    //* function Rooms_Vacancies_Noof_Cell, Parameter list: $edit=0,$room=array()
    //*
    //* Returns noof participants inscribed in $room
    //*

    function Rooms_Vacancies_Noof_Cell($edit=0,$room=array())
    {
        if (is_array($edit)) { $room=$edit; }
        
        if (empty($room)) { return $this->Language_Message("Rooms_Vacancies_Noof_Cell_Title"); }

        return
            $this->Div
            (
               $this->Rooms_Vacancies_Noof($room),
               array("CLASS" => 'right')
            );
    }
    
}

?>