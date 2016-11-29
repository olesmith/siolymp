<?php

class Cities_Distribution_City_Rows extends Cities_Distribution_City_Data
{
    //*
    //* function City_Distribution_Row, Parameter list: $n,$city
    //*
    //* City info row.
    //*

    function City_Distribution_Row($n,$city)
    {
        return
            $this->CitiesObj()->MyMod_Items_Table_Row
            (
               0,
               $n,
               $city,
               $this->City_Distribution_Data(FALSE)
            );
    }
    
     //*
    //* function City_Distribution_Titles, Parameter list: 
    //*
    //* City info titles.
    //*

    function City_Distribution_Titles()
    {
        return
            $this->CitiesObj()->GetDataTitles
            (
               $this->City_Distribution_Data(FALSE)
            );
    }
        
}

?>