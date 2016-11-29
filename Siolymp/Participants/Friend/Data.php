<?php

class Participants_Friend_Data extends Participants_Friend_Where
{
    
    //*
    //* function Participants_Friend_Data_Group, Parameter list: 
    //*
    //* Detetect data to show for participants. Depends on current action.
    //*

    function Participants_Friend_Data_Group()
    {
        $action=$this->CGI_GET("Action");
        
        return $this->InscriptionsObj()->Actions($action,"DataGroup");
    }

    //*
    //* function Participants_Friend_Data_Group_Edit, Parameter list: 
    //*
    //* Detetect whether data group is editable.
    //*

    function Participants_Friend_Data_Group_Edit()
    {
        $action=$this->CGI_GET("Action");
        
        return $this->InscriptionsObj()->Actions($action,$this->Profile())-1;
    }

    
    //*
    //* function Participants_Friend_Data, Parameter list: 
    //*
    //* Detetect all data to show for participants. Depends on $action.
    //*

    function Participants_Friend_Data()
    {
        return
            array_merge
            (
               $this->Participants_Friend_Data_Show(),
               $this->Participants_Friend_Data_Edit()
            );
    }
    //*
    //* function Participants_Friend_Data_Show, Parameter list: 
    //*
    //* Detetect data to show for participants. Depends on $action.
    //*

    function Participants_Friend_Data_Show()
    {
        $datas=
            $this->ItemDataGroups
            (
               $this->Participants_Friend_Data_Group(),
               "ShowDatas"
            );

        if ($this->LatexMode())
        {
            $datas=$this->MyMod_Datas_Actions_Remove($datas);
        }

        return $datas;
    }
    
    //*
    //* function Participants_Friend_Data_Edit, Parameter list: 
    //*
    //* Detetect data to edit for participants. Depends on $action.
    //*

    function Participants_Friend_Data_Edit()
    {
        $datas=
            $this->ItemDataGroups
            (
               $this->Participants_Friend_Data_Group(),
               "EditDatas"
            );

        if ($this->LatexMode())
        {
            $datas=$this->MyMod_Datas_Actions_Remove($datas);
        }

        return $datas;
    }
    
}

?>