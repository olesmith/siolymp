<?php

include_once("Distribution/City.php");
include_once("Distribution/Room.php");
include_once("Distribution/Participants.php");
include_once("Distribution/Latex.php");


class Cities_Distribution extends Cities_Distribution_Latex
{
    var $CityGroup="Distribution";
    var $RoomGroup="Distribution";
    var $LevelGroup="Assessments";
    
    var $Rooms=array();
    var $Levels=array();
    var $Participants=array();
    
    //*
    //* function Cities_Distribution_Init, Parameter list: 
    //*
    //* Initializes necessary modules.
    //*

    function Cities_Distribution_Init()
    {
        foreach (array("ParticipantsObj","LevelsObj","RoomsObj","CitiesObj") as $obj)
        {
            $this->$obj()->ItemData("ID");
            $this->$obj()->Actions("Show");
            $this->$obj()->Singular=FALSE;
        }
        
        $this->Levels=$this->LevelsObj()->ReadCurrentLevels();
    }
    
        
    //*
    //* function Cities_Distribution_Handle, Parameter list: $edit=1
    //*
    //* Handles Cities distribution.
    //*

    function Cities_Distribution_Handle($edit=1)
    {
        $this->Cities_Distribution_Init();
        $this->MyMod_Latex_Read();
        
        if ($this->LatexMode())
        {
            $cities=$this->GetCurrentCities();

            $this->Cities_Distribution_Latex($cities);
            exit();
        }

        $action=$this->CGI_GET("Action");
        $city=$this->City_CGI_Value();
        if (!empty($city))
        {
            $city=array("ID" => $city);
        }
        
        $taction="Distribute";
        if (preg_match('/^Zero/',$action))
        {
            $taction="Zero";
        }

        echo
            $this->H
            (
               1,
               $this->MyActions_Entry_Title($taction)
            ).
            $this->GenerateLatexHorMenu($city).
            $this->BR().
            $this->Html_Form
            (
               $this->Html_Table
               (
                  $this->City_Distribution_Titles(),
                  $this->Cities_Distribution_Table($edit)
               ),
               $edit,
               "",
               array(),
               "Distribute"
            );
        
    }
    
    //*
    //* function Cities_Distribution_Handle, Parameter list: $edit=1
    //*
    //* Handles Cities distribution.
    //*

    function Cities_Distribution_Table($edit=1)
    {
        $cityid=$this->CGI_GETint("ID");
        if (empty($cityid))
        {
            $cityid=$this->CGI_GETint("City");
        }

        $cities=$this->GetCurrentCities();

        $table=array();
        $n=1;
        foreach ($cities as $city)
        {
            array_push
            (
               $table,
               $this->City_Distribution_Row($n,$city)
            );
            
            if ($cityid==$city[ "ID" ])
            {
                $table=array_merge
                (
                   $table,
                   $this->City_Distribution_Table($edit,$n,$city)
                );

                if ($n<count($cities))
                {
                    array_push
                    (
                       $table,
                       $this->Html_Table_Head_Row($this->City_Distribution_Titles())
                    );
                }
            }

            $n++;
        }
        
        return $table;
    }
    //*
    //* function City_Distribution_Level_Data, Parameter list: 
    //*
    //* Room info row.
    //*

    function City_Distribution_Level_Data($single=TRUE)
    {
        $datas=$this->LevelsObj()->GetGroupDatas($this->LevelGroup,$single);

        if ($this->LatexMode())
        {
            $datas=$this->LevelsObj()->MyMod_Datas_Actions_Remove($datas);
        }
        
        return $datas;
    }
}

?>