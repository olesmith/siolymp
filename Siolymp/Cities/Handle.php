<?php



class Cities_Handle extends Cities_Distribution
{   
    //*
    //* function City_Envelopes_Handle, Parameter list: $city=array()
    //*
    //* Returns cell with no of participants inscribed for $city.
    //*

    function City_Envelopes_Handle($city=array())
    {
        $this->RoomsObj()->Room_Envelopes_Handle();
    }
}

?>