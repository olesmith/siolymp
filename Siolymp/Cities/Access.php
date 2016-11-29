<?php

class Cities_Access extends ModulesCommon
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
            //Check if anyo participant in city
            $where=array_merge($this->UnitEventWhere(),array("City" => $item[ "ID" ]));
            
            $n=$this->ParticipantsObj()->Sql_Select_NHashes($where);
            if ($n>0) $res=FALSE;
            
            if ($res)
            {
                //Check if anyone rooms in city
                $n=$this->RoomsObj()->Sql_Select_NHashes($where);
                if ($n>0) $res=FALSE;
            }
        }
        
        return $res;
    }
    
     //*
    //* function City_Participants_Has, Parameter list: $item=array()
    //*
    //* Checks if city $item has participants.
    //*

    function City_Participants_Has($item=array())
    {
        if (empty($item)) { return TRUE; }
         
        return $this->ParticipantsObj()->Participants_City_Has($item);
    }
    
     //*
    //* function City_Participants_Has_Not, Parameter list: $item=array()
    //*
    //* Checks if city $item hasn't participants.
    //*

    function City_Participants_Has_Not($item=array())
    {
        if (empty($item)) { return TRUE; }
         
        return !$this->ParticipantsObj()->Participants_City_Has($item);
    }
    
    //*
    //* function City_Zero_May, Parameter list: $item=array()
    //*
    //* Checks if $item may be zero City distribution.
    //*

    function City_Zero_May($item=array())
    {
        $res=$this->Current_User_Event_Coordinator_Is();
        if (empty($item)) { return $res; }
         
        if ($res)
        {
            $res=$this->City_Participants_Has($item);
        }
        
        return $res;
    }
    
}

?>