<?php

class Cities_Distribution_City_Data extends Cities_Distribution_City_Read
{
    //*
    //* function City_Distribution_Title, Parameter list: $city
    //*
    //* City title.
    //*

    function City_Distribution_Title($city)
    {
        return
            $this->H
            (
               4,
               $this->CitiesObj()->MyMod_ItemName().": ".$city[ "Name" ]
            );
    }
    
   //*
    //* function City_Distribution_Data, Parameter list: 
    //*
    //* City info row.
    //*

    function City_Distribution_Data()
    {
        $datas=$this->CitiesObj()->GetGroupDatas($this->CityGroup,FALSE);
        if ($this->LatexMode())
        {
            $datas=$this->MyMod_Datas_Actions_Remove($datas);
        }
        
        return $datas;
    }
}

?>