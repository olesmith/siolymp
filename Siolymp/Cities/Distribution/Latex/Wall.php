<?php


class Cities_Distribution_Latex_Wall extends Cities_Distribution_Participants
{
    //*
    //* function Cities_Distribution_Latex_Wall, Parameter list: 
    //*
    //* Handles Cities distribution.
    //*

    function Cities_Distribution_Latex_Wall()
    {
        $this->Cities_Distribution_Init();
        $this->ApplicationObj()->SetLatexMode();
        
        $latex="";
        
        $n=1;
        foreach ($this->ItemHashes as $city)
        {
            $latex.=
                $this->City_Distribution_Latex_Wall_Tables($city);
            $n++;
        }

        $latex=
            $this->GetLatexSkel("Head.tex").
            $latex.
            $this->GetLatexSkel("Tail.tex").
            "";
        
        //$this->ShowLatexCode($latex);exit();
        
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
    //* function City_Distribution_Latex_Wall_Tables, Parameter list: $city
    //*
    //* Handles Cities distribution.
    //*

    function City_Distribution_Latex_Wall_Tables($city)
    {
        $this->Particpants=array();
        
        $participants=$this->City_Distribution_Participants($city);

        $pagehead=
            $this->H(2,$this->MyLanguage_GetMessage("Cities_Distribution_Latex_Wall_Title")).
            $this->City_Distribution_Latex_Info_Table($city).
           "\n\n";
        $pageclear="\n\n\\clearpage\n\n";
        
        $latex="";
        if (count($participants)>0)
        {
            $latex.=
                $this->ParticipantsObj()->Participants_Latex_Table
                (
                   0,
                   $participants,
                   $pagehead
                ).
                $pageclear;
        }
       
        return $latex;
    }
}

?>