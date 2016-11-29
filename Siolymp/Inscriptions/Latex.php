<?php

class InscriptionsLatex extends InscriptionsForm
{
    //*
    //* function Inscription_Friend_Inscription_Table, Parameter list:
    //*
    //* Creates friend and inscription latex info table.
    //*

    function Inscription_Friend_Inscription_Table()
    {
        $table=
            array_merge
            (
               $this->FriendsObj()->MyMod_Item_Table
               (
                  0,
                  $this->Friend,
                  $this->InscriptionFriendLatexTableData
               ),
               $this->InscriptionsObj()->MyMod_Item_Table
               (
                  0,
                  $this->Inscription,
                  $this->InscriptionsObj()->GetGroupDatas("Inscription")
               )
            );
        
        $rtable=array();
        $lastrow2=array();
        while (count($table)>0)
        {
            $row1=array_shift($table);
            $row2=array();
            if (count($table)>0)
            {
                $row2=array_shift($table);
            }
            else
            {
                $row2=array($this->MultiCell("",count($lastrow2)));
            }

            $row1[0]=$this->B($row1[0]);
            $row2[0]=$this->B($row2[0]);
            
            array_push($rtable,array_merge($row1,$row2));

            $lastrow2=$row2;
        }

        return $rtable;
    }

    
    //*
    //* function Inscription_Latex, Parameter list:
    //*
    //* Creates Inscription Edit form.
    //*

    function Inscription_Latex()
    {
        $this->InscriptionsObj()->ItemDataGroups();
        $this->ReadInscription();

        $pagehead=
            $this->H
            (
               2,
               $this->MyLanguage_GetMessage("Inscriptions_School_Latex_Title")
            ).
            $this->LatexTable
            (
               "",
               $this->Inscription_Friend_Inscription_Table()
            ).
            "";
        
        $latex=
            $this->GetLatexSkel("Head.tex").
            $this->ParticipantsObj()->Participants_Friend_Levels_Latex
            (
               $this->Friend,
               $pagehead
            ).
            $this->GetLatexSkel("Tail.tex").
             "";

        $latex=$this->FilterHash($latex,$this->Unit(),"Unit_");
        $latex=$this->FilterHash($latex,$this->Event(),"Event_");

        if ($this->CGI_GET("Latex")!=1)
        {
            $this->ShowLatexCode($latex);
        }
        else
        {
            $this->RunLatexPrint
            (
                "Inscription.".
                //$this->Text2Sort($texfile).".".
                $this->MTime2FName().
                ".tex",
                $latex
            );
        }
        
        exit();
    }
}

?>