<?php

class Questions_Level extends Questions_Access
{
    //*
    //* function Questions_Level_Table_Html, Parameter list: $level,$edit,$islast
    //*
    //* Creates Html table for editing $level Questions.
    //*

    function Questions_Level_Table_Html($level,$edit,$islast)
    {
         return
            $this->Html_Table
            (
               $this->Questions_Level_Titles(),
               $this->Questions_Level_Table($level,$edit,$islast)
            ).
            "";
    }
    
    //*
    //* function Questions_Level_Table_Data, Parameter list: 
    //*
    //* Returns edit and show datas.
    //*

    function Questions_Level_Table_Data()
    {
        return
            array_merge
            (
               $this->Questions_Level_Table_Data_Show(),
               $this->Questions_Level_Table_Data_Edit()
            );
    }
    //*
    //* function Questions_Level_Table_Data_Show, Parameter list: 
    //*
    //* Returns data to show from groups. Uses ShowData in $this->ItemDataGroups[ "Exam" ]. 
    //*

    function Questions_Level_Table_Data_Show()
    {
        return $this->ItemDataGroups("Basic","ShowData");
    }
    
    //*
    //* function Questions_Level_Table_Data_Edit, Parameter list: 
    //*
    //* Returns data to show from groups. Uses EditData in $this->ItemDataGroups[ "Exam" ]. 
    //*

    function Questions_Level_Table_Data_Edit()
    {
        return $this->ItemDataGroups("Basic","EditData");
    }
    
    //*
    //* function Questions_Level_Clean, Parameter list: $level
    //*
    //* Cleans level questions: ie, deletes questions
    //* with Number larger that $level[ ""NQuestions ]
    //*

    function Questions_Level_Clean($level)
    {
        $where=
            $this->UnitEventWhere
            (
               array
               (
                  "Level" => $level[ "ID" ],
                  "__Number" => "Number>'".($level[ "NQuestions" ])."'",
               )
            );
        //$res=$this->Sql_Delete_Items($where);
        $where[ "msg" ]="disabled";
        var_dump($where);
    }
    
    //*
    //* function Questions_Level_Read, Parameter list: $level
    //*
    //* Creates table for editing $level Questions.
    //*

    function Questions_Level_Read($level)
    {
        $where=
            $this->UnitEventWhere
            (
               array("Level" => $level[ "ID" ],)
            );
        
        $questions=
            $this->QuestionsObj()->Sql_Select_Hashes
            (
               $where
            );

        $questions=$this->MyHash_HashesList_2IDs($questions,"Number");

        for ($m=1;$m<=$level[ "NQuestions" ];$m++)
        {
             if (empty($questions[ $m ]))
            {
                $question=$where;
                $question[ "Number" ]=$m;
                $question[ "Max" ]=$this->QuestionsObj()->ItemData("Max","Default");
                
                $this->QuestionsObj()->Sql_Insert_Item($question);
                        var_dump("create item");
                        var_dump($question);

                $questions[ $m ]=$question;
            }
            else
            {
                $question=array_shift($questions[ $m ]);
                if (count($questions[ $m ])>0)
                {
                    foreach ($questions[ $m ]  as $rquestion)
                    {
                        var_dump("delete items??");
                        var_dump($rquestion);
                    }
                }
                
                $questions[ $m ]=$question;
           }
        }
        
        $levels=array_keys($questions);
        
        return $questions;
    }

    
    //*
    //* function Questions_Level_Table, Parameter list: $level,$edit,$islast
    //*
    //* Creates table for editing $level Questions.
    //*

    function Questions_Level_Table($level,$edit,$islast)
    {
        $questions=$this->Questions_Level_Read($level);

        $table=array();

        $sum=0.0;
        for ($m=1;$m<=$level[ "NQuestions" ];$m++)
        {
            $table=array_merge
            (
               $table,
               $this->Level_Question_Rows($edit,$level,$m,$questions[ $m ])
            );

            $sum+=$questions[ $m ][ "Max" ];
        }
       
        array_push
        (
            $table,
            $this->SumVarsRow
            (
               $this->Questions_Level_Table_Data(),
               array("Max" => $sum)
             )
        );

        if ($edit==1 && !$islast)
        {
            array_push($table,$this->Buttons());
        }

        return $table;
    }

    
    //*
    //* function  Level_Question_Rows, Parameter list: $edit,$level,$m,$question
    //*
    //* Creates trow for $level.
    //*

    function Level_Question_Rows($edit,$level,$m,$question)
    {
        if ($edit==1 && $this->CGI_POSTint("Update")==1)
        {
            $this->Questions_Level_Update($level,$m,$question);
        }
        
        $rows=array
        (
            array_merge
            (
               $this->QuestionsObj()->MyMod_Items_Table_Row
               (
                  0,
                  $m,
                  $question,
                  $this->Questions_Level_Table_Data_Show(),
                  TRUE
               ),
               $this->QuestionsObj()->MyMod_Items_Table_Row
               (
                  $edit,
                  $m,
                  $question,
                  $this->Questions_Level_Table_Data_Edit(),
                  TRUE,
                  $level[ "ID" ]."_".$m."_"
               )
            )
        );

        return $rows;
    }
    
    //*
    //* function  Questions_Level_Update, Parameter list: $level,$m,&$question
    //*
    //* Creates trow for $level.
    //*

    function  Questions_Level_Update($level,$m,&$question)
    {
        $question=
            $this->MyMod_Item_Update_CGI
            (
               $question,
               $this->Questions_Level_Table_Data_Edit(),
               $level[ "ID" ]."_".$m."_"
            );
    }
    
    //*
    //* function Questions_Level_Titles, Parameter list: 
    //*
    //* Creates title row for displaying $level levels info.
    //*

    function Questions_Level_Titles()
    {
        return
            array_merge
            (
               $this->GetDataTitles($this->Questions_Level_Table_Data_Show()),
               $this->GetDataTitles($this->Questions_Level_Table_Data_Edit())
            );
    }
}

?>
