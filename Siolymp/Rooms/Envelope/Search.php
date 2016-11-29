<?php

class Rooms_Envelope_Search extends Rooms_Access
{
    //*
    //* function Room_Envelopes_Search_Table, Parameter list: 
    //*
    //* Creates one row table for fast participant search .
    //*
    
    function Room_Envelopes_Search_Table()
    {
        return
            array
            (
                array
                (
                    $this->B("Localizar Participantes:"),
                    $this->MakeInput
                    (
                        "Search_Name",
                        $this->CGI_POST("Search_Name"),
                        20
                    ),
                    $this->Html_Input_Button_Text("Localizar","Search",1),
                ),
            );
    }

    //*
    //* function Room_Envelopes_Search_Result_Table, Parameter list: 
    //*
    //* Creates one row table for fast participant search .
    //*
    
    function Room_Envelopes_Search_Result_Table()
    {
        $search=$this->CGI_POST("Search_Name");
        if (empty($search)) { return ""; }
        

        $datas=array("Name","City","Room","Level");
        

        $search=$this->Html2Sort($search);
        $search=preg_replace('/\s+/',"%",$search);
        $search=strtolower($search);
        $participants=
            $this->ParticipantsObj()->Sql_Select_Hashes
            (
                $this->UnitEventWhere(array("__SortName" => "LOWER(SortName) LIKE '%".$search."%'")),
                $datas
            );

        array_push($datas,"Participant_Envelope_Link");
        
        return
            $this->ParticipantsObj()->MyMod_Items_Table_Html(0,$participants,$datas);
    }
    //*
    //* function Room_Envelopes_Search_Form, Parameter list: 
    //*
    //* Creates one row table for fast participant search .
    //*
    
    function Room_Envelopes_Search_Form()
    {
        return
            $this->Html_Form
            (
               $this->Html_Table
               (
                  "",
                  $this->Room_Envelopes_Search_Table()
               ).
               $this->Room_Envelopes_Search_Result_Table(),
               1,
               "",
               array(),
               "",
               "CITY"
            ).
            "";
    }

    
}

?>