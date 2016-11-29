<?php

class Participants_Friend_Table extends Participants_Friend_Rows
{
    //*
    //* function Participants_Friend_Level, Parameter list: $level
    //*
    //* Creates table with $participants per level.
    //*

    function Participants_Friend_Level($level)
    {
        $lparticipants=array();
        if (!empty($this->Participants[ $level[ "ID" ] ]))
        {
            $lparticipants=$this->Participants[ $level[ "ID" ] ];
        }
        
        return $lparticipants;
    }
    
    //*
    //* function Participants_Friend_Levels_Table, Parameter list: $edit,$friend,$addeds
    //*
    //* Creates table with $participants per level.
    //*

    function Participants_Friend_Levels_Table($edit,$friend,$addeds)
    {
        $table=array();
        foreach ($this->Participants_Friend_Levels() as $level)
        {
            array_push
            (
               $table,
               $this->H
               (
                  3,
                  $this->LevelsObj()->MyMod_ItemName()." ".
                  $level[ "Name" ].": ".
                  $level[ "Title" ]
               )
            );

            $added=FALSE;
            if (!empty($addeds[ $level[ "ID" ] ]))
            {
                $added=TRUE;
            }

            $table=
                array_merge
                (
                   $table,
                   $this->Participants_Friend_Level_Table
                   (
                      $edit,
                      $level,
                      $friend,
                      $added
                   )
                );
        }

        return $table;
    }

    //*
    //* function Participants_Friend_Level_Table, Parameter list: $edit,$level,$friend,$addeds
    //*
    //* Creates form for editing participants.
    //*

    function Participants_Friend_Level_Table($edit,$level,$friend,$addeds)
    {
        $participants=
            $this->MyMod_Sort_List
            (
               $this->Participants_Friend_Level($level),
               array("SortName")
            );

        $table=
            $this->Participants_Friend_Level_Table_Edits
            (
               $edit,
               $level,
               $friend,
               $participants
            );

        if ($edit==1)
        {
            $table=
                array_merge
                (
                   $table,
                   $this->Participants_Friend_Level_Table_Adds
                   (
                      $edit,
                      $level,
                      $friend,
                      count($participants),
                      $addeds
                   )
                );
            
            $submit=
                $this->GetMessage($this->HtmlMessages,"SendButton").
                    " ".
            $this->MyMod_ItemName("ItemsName");
        
            array_push
            (
               $table,
               array
               (
                  $this->MakeHidden("AddSave",1).
                  $this->Buttons($submit)
                )
             );
        }

        return $table;
    }
    
    //*
    //* function Participants_Friend_Level_Table_Edits, Parameter list: $edit,$level,$friend,$addeds
    //*
    //* Creates form for editing participants.
    //*

    function Participants_Friend_Level_Table_Edits($edit,$level,$friend,$participants)
    {
        $table=array();

        $n=1;
        foreach ($participants as $participant)
        {
            array_push
            (
               $table,
               $this->Participant_Friend_Level_Row
               (
                  $edit,
                  $n++,
                  $level,
                  $friend,
                  $participant
               )
            );
            continue;
        }
        
        if (!empty($table))
        {
            array_unshift
            (
               $table,
               $this->Participants_Friend_Level_Titles()
            );
        }

        return $table;
    }
    
    //*
    //* function Participants_Friend_Level_Table_Adds, Parameter list: $edit,$level,$friend,$nparticipants,$addeds
    //*
    //* Creates form for adding participants, if vacancies left..
    //*

    function Participants_Friend_Level_Table_Adds($edit,$level,$friend,$nparticipants,$addeds)
    {
        $action=$this->CGI_GET("Action");
        
        $table=array();
        if (
              preg_match('/^(Inscribe|Inscription)$/',$action)
              &&
              !$this->LatexMode()
              &&
              $nparticipants<$level[ "NParticipants" ]
           )
        {
            array_push
            (
               $table,
               $this->H(5,$this->MyLanguage_GetMessage("Participants_Friend_Table_New_Title")),
               $this->Participants_Friend_Level_Titles()
            );

            for ($n=$nparticipants+1;$n<=$level[ "NParticipants" ];$n++)
            {
                $added=FALSE;
                if (!empty($added[ $n ])) { $added=TRUE; }

                array_push
                (
                   $table,
                   $this->Participant_Friend_Level_Empty_Row
                   (
                      $edit,
                      $n,
                      $level,
                      $friend,
                      $added
                   )
                );
            }
        }

        return $table;
    }
    
}

?>