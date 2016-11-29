<?php

trait MyMod_Handle_Export_Form
{
    //*
    //* Fabricates the Export Form, possibly calling DoExport.
    //* $fields are the Export vars, if undef calls ReadExportCGI
    //* to get it.
    //*

    function MyMod_Handle_Export_Form()
    {  
        $this->MyMod_Handle_Export_Table_Data_Gather();

        if ($this->MyMod_Handle_Export_CGI_Type()=="HTML")
        {
            $this->ApplicationObj->MyApp_Interface_Head();
            $this->MyMod_HorMenu_Echo();

            $this->PostSearchTableText=
                $this->BR().
                $this->Anchor("_EXPORT").
                $this->FrameIt
                (
                    $this->H(2,"Exportar Dados de ".$this->ItemsName).
                    $this->HTMLTable
                    (
                        array("","Dado à incluir","Sortear"),
                        array_merge
                        (
                            $this->MyMod_Handle_Export_Datas_Table(),
                            $this->MyMod_Handle_Export_Types_Table()
                        )
                    ).
                    $this->MakeHidden("Export",1).
                    $this->MakeHidden("Go",1).
                    $this->Buttons("Exportar").
                    "",
                    array("CLASS" => 'exportable')
                ).
                $this->BR().
                "\n";
            
            $action=$this->MyActions_Detect();
       
            echo 
                $this->SearchVarsTable
                (
                    array("DataGroups"),
                    "",
                    $action."#_EXPORT",
                    array(),
                    array(),
                    $this->ModuleName
                ).
                $this->BR();
         }

        $go=$this->GetCGIVarValue("Go");

        if ($go==1)
        {
            $this->MyMod_Handle_Export_Do();
        }

        exit();

    }
}
?>