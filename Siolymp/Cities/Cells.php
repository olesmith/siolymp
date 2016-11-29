<?php

class Cities_Cells extends Cities_Access
{
    //*
    //* function Cities_Noof_Participants, Parameter list: $city
    //*
    //* Returns cell with no of participants inscribed for $city.
    //*

    function Cities_Noof_Participants($city=array())
    {
        if (empty($city))
        {
            return $this->Language_Message("Cities_Noof_Participants_Cell_Title");
        }
        return $this->ParticipantsObj()->Participants_Noof(array("City" => $city[ "ID" ]));
    }
    
    //*
    //* function Cities_Noof_Participants_Cell, Parameter list: $edit=0,$city=array()
    //*
    //* Returns cell with no of participants inscribed for $city.
    //*

    function Cities_Noof_Participants_Cell($edit=0,$city=array())
    {
        if (is_array($edit)) { $city=$edit; }
        
        if (empty($city))
        {
            return $this->Language_Message("Cities_Noof_Participants_Cell_Title");
        }
        
        return
            $this->Div
            (
               $this->Cities_Noof_Participants($city),
               array("CLASS" => 'right')
            );
            
    }
    //*
    //* function Cities_Noof_Rooms, Parameter list: $city=array()
    //*
    //* Returns cell with no of rooms in $city.
    //*

    function Cities_Noof_Rooms($city=array())
    {
        if (empty($city))
        {
            return $this->Language_Message("Cities_Rooms_Noof_Cell_Title");
        }
        
        return $this->RoomsObj()->Rooms_Noof(array("City" => $city[ "ID" ]));
    }
    
    //*
    //* function Cities_Noof_Rooms_Cell, Parameter list: $edit=0,$city=array()
    //*
    //* Returns cell with no of rooms in $city.
    //*

    function Cities_Noof_Rooms_Cell($edit=0,$city=array())
    {
        if (is_array($edit)) { $city=$edit; }
        
        if (empty($city))
        {
            return $this->Language_Message("Cities_Rooms_Noof_Cell_Title");
        }
        
        return
            $this->Div
            (
               $this->Cities_Noof_Rooms($city),
               array("CLASS" => 'right')
            );
    }
    
    //*
    //* function Cities_Capacity, Parameter list: $city=array()
    //*
    //* Returns cell with no of participants inscribed for $city.
    //*

    function Cities_Capacity($city=array())
    {
        if (empty($city))
        {
            return $this->Language_Message("Cities_Rooms_Capacity_Cell_Title");
        }
        
        return $this->RoomsObj()->Rooms_Capacity(array("City" => $city[ "ID" ]));
    }
    
    //*
    //* function Cities_Capacity, Parameter list: $edit=0,$city=array()
    //*
    //* Returns cell with no of participants inscribed for $city.
    //*

    function Cities_Capacity_Cell($edit=0,$city=array())
    {
        if (is_array($edit)) { $city=$edit; }
        
        if (empty($city))
        {
            return $this->Language_Message("Cities_Rooms_Capacity_Cell_Title");
        }
        
        $cell=$this->Cities_Capacity($city);
        if (empty($cell))
        {
            $cell="-";
        }
        
        return $this->Div($cell,array("CLASS" => 'right'));
    }
    
    //*
    //* function Cities_Vacancies, Parameter list: $city=array()
    //*
    //* Returns cell with no of participants inscribed for $city.
    //*

    function Cities_Vacancies($city=array())
    {
        if (empty($city))
        {
            return $this->Language_Message("Cities_Rooms_Vacancies_Cell_Title");
        }
        
        return
            $this->Cities_Capacity($city)
            -
            $this->Cities_Noof_Participants($city);
    }
    
    
    //*
    //* function Cities_Vacancies_Cell, Parameter list: $edit=0,$city=array()
    //*
    //* Returns cell with no of participants inscribed for $city.
    //*

    function Cities_Vacancies_Cell($edit=0,$city=array())
    {
        if (is_array($edit)) { $city=$edit; }
        
        if (empty($city))
        {
            return $this->Language_Message("Cities_Rooms_Vacancies_Cell_Title");
        }
        
        $cell=$this->Cities_Vacancies($city);


        $class="";
        if (empty($cell))
        {
            $cell="-";
        }
        elseif ($cell<0)
        {
            $class="errors";
        }
        else
        {
            $class="success";
        }

        if (!empty($class))
        {
            $cell=$this->Span($cell,array("CLASS" => $class));
        }
        
        return $this->Div($cell,array("CLASS" => 'right'));
    }
}

?>