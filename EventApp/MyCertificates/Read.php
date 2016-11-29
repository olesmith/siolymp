<?php

class MyCertificates_Read extends MyCertificates_Latex
{
    var $__Datas__=array();
    
    //*
    //* function Certificate_Read_Data_Table, Parameter list: $cert,$data
    //*
    //* Name of subdata sql table.
    //*

    function Certificate_Read_Data_Table($cert,$data)
    {
        $sqltable="";
        $module=$data."s";
        if (preg_grep('/^'.$data.'$/',$this->UnitDatas))
        {
            $sqltable=$this->SqlUnitTableName($module);
        }
        elseif (preg_grep('/^'.$data.'$/',$this->EventDatas))
        {
            $sqltable=$this->SqlEventTableName($module,array("ID" => $cert[ "Event" ]));
        }
        
        return $sqltable;
    }

    
    //*
    //* function Certificate_Read_Data, Parameter list: &$cert,$data,$sqltable=""
    //*
    //* Reads certificate sub data.
    //*

    function Certificate_Read_Data(&$cert,$data,$objmethod="")
    {
        if (empty($objmethod))
        {
            $objmethod=$data."sObj";
        }

        if (empty($this->__Datas__[ $data ]))
        {
            $this->__Datas__[ $data ]=array();
        }
        
        $cert[ $data."_Hash" ]=array();
        $cert[ $data."_Table" ]="";
        if (!empty($cert[ $data ]) && empty($cert[ $data."_Hash" ]))
        {
            if (empty($this->__Datas__[ $data ][ $cert[ $data ] ]))
            {
                $this->__Datas__[ $data ][ $cert[ $data ] ]=
                    $this->$objmethod()->Sql_Select_Hash
                    (
                        array("ID" => $cert[ $data ],),
                        array(),
                        FALSE,
                        $this->$objmethod()->SqlTableName()
                    );
            }
        
            $cert[ $data."_Hash" ]=$this->__Datas__[ $data ][ $cert[ $data ] ];
            
            //Usefull for debugging
            $cert[ $data."_Table" ]=$this->$objmethod()->SqlTableName();
        }

        return $cert[ $data."_Hash" ];
    }

    //*
    //* function Certificate_Read_Datas, Parameter list: &$cert
    //*
    //* Reads certificate sub data.
    //*

    function Certificate_Read_Datas(&$cert)
    {
        foreach
            (
                array_merge($this->UnitDatas,$this->EventDatas)
                as $data
            )
        {
            $this->Certificate_Read_Data
            (
                $cert,
                $data
            );
        }
    }
    
    //*
    //* function Certificate_Read, Parameter list: $cert
    //*
    //* Reads certificate sub data.
    //*

    function Certificate_Read($cert)
    {
        $this->Certificate_Read_Datas($cert);

        $this->Certificate_Verify($cert);
        
        if (!empty($cert[ "Submission_Hash" ]))
        {
            $cert[ "Submission_Hash" ][ "Authors" ]=
                join("\\\\\\\\\n",$this->SubmissionsObj()->Submission_Authors_Get($cert[ "Submission_Hash" ]));
        }
        
        $cert[ "Event_Hash" ][ "DateSpan" ]=$this->EventsObj()->Event_Date_Span($cert[ "Event_Hash" ]);
                
        return $cert;
    }
}

?>