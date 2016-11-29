<?php

class InscriptionsForm extends InscriptionsUpdate
{
    //*
    //* function InscriptionForm, Parameter list: $edit
    //*
    //* Creates Inscription Edit form.
    //*

    function InscriptionForm($edit)
    {
        if ($this->LatexMode())
        {
            $this->Inscription_Latex();
        }
        
        return parent::InscriptionForm($edit);
    }
}

?>