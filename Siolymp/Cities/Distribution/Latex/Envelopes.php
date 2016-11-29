<?php


class Cities_Distribution_Latex_Envelopes extends Cities_Distribution_Latex_Rooms
{
    //*
    //* function Cities_Distribution_Latex_Envelopes, Parameter list: 
    //*
    //* Handles Cities distribution.
    //*

    function Cities_Distribution_Latex_Envelopes()
    {
        $this->Cities_Distribution_Init();
        $this->ApplicationObj()->SetLatexMode();
        
        $latex="";
        foreach ($this->ItemHashes as $city)
        {
            $latex.=$this->City_Distribution_Latex_Envelopes_Tables($city);
        }

        $latex=
            $this->GetLatexSkel("Head.tex").
            $latex.
            $this->GetLatexSkel("Tail.tex").
            "";
        
        //$this->ShowLatexCode($latex);
        $this->RunLatexPrint
        (
           "Participants.Envelopes.".
           //$this->Text2Sort($texfile).".".
           $this->MTime2FName().
           ".tex",
           $latex
        );

        exit();
    }
    
    //*
    //* function City_Distribution_Latex_Envelopes_Tables, Parameter list: $city
    //*
    //* Creates $city table pages.
    //*

    function City_Distribution_Latex_Envelopes_Tables($city)
    {
        $rooms=$this->RoomsObj()->GetCityRooms($city);
        
        $this->Participants=array();
        $pageclear="\n\n\\clearpage\n\n";

        $latex="";
        foreach ($rooms as $room)
        {
            $latex.=
                $this->City_Distribution_Latex_Envelope_Tables($city,$room).
                $pageclear;
        }

        $latex.=
            $this->City_Distribution_Latex_Undistributed_Envelope_Tables($city).
            $pageclear;
        
        return $latex;
    }
    
    //*
    //* function City_Distribution_Latex_Envelope_Tables, Parameter list: $city,$room
    //*
    //* Creates $city $room table pages.
    //*

    function City_Distribution_Latex_Envelope_Tables($city,$room)
    {
        return
            $this->ParticipantsObj()->Participants_Latex_Marks_Table
            (
               0,
               $city,$room,
               $this->City_Distribution_Room_Participants($city,$room)
            );
    }

    //*
    //* function City_Distribution_Latex_Undistributed_Envelope_Table, Parameter list: $city
    //*
    //* Creates $city non distributed table pages.
    //*

    function City_Distribution_Latex_Undistributed_Envelope_Tables($city)
    {
        return
            $this->ParticipantsObj()->Participants_Latex_Marks_Table
            (
               0,
               $city,array(),
               $this->City_Distribution_Not_Distributed_Participants($city)
            );
    }
    
}

?>