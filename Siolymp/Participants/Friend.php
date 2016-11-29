<?php

include_once("Friend/CGI.php");
include_once("Friend/Where.php");
include_once("Friend/Data.php");
include_once("Friend/Read.php");
include_once("Friend/Rows.php");
include_once("Friend/Table.php");
include_once("Friend/Update.php");
include_once("Friend/Latex.php");
include_once("Friend/Form.php");


class Participants_Friend extends Participants_Friend_Form
{
    //var $Participants_Friend_Table_Data_Show=array("No","Delete","City","Level","Name","BirthDay","Deficiency","Room");
    var $Participants_Friend_Table_Data_Update=array("Name","BirthDay","Deficiency","City",);
    var $Participants_Friend_Table_Data_New=array("Name","BirthDay","Deficiency","City",);

    
    var $Levels=array();
    var $participants=array();
    
}

?>