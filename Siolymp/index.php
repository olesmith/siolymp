<?php

include_once("../Accessor.php");


include_once("../EventApp/EventApp.php");

include_once("App/CGIVars.php");
include_once("App/Events.php");
include_once("App/Head_Table.php");
include_once("App/Has.php");
include_once("App/Handle.php");
include_once("App/Override.php");



//For modules.


class Siolymp extends App_Override
{
    var $Sigma="&Sigma;";
    var $Mu="&mu;";
    var $Pi="&pi;";
    
    var $IDGETVar="";
    /* var $Pertains=1; //Questionary: 1,  */
    /* var $PertainsSetup=array */
    /* ( */
    /*    1 => array */
    /*    ( */
    /*       "Title" => "Questinário", */
    /*       "Title_UK" => "Questionary", */
          
    /*       "Object_Accessor" => "InscriptionsObj", */
          
    /*       "Data_Action" => "Datas", */
    /*       "Data_Form_Title" => "Dados dos Questionários", */
    /*       "Data_Form_Title_UK" => "Questionary Data", */
          
    /*       "Group_Action" => "GroupDatas", */
    /*       "Groups_Form_Title" => "Grupos dos Questionários", */
    /*       "Groups_Form_Title_UK" => "Questionary Data Groups", */
          
    /*       "Table_Method" => "ShowInscriptionQuest", */
    /*    ), */
    /* ); */

    
    /* var $AppProfiles=array */
    /* ( */
    /*    //Order in Profiles menu */
    /*    "Siolymp" => array */
    /*    ( */
    /*       "Public", */
    /*       "Friend", */
    /*       "Coordinator", */
    /*       "Admin", */
    /*    ), */
    /* ); */
    
    var $UserProfiles=array
    (
       "Friend",
    );

    var $MyApp_Latex_Filters=array
    (
       "Unit"  => "Unit",
       "Event" => "Event",
    );

    //*
    //* function Siolymp, Parameter list: $args=array()
    //*
    //* Siolymp constructor, main object.
    //*

    function Siolymp($args=array())
    {
        $unit=$this->GetGETint("Unit");

        $args[ "SessionsTable" ]=$unit."__Sessions";
        $args[ "SavePath" ]="?Unit=".$unit."&Action=Start";
        
        parent::Application($args);

        
        $event=$this->CGI_GETint("Event");
        if (!empty($event))
        {
            //var_dump("1".$this->URL_CommonArgs);
            $args=$this->Query2Hash($this->URL_CommonArgs);           
            //var_dump($args);
           $args[ "Event" ]=$event;

           $add="Event=".$event;
           if (!empty($this->URL_CommonArgs)) { $add="&".$add; }
           
           $this->URL_CommonArgs.=$add;
           //var_dump("1".$this->URL_CommonArgs);
        }
   }
    
    
}

$application=new Siolymp
(
   array
   (
      "AppName" => "Siolymp",
      "Sponsors" => TRUE,
      "PublicAllow" => TRUE,
      "SessionsTable" => "Sessions",
      "MayCreateSessionTable" => TRUE,

      "Mail" => TRUE,
      "Logging" => TRUE,
      "Authentication" => TRUE,
      "DB" => TRUE,

      "ActionPaths" => array("System"),
      "ActionFiles" => array("Actions.php"),
      
      "MessageDirs" => array
      (
         "../Common",
         "../MySql2",
         "../Application",
         "../EventApp/System",
         "System",
      ),
      "MessageFiles" => array
      (
         "../Common/Messages/MyTime.php",
      ),

      "AppLoadModules" => array
      (
         "Units",
      ),

      "LogGETVars" => array
      (
         "Unit"
      ),

      "LogPOSTVars" => array
      (
         "Edit","EditList","Save","Update","Generate","Transfer",
      ),

      "ValidProfiles" => array
      (
          "Public",
          "Friend",
          "Coordinator",
          "Admin",
      ),
      "CGIVars" => "Siolymp_CGIVars_Get",
   )
);

$application->MyApp_Run(array());

?>