<?php

class Rooms_Access extends ModulesCommon
{
    var $Access_Methods=array
    (
       "Show"   => "CheckShowAccess",
       "Edit"   => "CheckEditAccess",
       "Delete"   => "CheckDeleteAccess",
    );

    //*
    //* function CheckShowAccess, Parameter list: $item=array()
    //*
    //* Checks if $item may be viewed. Admin may -
    //* and Person, if LoginData[ "ID" ]==$item[ "ID" ]
    //* Activated in System::Friends::Profiles.
    //*

    function CheckShowAccess($item=array())
    {
        if (empty($item)) { return TRUE; }

        $res=TRUE;

        return $res;
    }

    //*
    //* function CheckEditAccess, Parameter list: $item=array()
    //*
    //* Checks if $item may be edited. Admin may -
    //* and Person, if LoginData[ "ID" ]==$item[ "ID" ].
    //* Activated in  System::Friends::Profiles.
    //*

    function CheckEditAccess($item=array())
    {
        if (empty($item)) { return TRUE; }
         
        $res=$this->Current_User_Event_Coordinator_Is();
        
        return $res;
    }
    
    //*
    //* function CheckDeleteAccess, Parameter list: $item=array()
    //*
    //* Checks if $item may be edited. Admin may -
    //* and Person, if LoginData[ "ID" ]==$item[ "ID" ].
    //* Activated in  System::Friends::Profiles.
    //*

    function CheckDeleteAccess($item=array())
    {
        if (empty($item)) { return TRUE; }
         
        $res=$this->Current_User_Event_Coordinator_Is();

        if ($res)
        {
            $where=array_merge($this->UnitEventWhere(),array("Date" => $item[ "ID" ]));
            //$n=$this->TimesObj()->Sql_Select_NHashes($where);
            //if ($n>0) $res=FALSE;
        }
        
        return $res;
    }
    
    //*
    //* function Room_Zero_May, Parameter list: $item=array()
    //*
    //* Checks if $item may be zero Room distribution.
    //*

    function Room_Zero_May($item=array())
    {
        $res=$this->Current_User_Event_Coordinator_Is();
        if (empty($item)) { return $res; }
         
        if ($res)
        {
            $res=$this->Room_Participants_Has($item);
        }
        
        return $res;
    }
    
     //*
    //* function Room_Participants_Has, Parameter list: $item=array()
    //*
    //* Checks if $item may be zero City distribution.
    //*

    function Room_Participants_Has($item=array())
    {
        if (empty($item)) { return TRUE; }
         
        return $this->ParticipantsObj()->Participants_Room_Has($item);
    }
    
}

?>