<?php

class InscriptionsAccess extends MyInscriptions
{
    var $Access_Methods=array
    (
       "Show"   => "CheckShowAccess",
       "Edit"   => "CheckEditAccess",
       "Delete"   => "CheckDeleteAccess",
    );

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
            $res=
                !$this->ParticipantsObj()->Sql_Select_Hashes_Has
                (
                    $this->UnitEventWhere
                    (
                        array
                        (
                            "Friend" => $item[ "Friend" ],
                        )
                    )
                );
        }
        
        return $res;
    }
    
    //* function CheckCertificateAccess, Parameter list: $item=array()
    //*
    //* Checks if cert may be printed. Access rights and liberation.
    //*

    function CheckCertificateAccess($item=array())
    {
        if (empty($item)) { return TRUE; }
        
        if ($this->Current_User_Event_Coordinator_Is()) { return TRUE; }
        
        $res=TRUE;
        if (empty($item[ "Certificate" ]) || $item[ "Certificate" ]!=2)
        {
            $res=FALSE;
        }
        
        if ($item[ "Friend" ]!=$this->LoginData("ID"))
        {
            $res=FALSE;
        }
  
        $res=
            $res
            &&
            $this->EventsObj()->Event_Certificates_Published()
            &&
            $this->CheckShowAccess($item);

        return $res;
    }
    
    //* function MaySeeAssessments, Parameter list: $item=array()
    //*
    //* Checks if we may see assessments.
    //*

    function MaySeeAssessments($item=array())
    {
        $event=$this->Event();
        
        if ($this->Current_User_Event_Coordinator_Is($event)) { return TRUE; }
        
        $res=FALSE;
        if ($event[ "Result_Public" ]==2)
        {
            $res=$this->CheckEditAccess($item);
        }
        
        return $res;
    }
    
    //* function MaySeeDistribution, Parameter list: $item=array()
    //*
    //* Checks if we may see distribution.
    //*

    function MaySeeDistribution($item=array())
    {
        $event=$this->Event();
        
        if ($this->Current_User_Event_Coordinator_Is($event)) { return TRUE; }
        
        $res=FALSE;
        if ($event[ "Distribution_Public" ]==2)
        {
            $res=$this->CheckEditAccess($item);
        }
        
        return $res;
    }
    
}

?>