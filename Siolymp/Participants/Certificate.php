<?php


class Participants_Certificate extends Participants_City
{
    //*
    //* function Participant_Certificate_Where, Parameter list: $participant,$friendid=0
    //*
    //* Returns $where clause for submission certificate.
    //*

    function Participant_Certificate_Where($participant,$friendid=0)
    {
        if (empty($friendid)) { $friendid=$participant[ "Friend" ]; }
        
        return
            array
            (
               "Unit"          => $participant[ "Unit" ],
               "Event"         => $participant[ "Event" ],
               "Friend"        => $friendid,
               "Type"          => $this->Certificate_Type,
               "Participant"   => $participant[ "ID" ],
            );
    }

    //*
    //* function Participant_Handle_Certificate_Generate, Parameter list: 
    //*
    //* Generates certificate in Latex, generates and sends the PDF.
    //*

    function Participant_Handle_Certificate_Generate()
    {
        $where=$this->Participant_Certificate_Where($this->ItemHash);

        $cert=$this->CertificatesObj()->Sql_Select_Hash($where);
        $cert=$this->CertificatesObj()->Certificate_Read($cert);

        $latex=$this->CertificatesObj()->Certificate_Generate($cert);

        $latex=$this->CertificatesObj()->Certificates_Latex_Ambles_Put($latex);
        $this->CertificatesObj()->Certificate_Set_Generated($cert);
        
        if ($this->CGI_GET("Latex")!=1)
        {
            $this->ShowLatexCode($latex);
        }

        return
            $this->Latex_PDF
            (
               $this->CertificatesObj()->Certificate_TexName
               (
                  $cert[ "Friend_Hash" ][ "Name" ]
               ),
               $latex
             );
    }
    
    //*
    //* function Participant_Handle_Certificate_Generate, Parameter list: 
    //*
    //* Generates submission certificate in Latex, generates and sends the PDF.
    //*

    function Participant_Handle_Certificate_Mail_Send()
    {
        $this->CertificatesObj()->Certificates_Generate_Mail_Send
        (
           $this->FriendsObj()->Sql_Select_Hash(array("ID" => $this->ItemHash[ "Friend" ])),
           $this->Participant_Certificate_Where($this->ItemHash)
        );
    }
    
    //*
    //* function Participant_Certificates_Where, Parameter list: 
    //*
    //* Returns $where clause for all submission certificates.
    //*

    function Participant_Certificates_Where()
    {
        /* $this->ReadItems */
        /* ( */
        /*     $this->UnitEventWhere(array("Certificate" => 2)), */
        /*     $datas=array(), */
        /*     $nosearches=FALSE, */
        /*     $nopaging=TRUE */
        /* ); */

        $ids=
            $this->Sql_Select_Unique_Col_Values
            (
                "ID",
                $this->UnitEventWhere(array("Certificate" => 2))
            );

        return
            array
            (
                "Participant"  => $ids,
                "Event"       => $this->Event("ID"),
                "Type"        => $this->Certificate_Type,
            );
    }

    //*
    //*
    //* function Participants_Handle_Certificates_Generate, Parameter list: 
    //*
    //* Generates certificate in Latex, generates and sends the PDF.
    //*

    function Participants_Handle_Certificates_Generate()
    {
        return
            $this->CertificatesObj()->Certificates_Generate_Handle
            (
               $this->Participant_Certificates_Where(),
               "Certs.Participants.".
               $this->Event("Name")
            );
    }
    
}
?>