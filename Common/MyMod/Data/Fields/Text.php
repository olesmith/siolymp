<?php


trait MyMod_Data_Fields_Text
{
    //*
    //* function MyMod_Data_Fields_Text_Edit, Parameter list: $data,$item,$value="",$tabindex="",$plural=FALSE,$links=TRUE,$callmethod=TRUE,$options=array(),$rdata=""
    //*
    //* Creates TEXT AREA inout field.
    //*

    function MyMod_Data_Fields_Text_Edit($data,$item,$value="",$tabindex="",$plural=FALSE,$options=array(),$rdata="")
    {
        if (empty($rdata)) { $rdata=$data; }
        
        $size=$this->ItemData[ $data ][ "Size" ];
        if ($plural && $this->ItemData[ $data ][ "TableSize" ]!="")
        {
            $size=$this->ItemData[ $data ][ "TableSize" ];
        }

        $size=preg_split('/\s*x\s*/',$size);

        $width=50;
        if (count($size)>0) { $width=$size[0]; }
        
        $height=5;
        if (count($size)>1) { $height=$size[1]; }

        $value=preg_replace('/^\s+/',"",$value);
        $value=preg_replace('/\s+$/',"",$value);

        if (count($size)>1)
        {
            $value=$this->MakeTextArea($rdata,$height,$width,$value,"physical",$options);
        }
        else
        {
            $value=$this->MakeInput($rdata,$value,$width,$options);
        }

        return $value;
    }
    
    //*
    //* function MyMod_Data_Fields_Text_Show, Parameter list: $data,$item,$value="",$tabindex="",$plural=FALSE,$links=TRUE,$callmethod=TRUE,$options=array(),$rdata=""
    //*
    //* Creates TEXT AREA inout field.
    //*

    function MyMod_Data_Fields_Text_Show($data,$item,$value="",$options=array())
    {
        $value=preg_replace('/\n/',$this->BR(),$value);
        $value=preg_replace('/^\s+/',"",$value);
        $value=preg_replace('/\s+$/',"",$value);


        return $value;
    }
    
 }

?>