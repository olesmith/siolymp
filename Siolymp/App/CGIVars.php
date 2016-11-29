<?php

class App_CGIVars extends EventApp
{
    //*
    //* function Siolymp_CGIVars_Get, Parameter list:
    //*
    //* Siolymp CGI vars setup.
    //* 
    //*

    function Siolymp_CGIVars_Get()
    {
        $unit=$this->CGI_GETint("Unit");
        if (empty($unit))
        {
            $this->HandleShowUnits();
            
            /* $args=$this->CGI_URI2Hash(); */
            /* $args[ "Unit" ]=1; */

            /* $uri="?".$this->CGI_Hash2URI($args); */
            
            /* $this->CGI_Redirect("?".$this->CGI_Hash2URI($args)); */

            exit();
        }

        return array
        (
           //Read Unit
          "Unit" => array
          (
             "GlobalKey" => "Unit",
             "Compulsory" => TRUE,
             "CompulsoryAdmin" => FALSE,
             "AltAction" => "HandleShowUnits",

             "SqlObject" => "UnitsObj",
             "InitSqlTable" => TRUE,

             "From" => array
             (
                "GET" => "Unit",
                "POST" => "Unit",
                "COOKIE" => "Unit",
                "Login" => "Unit",
             ),

             "PostReads" => array
             (
                "Schools" => array
                (
                   "ReadMethod" => "ReadUnitOpenEvents",

                   "SqlObject" => "EventsObj",
                   "InitSqlTable" => TRUE,
                ),
             ),
             "CGIVars" => $this->EventApp_CGIVars_Unit()
           ),
        );
    }
}
