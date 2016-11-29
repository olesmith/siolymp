<?php

class Participants_Friend_Latex extends Participants_Friend_Update
{
    
    //*
    //* function Participants_Friend_Levels_Latex, Parameter list: $friend
    //*
    //* Creates latex for $friend participants levels tables.
    //*

    function Participants_Friend_Levels_Latex($friend,$pagehead)
    {
        $this->Participants_Friend_Read($friend);
        
        $tables=array();
        foreach ($this->Participants_Friend_Levels() as $level)
        {
            array_push
            (
               $tables,
               $this->Participants_Friend_Level_Latex($friend,$level)
             );
        }

        $nitemsperpage=40;
        
        $page=0;
        $rtables=array(0 => array());
        
        foreach ($tables as $table)
        {
            if (count($rtables[ $page ])+count($table)<$nitemsperpage)
            {
                $rtables[ $page ]=array_merge($rtables[ $page ],$table);
            }
            else
            {
                $page++;
                $rtables[ $page ]=$table;
            }
        }
        
        for ($n=0;$n<=$page;$n++)
        {
            $rtables[ $n ]=
                $pagehead.
                $this->H
                (
                   3,
                   $this->GetRealNameKey
                   (
                     $this->InscriptionsObj()->Actions
                     (
                        $this->CGI_GET("Action")
                     ),
                    "Latex_Title"
                   )
                ).
                $this->LatexTable
                (
                   "",
                   $rtables[ $n ]
                );
        }
        
        return
            join
            (
               "\n\n\\clearpage\n\n",
               $rtables
            ).
            "";

    }

    //*
    //* function Participants_Friend_Level_Latex, Parameter list: $friend,$level
    //*
    //* Creates latex for $friend participants levels tables.
    //*

    function Participants_Friend_Level_Latex($friend,$level)
    {
        $table=
            $this->Participants_Friend_Level_Table
            (
               0,
               $level,
               $friend,
               array()
             );

        // return array(array("ooo"));;
        $titles=array_shift($table);
        $titles=$this->B($titles);

        if (count($table)>0)
        {
            array_unshift
            (
               $table,
               $titles
             );
        }
        
        return $table;
    }
}

?>