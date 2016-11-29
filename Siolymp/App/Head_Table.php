<?php

class App_Head_Table extends App_Events
{
    //*
    //* function AppEventTableGroup, Parameter list: &$table,$event,$msgkey,$datas
    //*
    //* Overrides EventApp::AppEventInfoTable.
    //*

    function AppEventTableGroup(&$table,$event,$msgkey,$datas)
    {
        $rtable=
            $this->EventsObj()->MyMod_Item_Table
            (
               0,
               $event,
               array($datas)
             );

        if (count($rtable)>0)
        {
            $table=array_merge
            (
               $table,
               array($this->H(5,$this->MyLanguage_GetMessage($msgkey))),
               array($rtable[0])
            );
        }
    }

    //*
    //* function AppEventInfoTable, Parameter list: $event
    //*
    //* Overrides EventApp::AppEventInfoTable.
    //*

    function AppEventInfoTable($event)
    {
        return $this->EventInfoRow($event);
        
    }
    
    //*
    //* function AppEventInfoPostTable, Parameter list: 
    //*
    //* Overrides EventApp::AppEventInfoTable.
    //*

    function AppEventInfoPostTable()
    {
        $event=$this->Event();
        
        $tabledata=
            array
            (
               array
               (
                  "Name","Date","Status"
               ),
               array
               (
                  "Place","Place_Address","Place_Site",
               ),
               array
               (
                  "EventStart","EventEnd","Inscriptions_Public",
               ),
            );

        $table=
            array_merge
            (
               $this->EventInfoRow($event),
               $this->EventsObj()->MyMod_Item_Table
               (
                  0,
                  $event,
                  $tabledata
               )
            );

        $this->AppEventTableGroup
        (
           $table,
           $event,
           "Event_Inscriptions_Title",
           array("StartDate","EndDate","EditDate",)
        );
        
       
        return $table;
    }
    
   
    //*
    //* function EventInfoRow Parameter list: $event=array()
    //*
    //* Creates row with event-leftlogo, title,
    //*

    function EventInfoRow($event=array())
    {
        if (empty($event)) { $event=$this->Event(); }
        
        $logos=$this->EventLogos();

        $titlecell=$this->H(3,$this->GetRealNameKey($event,"Title"));

        if (count($logos)==2)
        {
            return
                array
                (
                   array
                   (
                      $this->MultiCell($logos[0],2),
                      $this->MultiCell($titlecell,2),
                      $this->MultiCell($logos[1],2),
                   ),
                );
        }
        elseif (count($logos)==1)
        {
            return
                array
                (
                   array
                   (
                      $this->MultiCell($logos[0],6),
                   ),
                   array
                   (
                      $this->MultiCell($titlecell,6),
                   ),
                );
        }
        else
        {
            return
                array
                (
                   array
                   (
                      $this->MultiCell($titlecell,6),
                   ),
                );
        }
    }

    
    //*
    //* function EventLogos, Parameter list: $event=array()
    //*
    //* Returns event logo as list of (2) imgs.
    //*

    function EventLogos($event=array())
    {
        if (empty($event)) { $event=$this->Event(); }
        
        $imgs=array();
        for ($no=1;$no<=2;$no++)
        {
            $img=$this->EventsObj()->MyMod_Data_Field_Logo($event,"HtmlIcon".$no);
            if (!empty($img))
            {
                array_push($imgs,$img);
            }
        }

        //Double if no second
        if (count($imgs)==0) { $imgs=array(); }
        //if (count($imgs)==1) { array_push($imgs,$imsgs[0]); }

        return $imgs;
    }
    
}
