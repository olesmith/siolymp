<?php


class Participants_Marks extends Participants_Levels
{
    //*
    //* function Participant_Data, Parameter list: 
    //*
    //* Marks participant Show data.
    //*

    function Participants_Marks_Data()
    {
        $datas=array("No",);
        if (!$this->LatexMode()) { array_push($datas,"Edit"); }
        
        array_push($datas,"Name");

        return $datas;
    }
    
    //*
    //* function Participants_Marks_Titles, Parameter list: $level
    //*
    //* Title row for participant mark tables.
    //*

    function Participants_Marks_Titles($level)
    {
        $titles1=
            $this->GetDataTitles
            (
               $this->Participants_Marks_Data()
            );

        array_push($titles1,"Instituição");
        
        $titles2=
            array
            (
               $this->MultiCell
               (
                  $this->MyMod_ItemName("ItemsName"),
                  count($titles1)
               )
            );
                       
        for ($n=1;$n<=$level[ "NQuestions" ];$n++)
        {
            array_push($titles1,$n);
        }

        array_push
        (
           $titles2,
           $this->MultiCell
           (
              $this->AssessmentsObj()->MyMod_ItemName("ItemsName"),
              $level[ "NQuestions" ]
           ),
           "",""
        );
                       
        array_push($titles1,$this->ApplicationObj()->Sigma,$this->ApplicationObj()->Mu);
        
        return array($titles2,$titles1);
    }
    
    //*
    //* function Participant_Marks_Row, Parameter list: $edit,$n,$level,$participant
    //*
    //* Creates one participant marks row.
    //*

    function Participant_Marks_Row($edit,$n,$level,$participant)
    {
        $participant[ "Name" ]=$this->TrimCase($participant[ "Name" ]);

        $row=
            $this->MyMod_Items_Table_Row
            (
               0,
               $n,
               $participant,
               $this->Participants_Marks_Data()
            );

        array_push
        (
           $row,
           $this->FriendsObj()->Sql_Select_Hash_Value($participant[ "Friend" ],"School")
        );

        
        $where=
            array
            (
               "Level" => $level[ "ID" ],
               "Participant" => $participant[ "ID" ],
            );
        
        $where=$this->UnitEventWhere($where);
        
        $marks=$this->AssessmentsObj()->Sql_Select_Hashes($where);
        $marks=$this->MyHash_HashesList_2ID($marks,"Question");
        
        $total=0.0;
        for ($n=1;$n<=$level[ "NQuestions" ];$n++)
        {
            $mark="";
            if (!empty($marks[ $n ]))
            {
                $mark=$this->AssessmentsObj()->MyMod_Data_Field($edit,$marks[ $n ],"Mark");
                $total+=$marks[ $n ][ "Mark" ];
            }
            
            array_push($row,$mark);
        }

        array_push
        (
           $row,
           sprintf("%.1f",$total),
           sprintf("%.1f",$total/$level[ "NQuestions" ])
        );
        
        return $row;
    }
    
    //*
    //* function Participants_Marks_Rows, Parameter list: $edit,$level,$participants
    //*
    //* Generates $participants marks rows.
    //*

    function Participants_Marks_Rows($edit,$level,$participants)
    {
        $p=1;

        $table=array();
        foreach ($participants as $participant)
        {
            array_push
            (
               $table,
               $this->Participant_Marks_Row(0,$p++,$level,$participant)
            );            
        }

        return $table;
    }
}

?>