<?php

class Levels_Exam extends Levels_Questions
{
    //*
    //* function Levels_Exam_Form, Parameter list:  
    //*
    //* Creates form for editing participants.
    //*

    function Levels_Exam_Form()
    {
        $this->QuestionsObj()->Sql_Table_Structure_Update();
        $this->QuestionsObj()->ItemData("ID");
        $this->QuestionsObj()->ItemDataGroups("Basic");
        $this->QuestionsObj()->Actions("Show");
        
         return
            $this->Html_Table
            (
               $this->Levels_Exam_Titles(),
               $this->Levels_Exam_Table()
            ).
            "";
    }
    
    //*
    //* function Levels_Exam_Table, Parameter list:  $edit=0
    //*
    //* Creates table for editing participants.
    //*

    function Levels_Exam_Table($edit=0)
    {
        $table=array();
        $n=1;

        $levels=$this->ReadCurrentLevels();

        $last=$levels[ count($levels)-1 ][ "ID" ];
        
        foreach ($levels as $level)
        {
            if ($this->CGI_POSTint("Update")==1)
            {
                $this->Level_Exam_Update($level);
            }

            //$this->Level_Questions_Clean($level);
        
            $islast=FALSE;
            if ($level[ "ID" ]==$last) { $islast=TRUE; }
            
            
            $table=array_merge
            (
               $table,
               $this->Level_Exam_Rows($edit,$n++,$level,$islast)
            );
        }

        //array_push($table,$this->Levels_Exam_Totals());

        return $table;
    }

    //*
    //* function Levels_Exam_Table_Data_Show, Parameter list: 
    //*
    //* Returns data to show from groups. Uses ShowData in $this->ItemDataGroups[ "Exam" ]. 
    //*

    function Levels_Exam_Table_Data_Show()
    {
        return $this->ItemDataGroups("Exam","ShowData");
    }
    
    //*
    //* function Levels_Exam_Table_Data_Edit, Parameter list: 
    //*
    //* Returns data to show from groups. Uses EditData in $this->ItemDataGroups[ "Exam" ]. 
    //*

    function Levels_Exam_Table_Data_Edit()
    {
        return $this->ItemDataGroups("Exam","EditData");
    }
    
    //*
    //* function Level_Exam_Rows, Parameter list: $edit,$n,$level,$islast
    //*
    //* Creates trow for $level.
    //*

    function Level_Exam_Rows($edit,$n,$level,$islast)
    {
        $rows=array
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
            $this->Level_Questions_Table_Html($level,$edit,$islast),
        );

        return $rows;
    }
    
    //*
    //* function Level_Exam_Update, Parameter list: &$level
    //*
    //* Creates trow for $level.
    //*

    function Level_Exam_Update(&$level)
    {
        $level=
            $this->MyMod_Item_Update_CGI
            (
               $level,
               $this->Levels_Exam_Table_Data_Edit(),
               $level[ "ID" ]."_"
            );
    }
    
    //*
    //* function Levels_Exam_Titles, Parameter list: 
    //*
    //* Creates title row for displaying $level levels info.
    //*

    function Levels_Exam_Titles()
    {
        return
            array_merge
            (
               $this->GetDataTitles($this->Levels_Exam_Table_Data_Show()),
               $this->GetDataTitles($this->Levels_Exam_Table_Data_Edit())
            );
    }
}

?>
