<?php

class Levels_Ranking extends Levels_Exam
{
    //*
    //* function Levels_Ranking_Handle, Parameter list:  
    //*
    //* Creates form for editing participants.
    //*

    function Levels_Ranking_Handle()
    {
        $this->ParticipantsObj()->Sql_Table_Structure_Update();
        $this->ParticipantsObj()->ItemData("ID");
        $this->ParticipantsObj()->ItemDataGroups("Basic");
        $this->ParticipantsObj()->Actions("Show");
        
        $edit=0;
        if (preg_match('/^(Admin|Coordinator)$/',$this->Profile())) { $edit=1; }
        
        echo
            $this->Anchor("Ranking").
            $this->H(1,"Ranking dos Participantes").
            $this->Html_Form
            (
               $this->Html_Table
               (
                   $this->Levels_Exam_Titles(),
                   $this->Levels_Ranking_Table($edit)
               ),
               $edit,
               "",
               array(),
               "",
               "CITY"
            ).
            "";
    }

    
    //*
    //* function Levels_Ranking_Table, Parameter list:  $edit
    //*
    //* Creates form for editing participants.
    //*

    function Levels_Ranking_Table($edit)
    {
        $levels=$this->ReadCurrentLevels();

        $table=array();
        $n=1;
        foreach ($levels as $level)
        {
            $table=array_merge
            (
               $table,
               $this->Level_Ranking_Rows($edit,$n++,$level)
            );
        }

        return $table;
    }

    //*
    //* function Level_Ranking_Datas_Read, Parameter list: 
    //*
    //* Returns participants datas to show
    //*

    function Level_Ranking_Datas_Read()
    {
        return
            array_merge
            (
                array("ID"),
                $this->Level_Ranking_Datas_Show(),
                $this->Level_Ranking_Datas_Edit(),
                array("Level")
            );
    }

    //*
    //* function Level_Ranking_Datas_Show, Parameter list: 
    //*
    //* Returns participants datas to show
    //*

    function Level_Ranking_Datas_Show()
    {
        return array("Name","City","Room","Mark","Media");
    }

    //*
    //* function Level_Ranking_Datas_Edit, Parameter list: 
    //*
    //* Returns participants datas to show
    //*

    function Level_Ranking_Datas_Edit()
    {
        return array("Honouration");
    }

    
    //*
    //* function Level_Ranking_Update, Parameter list: &$participants
    //*
    //* Creates trow for $level.
    //*

    function Level_Ranking_Participants_Update(&$participants)
    {
        foreach (array_keys($participants) as $id)
        {
            $cgikey=$participants[ $id ][ "ID" ]."_Honouration";
            $cgivalue=$this->CGI_POST($cgikey);

            if (!empty($cgivalue) && $participants[ $id ][ "Honouration" ]!=$cgivalue)
            {
                $participants[ $id ][ "Honouration" ]=$cgivalue;
                $this->ParticipantsObj()->Sql_Update_Item_Value_Set($participants[ $id ][ "ID" ],"Honouration",$cgivalue);
            }
        }
    }
    
    //*
    //* function Level_Ranking_Rows, Parameter list: $edit,$n,$level
    //*
    //* Creates trow for $level.
    //*

    function Level_Ranking_Rows($edit,$n,$level)
    {
        $sdatas=$this->Level_Ranking_Datas_Show();
        foreach ($sdatas as $data)
        {
            $this->ParticipantsObj()->ItemData[ $data ][ $this->Profile() ]=1;
        }
        array_unshift($sdatas,"No");
        
        $edatas=$this->Level_Ranking_Datas_Edit();
        array_push($edatas,"Participant_Envelope_Link");

        $participants=
            $this->ParticipantsObj()->Sql_Select_Hashes
            (
                $this->UnitEventWhere
                (
                    array
                    (
                        "Level" => $level[ "ID" ],
                    )
                ),
                $this->Level_Ranking_Datas_Read(),
                $orderby="Mark DESC",
                $postprocess=FALSE,$table="",
                $limit=$level[ "Rankings" ]
            );

        if ($edit==1 && $this->CGI_POST("Update")==1)
        {
            $this->Level_Ranking_Participants_Update($participants);
        }
        
        $table=array
        (
            array_merge
            (
               $this->MyMod_Items_Table_Row
               (
                  0,
                  $n,
                  $level,
                  $this->Levels_Exam_Table_Data_Show(),
                  TRUE
               ),
               $this->MyMod_Items_Table_Row
               (
                  $edit,
                  $n,
                  $level,
                  $this->Levels_Exam_Table_Data_Edit(),
                  TRUE,
                  $level[ "ID" ]."_"
               )
            ),
            array
            (
                "",
                $this->ParticipantsObj()->MyMod_Items_Table_Html
                (
                    $edit,
                    $participants,
                    array_merge($sdatas,$edatas),
                    array("Plural" => TRUE)
                ),
            )
        );

        if ($edit==1)
        {
            array_push($table,$this->Buttons());
        }

        return $table;
    }
}

?>
