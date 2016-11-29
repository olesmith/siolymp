array
(
      'Search' => array
      (
         'Public' => 1,
         'Person' => 0,
         "Admin" => 1,
         "Friend"     => 1,
      ),
      'Add' => array
      (
         'Public' => 0,
         'Person' => 0,
         "Admin" => 1,
         "Friend"     => 0,
         "Coordinator" => 1,
      ),
      'Copy' => array
      (
         'Public' => 0,
         'Person' => 0,
         "Admin" => 1,
         "Friend"     => 0,
         "Coordinator" => 1,
      ),
      'Show' => array
      (
         'Public' => 1,
         'Person' => 0,
         "Admin" => 1,
         "Friend"     => 1,
         "Coordinator" => 1,
         "AccessMethod" => "CheckShowAccess",
      ),
      'Edit' => array
      (
         'Public' => 0,
         'Person' => 0,
         "Admin" => 1,
         "Friend"     => 0,
         "Coordinator" => 1,
         "AccessMethod" => "CheckEditAccess",
      ),
      'EditList' => array
      (
         'Public' => 0,
         'Person' => 0,
         "Admin" => 1,
         "Friend"     => 0,
         "Coordinator" => 1,
         "Assessor"  => 0,
      ),
      'Delete' => array
      (
         'Public' => 0,
         'Person' => 0,
         "Admin" => 1,
         "Friend"     => 1,
         "Coordinator" => 1,
         "AccessMethod"  => "CheckDeleteAccess",
      ),
      "Ranking" => array
      (
          "Href"     => "",
          "HrefArgs" => "?ModuleName=Levels&Action=Ranking",
          "Name"     => "Rankings",
          "Name_UK"   => "Rankings",
      
          "Icon"   => "teacher_light.png",

          "Public"   => 0,
          "Person"   => 0,
          "Friend"     => 0,
          "Coordinator" => 2,
          "Admin"    => 2,

          "Anchor"  => "Ranking",
      ),
      "Inscription" => array
      (
          "Href"     => "",
          "HrefArgs" => "?ModuleName=Inscriptions&Action=Inscription&Friend=#Friend",
          "Name"     => "Participantes",
          "Name_UK"   => "Participants",
          "Title"     => "Participantes",
          "Title_UK"   => "Participants",
      
          "Icon"   => "students_light.png",

          "Public"   => 0,
          "Person"   => 0,
          "Friend"     => 0,
          "Coordinator" => 2,
          "Admin"    => 2,
      ),
   "GenCert" => array
   (
      "Href"     => "",
      "HrefArgs" => "?ModuleName=Participants&Action=GenCert&Latex=1&ID=#ID",
      "Title"    => "Gerar Certificado",
      "Title_UK" => "Generate Certificate",
      "Name"     => "Certificado",
      "Name_UK"   => "Certificado",
      
      "Handler"   => "Participant_Handle_Certificate_Generate",
      "AccessMethod"  => "CheckCertAccess",

      "Icon"   => "print_dark.png",
      "Public"   => 0,
      "Person"   => 0,
      "Friend"     => 1,
      "Coordinator" => 1,
      "Admin"    => 1,
  ),
   "MailCert" => array
   (
      "Href"     => "",
      "HrefArgs" => "?ModuleName=Participants&Action=MailCert&ID=#ID",
      "Title"    => "Enviar Certificado por Email",
      "Title_UK" => "Send Certificate by Email",
      "Name"     => "Enviar Certificado",
      "Name_UK"   => "Send Certificate",
      
      
      "Handler"   => "Participant_Handle_Certificate_Mail_Send",
      "AccessMethod"  => "CheckCertAccess",
      "Target"   => "_blank",

      "Icon"   => "copy_dark.png",
      "Public"   => 0,
      "Person"   => 0,
      "Friend"     => 1,
      "Coordinator" => 1,
      "Admin"    => 1,
   ),
   "GenCerts" => array
   (
      "Href"     => "",
      "HrefArgs" => "?ModuleName=Participants&Action=GenCerts&Latex=1",

      "Title"    => "Gerar Certificados dos Participantes Pesquisados e Liberados",
      "Title_UK" => "Generate Certificates for Searched Granted Participants",
      "Name"     => "Gerar Certificados",
      "Name_UK"   => "Generate Certificates",
       
      "Handler"   => "Participants_Handle_Certificates_Generate",

      "Icon"   => "print_dark.png",
      "Public"   => 0,
      "Person"   => 0,
      "Friend"     => 1,
      "Coordinator" => 1,
      "Admin"    => 1,
   ),
);
