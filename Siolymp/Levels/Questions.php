<?php

class Levels_Questions extends Levels_Friend
{
    //*
    //* function Level_Questions_Table_Html, Parameter list: $level,$edit,$islast
    //*
    //* Creates Html table for editing $level Questions.
    //*

    function Level_Questions_Table_Html($level,$edit,$islast)
    {
        return $this->QuestionsObj()->Questions_Level_Table_Html($level,$edit,$islast);
    }
}

?>
