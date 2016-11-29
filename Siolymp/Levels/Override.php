<?php

class Levels_Override extends Levels_Access
{
    //*
    //* function SumVarsRows, Parameter list: $datas,$sums,$items
    //*
    //* Creates sumvar row. Data summed are listed in $this->SumVars and summed above in $sums.
    //* Alternative to SumVarsRow, see Mysql2::ItemsTableTable.
    //* 

    function SumVarsRows($datas,$sums,$items)
    {
        $row=parent::SumVarsRow($datas,$sums,$items);
        
        return
            array
            (
               $row,
               array
               (
                  
                  $this->H
                  (
                     5,
                     $this->MyLanguage_GetMessage("Levels_Rooms_Capacity_Cell_Title").
                     ": ".
                     $this->Levels_Rooms_Capacity()
                  )
               )
            );
    }
}

?>