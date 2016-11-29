<?php

include_once("../EventApp/MyCertificates.php");

include_once("Certificates/Read.php");
include_once("Certificates/Latex.php");



class Certificates extends Certificates_Latex
{
    var $UnitDatas=array("Unit","Event","Friend");
    var $EventDatas=
        array
        (
            "Inscription",
            "Participant",
        );
    
    var $Certificate_NTypes=4;
    var $Certificate_Data=
        array
        (
            1 => "Inscription",
            2 => "Participant",
        );
            
    
    var $Code_Data=array
    (
       "Unit" => "%02d",
       "Event" => "%03d",
       "Friend" => "%06d",
       "ID" => "%06d",       
    );

    //*
    //* function Certificates, Parameter list: $args=array()
    //*
    //* Constructor.
    //*

    function Certificates($args=array())
    {
        $this->Hash2Object($args);
        $this->AlwaysReadData=
            array
            (
                "Unit","Event","Name","Code","Type","Friend",
                "Inscription","Participant"
            );
        $this->Sort=array("Name");
        $this->IncludeAllDefault=TRUE;
    }

    //*
    //* function Type2Key, Parameter list: $item
    //*
    //* Returns certificate type key of certificate $item.
    //*

    function Type2Key($item)
    {
        $type2key=array
        (
           1 => "Inscription",
           2 => "Participant",
        );
        
        $key="";
        if (isset($type2key[ $item[ "Type" ] ])) { $key=$type2key[ $item[ "Type" ] ]; }
        
        return $key;
    }
 
    //*
    //* function Type2NameKey, Parameter list: $item
    //*
    //* Returns certificate type key of certificate $item.
    //*

    function Type2NameKey($item)
    {
        $type2key=array
            (
                1 => "Name",
                2 => "Name",
            );
        
        $key="";
        if (isset($type2key[ $item[ "Type" ] ])) { $key=$type2key[ $item[ "Type" ] ]; }
        
        return $key;
    }
    
    //*
    //* function Type2TimeloadKey, Parameter list: $item
    //*
    //* Returns certificate timeload key of certificate $item.
    //*

    function Type2TimeloadKey($item)
    {
        $type2key=array
            (
                1 => "Certificate_CH",
                2 => "Certificate_CH",
            );
        
        $key="";
        if (isset($type2key[ $item[ "Type" ] ])) { $key=$type2key[ $item[ "Type" ] ]; }
        
        return $key;
    }
    
    //*
    //* function Type2LatexKey, Parameter list: $item
    //*
    //* Returns certificate key in $this->Event containing latex for the certificate.
    //*

    function Type2LatexKey($item)
    {
        $type2key=array
        (
           1 => "Certificates_Latex",
           2 => "Certificates_Participant_Latex",
           10 => "Certificates_Honouration_Latex",
        );
        
        $key="";
        if (isset($type2key[ $item[ "Type" ] ])) { $key=$type2key[ $item[ "Type" ] ]; }

        if ($item[ "Type" ]==2)
        {
            if ($item[ "Participant_Hash" ][ "Honouration" ]>1)
            {
                $key=$type2key[ 10 ];
            }
        }

        return $key;
    }
    
    //*
    //* function PostProcess, Parameter list: $item
    //*
    //* Postprocesses and returns $item.
    //*

    function PostProcess($item)
    {
        $module=$this->GetGET("ModuleName");
        if ($module!="Certificates")
        {
            return $item;
        }

        $item=Parent::PostProcess($item);
        
        return $item;
    }
    
        
}

?>