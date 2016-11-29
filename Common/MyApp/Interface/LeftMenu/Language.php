<?php


trait MyApp_Interface_LeftMenu_Language
{
    //\*
    //* function MyApp_Interface_LeftMenu_Language, Parameter list: 

    //*
    //* Prints menu of images, for user to select language.
    //*

    function MyApp_Interface_LeftMenu_Language()
    {
        $rlang=$this->GetLanguage();

        $args=$this->Query2Hash();

        $html="";
        foreach ($this->Languages as $lang => $langdef)
        {
            if ($rlang!=$lang)
            {
                $img=$this->IMG($this->Icons."/".$langdef[ "Icon" ],$langdef[ "Name" ],50,75);

                $args[ "Lang" ]=$lang;
                $query=$this->Hash2Query($args);

                $html.=$this->Center($this->Href("?".$query,$img,$langdef[ "Name" ]));
            }
        }

        return array($html);
    }
}

?>