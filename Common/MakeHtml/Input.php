<?php

include_once("Input/Select.php");
include_once("Input/Buttons.php");
include_once("Input/CheckBoxes.php");


trait MakeHtml_Input
{
    use
        Html_Input_Buttons,
        Html_Input_Select,
        Html_Input_CheckBoxes;
        
    //*
    //* sub Html_Input, Parameter list: $type,$name,$value,$options=array()
    //*
    //* HTML hidden input field.
    //*

    function Html_Input($type,$name,$value,$options=array())
    {
        $options[ "TYPE" ]=strtolower($type);
        $options[ "NAME" ]=$name;
        $options[ "VALUE" ]=$value;
        return $this->Html_Tag
        (
           "INPUT",
           $options
        );
    }

    //*
    //* sub Html_Hidden, Parameter list: $name,$value,$options=array()
    //*
    //* HTML hidden input field.
    //*

    function Html_Hidden($name,$value,$options=array())
    {
        return $this->Html_Input("hidden",$name,$value,$options);
    }

    //*
    //* sub Html_Hiddens, Parameter list: $names,$values,$options=array()
    //*
    //* HTML hidden input field.
    //*

    function Html_Hiddens($hiddens,$options=array())
    {
        $html="";
        foreach ($hiddens as $name => $value)
        {
            $html.=$this->Html_Hidden($name,$value,$options);
        }
        
        return $html;
    }

    //*
    //* sub Html_Input_Field, Parameter list: $name,$value="",$options=array()
    //*
    //* HTML text type input field.
    //*

    function Html_Input_Field($name,$value="",$options=array())
    {
        if (empty($options[ "TYPE" ])) { $options[ "TYPE" ]='text'; }
        if ($value) { $value=$this->CGI_POST($name); }
        
        $options[ "NAME" ]=$name;
        $options[ "VALUE" ]=$value;
        
        return $this->Html_Tag
        (
           "INPUT",
           $options
        );
    }

    //*
    //* function Html_Input_Area, Parameter list: $name,$rows,$cols,$value
    //*
    //* Creates a	TEXTAREA field.
    //* 
    //*

    function Html_Input_Area($name,$rows,$cols,$value,$wrap="physical",$options=array())
    {
        $options[ "NAME" ]=$name;
        $options[ "COLS" ]=$cols;
        $options[ "ROWS" ]=$rows;
        $options[ "WRAP" ]=$wrap;

        $html="";
        if (is_array($value))
        {
            for ($n=0;$n<count($value);$n++)
            {
                chop($value[$n]);
                $html.=$value[$n]."\n";
            }
        }
        else
        {
            $html.=$value."\n";
        }

        return $this->Html_Tags
        (
           "TEXTAREA",
           $html,
           $options
        );
        return $html;
    }


}
?>