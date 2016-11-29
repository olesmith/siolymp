<?php


class InscriptionsCertificate extends InscriptionsLatex
{ 
    //*
    //* function Certificate_Where, Parameter list: $inscription
    //*
    //* Checks whether certificate has been generated.
    //*

    function Inscription_Certificate_Where($inscription)
    {
        return $this->UnitEventWhere
        (    
            array
            (
               "Friend"      => $inscription[ "Friend" ],
               "Type"        => $this->Certificate_Type,
            ),
            $inscription[ "Event" ]
         );
    }
 
    //*
    //* function Certificate_Where, Parameter list: $inscription
    //*
    //* Checks whether certificate has been generated.
    //*

    function Inscription_Certificates_Where($inscription)
    {
        $type=$this->CGI_GET("Type");
        
        $where=
            array
            (
               "Friend"      => $inscription[ "Friend" ],
            );

        if ($type==1)
        {
            //$where[ "Inscription" ]=$inscription[ "ID" ];
            $where[ "Type" ]=$this->Certificate_Type;
        }

        return $this->UnitEventWhere($where,$inscription[ "Event" ]);
        
    }
 
    //*
    //* function Certificate_All_Where, Parameter list: 
    //*
    //* SQL where for locating all event certs.
    //*

    function Inscription_Certificates_All_Where()
    {
        $type=$this->CGI_GET("Type");
        $where=$this->UnitEventWhere
        (
            array
            (
                "Type"        => $this->Certificate_Type,
            )
        );

        return $where;
    }
 
    //*
    //* function Inscription_Handle_Certificate_Generate, Parameter list: 
    //*
    //* Generates certificate in Latex, generates and sends the PDF.
    //*

    function Inscription_Handle_Certificate_Generate()
    {
        $this->FriendsObj()->Sql_Table_Structure_Update();
        $this->ParticipantsObj()->Sql_Table_Structure_Update();
        $this->CertificatesObj()->Sql_Table_Structure_Update();
        
        $friend=$this->FriendsObj()->Sql_Select_Hash(array("ID" => $this->ItemHash[ "Friend" ]));
        
        $where=$this->Inscription_Certificates_Where($this->ItemHash);
            
        $latex="";
        foreach ($this->CertificatesObj()->Sql_Select_Hashes($where,array(),"Type,Name") as $cert)
        {
            $latex.=$this->CertificatesObj()->Certificate_Generate($cert);
            $this->CertificatesObj()->Certificate_Set_Generated($cert);
        }
        $latex=$this->CertificatesObj()->Certificates_Latex_Ambles_Put($latex);
        
        if ($this->CGI_GET("Latex")!=1)
        {
            $this->ShowLatexCode($latex);
        }
        
        return $this->Latex_PDF($this->CertificatesObj()->Certificate_TexName($friend[ "Name" ]),$latex);
    }  
}

?>