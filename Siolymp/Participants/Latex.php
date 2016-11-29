<?php


class Participants_Latex extends Participants_Marks
{
    //*
    //* function Participants_Latex_Titles, Parameter list: $signaturecell=TRUE
    //*
    //* Title row for participant latex tables.
    //*

    function Participants_Latex_Titles($signaturecell=TRUE)
    {
        $datas=$this->GetDataTitles($this->Participants_Data());
        if ($signaturecell)
        {
            array_push($datas,"Assinatura");
        }
        
        return $this->Html_Table_Head_Row($datas);
    }
     //*
    //* function Participants_Latex_Table, Parameter list: $edit,$participants,$pagehead="",$signaturecell=FALSE
    //*
    //* Generates $participants table (with title rows).
    //*

    function Participants_Latex_Table($edit,$participants,$pagehead="",$signaturecell=FALSE)
    {
        if (count($participants)>0)
        {
            return 
                $this->Latex_Table
                (
                    array($this->ParticipantsObj()->Participants_Latex_Titles($signaturecell)),
                    $this->ParticipantsObj()->Participants_Rows
                    (
                        0,
                        $participants,
                        $signaturecell
                    ),
                    array
                    (
                        "PageHead" => $pagehead,
                    )
                );
        }

        return "";
    }
    
    //*
    //* function Participants_Latex_Marks_Table, Parameter list: $edit,$participants,$pagehead=""
    //*
    //* Generates $participants table (with title rows).
    //*

    function Participants_Latex_Marks_Table($edit,$city,$room,$participants,$pagehead="")
    {
        $latex="";
        if (count($participants)>0)
        {
            foreach ($this->MyHash_HashesList_2IDs($participants,"Level") as $lid => $participants)
            {
                $level=$this->Levels($lid);
                $latex.=
                    $this->Participants_Latex_Marks_Level_Table
                    (
                       $edit,
                       $city,
                       $room,
                       $level,
                       $participants,
                       $pagehead
                    );
            }
        }

        return $latex;
    }
    
    //*
    //* function Participants_Latex_Marks_Level_Table, Parameter list: $edit,$city,$room,$participants
    //*
    //* Generates $participants table (with title rows).
    //*

    function Participants_Latex_Marks_Level_Table($edit,$city,$room,$level,$participants)
    {
        if (count($participants)>0)
        {
            $latex="";
            foreach ($this->MyHash_HashesList_2IDs($participants,"Level") as $lid => $participants)
            {
                $level=$this->Levels($lid);

                return "\n\n".
                    $this->Latex_Table
                    (
                       $this->Participants_Marks_Titles($level),
                       $this->Participants_Marks_Rows
                       (
                          0,
                          $level,
                          $participants
                       ),
                       array
                       (
                          "PageHead" => 
                            $this->H(2,"Lista de Avaliação").
                            $this->CitiesObj()->City_Distribution_Latex_Level_Info_Table($city,$room,$level).
                            "",
                          "NitemsPerPage" => 40,
                       )
                    );
            }
        }

        return "";
    }
}

?>