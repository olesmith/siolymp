<?php

class Participants_Friend_Form extends Participants_Friend_Latex
{
    //*
    //* function Participants_Friend_Form, Parameter list: 
    //*
    //* Creates form for editing participants.
    //*

    function Participants_Friend_Form($edit,$friend,$friendmenu)
    {
        if ($edit==1) { $edit=$this->Participants_Friend_Data_Group_Edit(); }
        
        $this->Sql_Table_Structure_Update();
        $this->Actions("Show");
        $this->ItemData("ID");
        $this->ItemDataGroups("Basic");
        $this->LevelsObj()->ItemData("ID");
        
        $this->Participants_Friend_Read($friend);


        $addeds=array();
        foreach ($this->Participants_Friend_Levels() as $level)
        {
            $addeds[ $level[ "ID" ] ]=array();
        }
                
        if ($edit==1 && $this->CGI_POST("AddSave")==1)
        {
            $addeds=$this->Participants_Friend_Levels_Update($friend);
        }
        
        return
            $this->Anchor("Participants").
            $this->Html_Form
            (
               $this->H(2,$this->MyLanguage_GetMessage("Participants_Friend_Table_Title")).
               $friendmenu.
               $this->LevelsObj()->Participants_Levels_Table_Html($friend).
               $this->Html_Table
               (
                  "",
                  $this->Participants_Friend_Levels_Table($edit,$friend,$addeds)
               ),
               $edit
            ).
            "";
    }

}

?>