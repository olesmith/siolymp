<?php


include_once("Select/Hashes.php");
include_once("Select/Hash.php");
include_once("Select/Values.php");
include_once("Select/Where.php");
include_once("Select/Unique.php");
include_once("Select/Calc.php");

class MySqlSelect extends MySqlSelectCalc
{
    //*
    //* function GetDBTable, Parameter list: $table,$where,$data
    //*
    //* Returns list of items in Tables. One ass. array per item
    //* 
    //* 

    function GetDBTable($table,$where,$datalist)
    {
        return $this->Sql_Table_Fields_Matrix($datalist,$wherespec,$table);
    }


    //*
    //* function MakeSureWeHaveRead, Parameter list: $table,&$item,$datas
    //*
    //* Makes sure that datas in $datas has been read in item $item.
    //*
    //* 

    function MakeSureWeHaveRead($table,&$item,$datas)
    {
        $this->Sql_Select_Hash_Datas_Read($item,$datas,$table);
        return $item;
        
        /* if ($table=="") { $table=$this->SqlTableName($table); } */
        /* if (!is_array($datas)) { $datas=array($datas); } */

        /* $rdatas=array(); */
        /* foreach ($datas as $id => $data) */
        /* { */
        /*     if (!isset($item[ $data ]) || empty($item[ $data ])) */
        /*     { */
        /*         array_push($rdatas,$data); */
        /*     } */
        /* } */

        /* if (count($rdatas)>0 && !empty($item[ "ID" ])) */
        /* { */
        /*     $ritem=$this->Sql_Select_Hash_Values($item[ "ID" ],$rdatas); */
        /*     foreach ($rdatas as $id => $data) */
        /*     { */
        /*         $item[ $data ]=$ritem[ $data ]; */
        /*     } */
        /* } */

        /* return $item; */
    }
}

?>