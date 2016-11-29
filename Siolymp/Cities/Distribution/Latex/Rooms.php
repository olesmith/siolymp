<?php


class Cities_Distribution_Latex_Rooms extends Cities_Distribution_Latex_Wall
{
    //*
    //* function Cities_Distribution_Latex_Rooms, Parameter list: 
    //*
    //* Handles Cities distribution.
    //*

    function Cities_Distribution_Latex_Rooms()
    {
        $this->Cities_Distribution_Init();
        $this->ApplicationObj()->SetLatexMode();
        
        $latex="";
        foreach ($this->ItemHashes as $city)
        {
            $latex.=$this->City_Distribution_Latex_Rooms_Tables($city);
        }

        $latex=
            $this->GetLatexSkel("Head.tex").
            $latex.
            $this->GetLatexSkel("Tail.tex").
            "";
        
        //$this->ShowLatexCode($latex);
        $this->RunLatexPrint
        (
           "Participants.Wall.".
           //$this->Text2Sort($texfile).".".
           $this->MTime2FName().
           ".tex",
           $latex
        );

        exit();
    }
    
    //*
    //* function City_Distribution_Latex_Rooms_Tables, Parameter list: $city
    //*
    //* Creates $city table pages.
    //*

    function City_Distribution_Latex_Rooms_Tables($city)
    {
        $rooms=$this->RoomsObj()->GetCityRooms($city);
        
        $pageclear="\n\n\\clearpage\n\n";
        $this->Participants=array();

        $latex="";
        foreach ($rooms as $room)
        {
            $latex.=
                $this->City_Distribution_Latex_Room_Tables($city,$room).
                $pageclear;
        }

        $latex.=
            $this->City_Distribution_Latex_Not_Distributed_Tables($city);
        
        return $latex;
    }

    //*
    //* function City_Distribution_Latex_Not_Distributed_Table, Parameter list: $city
    //*
    //* Creates $city non distributed table pages.
    //*

    function City_Distribution_Latex_Not_Distributed_Tables($city)
    {
        return
            $this->ParticipantsObj()->Participants_Latex_Table
            (
               0,
               $this->City_Distribution_Not_Distributed_Participants($city),
               
               $this->H(2,$this->MyLanguage_GetMessage("Cities_Distribution_Latex_Wall_Title")).
               $this->City_Distribution_Latex_Info_Table($city).
               "",
               TRUE
            );
    }
    
    //*
    //* function City_Distribution_Latex_Room_Tables, Parameter list: $city,$room
    //*
    //* Creates $city $room table pages.
    //*

    function City_Distribution_Latex_Room_Tables($city,$room)
    {
        return
            $this->ParticipantsObj()->Participants_Latex_Table
            (
               0,
               $this->City_Distribution_Room_Participants($city,$room),
               
               $this->H(2,$this->MyLanguage_GetMessage("Cities_Distribution_Latex_Rooms_Title")).
               $this->City_Distribution_Latex_Room_Info_Table($city,$room).
               "",
               TRUE
            );
    }
}

?>