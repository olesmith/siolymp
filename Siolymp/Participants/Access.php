<?php

class Participants_Access extends ModulesCommon
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

        $res=$this->Current_User_Event_Coordinator_Is();
        if (!$res && preg_match('/^(Friend)$/',$this->Profile()))
        {
            if (!empty($item[ "ID" ]) && $item[ "Friend" ]==$this->LoginData("ID"))
            {
                $res=TRUE;
            }
        }
        
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
         
        $res=$this->CheckShowAccess($item);
        
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
         
        $res=$this->CheckEditAccess($item);

        if (empty($item[ "ID" ])) { return FALSE; }
        if (!empty($item[ "Presence" ]) && $item[ "Presence" ]==2) { return FALSE; }
        
        return $res;
    }
    
    //* function CheckCertAccess, Parameter list: $item=array()
    //*
    //* Checks if cert may be printed. Access rights and liberation.
    //*

    function CheckCertAccess($item=array())
    {
        if (empty($item)) { return TRUE; }
        
        $res=TRUE;
        if (empty($item[ "Certificate" ]) || $item[ "Certificate" ]!=2)
        {
            $res=FALSE;
        }
        
        if ($this->Current_User_Event_Coordinator_Is()) { return $res; }
        
        
        $res=
            $res
            &&
            $this->EventsObj()->Event_Certificates_Published()
            &&
            $this->CheckShowAccess($item);

        
        return $res;
    }
    
    //*
    //* function MayEditPresence, Parameter list: $data,$item=array()
    //*
    //* Returns permissions on Presence bit: not writeable ir Mark not empty.
    //*

    function MayEditPresence($data,$item=array())
    {
        if (empty($item)) { return 1; }

        $res=$this->MyMod_Data_Access($data,$item,$callmethod=FALSE);
        if (!empty($item[ "Mark" ])) { $res=1; }

        return $res;
    }
    
}

?>