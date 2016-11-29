<?php

class Certificates_Latex extends Certificates_Read
{
    //*
    //* function Certificate_Latex_Filter_Datas, Parameter list: 
    //*
    //* Generates cert.
    //*

    function Certificate_Latex_Filter_Datas()
    {
        return array_merge(parent::Certificate_Latex_Filter_Datas(),array("City","Level"));
    }
    
    //*
    //* function Certificate_Latex_Filter, Parameter list: $cert,$latex
    //*
    //* Generates cert.
    //*

    function Certificate_Latex_Filter($cert,$latex)
    {
        foreach ($this->Certificate_Latex_Filter_Datas() as $data)
        {
            $this->Certificate_Latex_Filter_Data($data,$cert,$latex);
        }

        return $latex;
    }
}

?>