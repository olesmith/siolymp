array
(
   "Registration" => array
   (
      "Href"     => "",
      "HrefArgs" => "?ModuleName=Friends&Action=Edit&ID=#Friend#1",
      "Title"    => "Cadastro",
      "Title_UK" => "Registration",
      "Name"     => "Cadastro",
      "Name_UK"   => "Registration",
      
      "Public"   => 0,
      "Person"   => 0,
      "Friend"     => 1,
      "Coordinator" => 1,
      "Admin"    => 1,
      "AccessMethod"    => "CheckEditAccess",
      "Singular"    => TRUE,
  ),
   "GenCert" => array
   (
      "Href"     => "",
      "HrefArgs" => "?ModuleName=Inscriptions&Event=#Event&Action=GenCert&Latex=1&ID=#ID",
      "Title"    => "Gerar Certificados (PDF)",
      "Title_UK" => "Generate Certificates (PDF)",
      "Name"     => "Certificados",
      "Name_UK"   => "Certificates",
      
      "Handler"   => "Inscription_Handle_Certificate_Generate",
      "Icon"   => "print_dark.png",

      "Public"   => 0,
      "Person"   => 0,
      "Friend"     => 1,
      "Coordinator" => 1,
      "Admin"    => 1,
      "AccessMethod"    => "CheckCertificateAccess",
   ),
   "MailCert" => array
   (
      "Href"     => "",
      "HrefArgs" => "?ModuleName=Inscriptions&Event=#Event&Action=MailCert&ID=#ID",
      "Title"    => "Enviar Certificado por Email",
      "Title_UK" => "Send Certificate by Email",
      "Name"     => "Enviar Certificado",
      "Name_UK"   => "Send Certificate",
      
      "Handler"   => "Inscription_Handle_Certificate_Mail_Send",
      "Icon"   => "copy_dark.png",
      "Target"   => "_blank",

      "Public"   => 0,
      "Person"   => 0,
      "Friend"     => 1,
      "Coordinator" => 1,
      "Admin"    => 1,
      "AccessMethod"    => "CheckCertificateAccess",
   ),
   "GenCerts" => array
   (
      "Href"     => "",
      "HrefArgs" => "?ModuleName=Inscriptions&Action=GenCerts&Latex=1",
      "Title"    => "Gerar Certificados de todos os Participantes",
      "Title_UK" => "Generate Certificates for all Participants",
      "Name"     => "Certificados, todos os Participantes",
      "Name_UK"   => "Certificates, all Participants",
      
      "Handler"   => "Inscription_Handle_Certificates_Generate",
      "Icon"   => "print_dark.png",

      "Public"   => 0,
      "Person"   => 0,
      "Friend"     => 1,
      "Coordinator" => 1,
      "Admin"    => 1,
      "AccessMethod"    => "CheckCertificateAccess",
  ),
   "FriendParticipants" => array
   (
      "Href"     => "",
      "HrefArgs" => "?ModuleName=Participants&Action=Search&Friend=#Friend",
      "Name"     => "Particiantes do Cadastro",
      "Name_UK"   => "Register Participant",
      
      "Icon"   => "people_light.png",

      "Public"   => 0,
      "Person"   => 0,
      "Friend"     => 1,
      "Coordinator" => 1,
      "Admin"    => 1,
      "Singular"    => 1,
      "AccessMethod"    => "CheckEditAccess",
  ),
   "Inscription" => array
   (
      "Href"     => "",
      "HrefArgs" => "?ModuleName=Inscriptions&Action=Inscription&ID=#ID",
      "Name"     => "Participantes",
      "Name_UK"   => "Participants ",
      
      "Latex_Title"     => "Recibo de Registro",
      "Latex__UK"   => "Registation Receit",
      
      //"Icon"   => "people_light.png",

      "Public"   => 0,
      "Person"   => 0,
      "Friend"     => 2,
      "Coordinator" => 2,
      "Admin"    => 2,
      "Singular"    => 1,
      "AccessMethod"    => "CheckEditAccess",
      "Handler"    => "HandleInscribe",
      "DataGroup"    => "Registration",
      "Anchor"  => "Participants",
  ),
   "Inscription_Info" => array
   (
      "Href"     => "",
      "HrefArgs" => "?ModuleName=Inscriptions&Action=Inscription_Info&ID=#ID",
      "Name"     => "Info dos Participantes",
      "Name_UK"   => "Participant's Info",
      
      "Latex_Title"     => "Lista de Participantes",
      "Latex__UK"   => "Participants List",
      
      //"Icon"   => "people_light.png",

      "Public"   => 0,
      "Person"   => 0,
      "Friend"     => 2,
      "Coordinator" => 2,
      "Admin"    => 2,
      "Singular"    => 1,
      "AccessMethod"    => "CheckEditAccess",
      "Handler"    => "HandleInscribe",
      "DataGroup"    => "Info",
      "Anchor"  => "Participants",
  ),
   "Inscription_Rooms" => array
   (
      "Href"     => "",
      "HrefArgs" => "?ModuleName=Inscriptions&Action=Inscription_Rooms&ID=#ID",
      "Name"     => "Salas",
      "Name_UK"   => "Rooms",
      
      "Latex_Title"     => "Distribuição de Participantes",
      "Latex__UK"   => "Distribution List",
      
      //"Icon"   => "people_light.png",

      "Public"   => 0,
      "Person"   => 0,
      "Friend"     => 1,
      "Coordinator" => 2,
      "Admin"    => 2,
      "Singular"    => 1,
      "AccessMethod"    => "CheckEditAccess",
      "Handler"    => "HandleInscribe",
      "DataGroup"    => "Rooms",
      "Anchor"  => "Participants",
      "AccessMethod"    => "MaySeeDistribution",
  ),
   "Inscription_Assessments" => array
   (
      "Href"     => "",
      "HrefArgs" => "?ModuleName=Inscriptions&Action=Inscription_Assessments&ID=#ID",
      "Name"     => "Avaliações",
      "Name_UK"   => "Participant",
      
      "Latex_Title"     => "Resultado das Provas",
      "Latex__UK"   => "Exam Result",
      //"Icon"   => "people_light.png",

      "Public"   => 0,
      "Person"   => 0,
      "Friend"     => 1,
      "Coordinator" => 2,
      "Admin"    => 2,
      "Singular"    => 1,
      "AccessMethod"    => "MaySeeAssessments",
      "Handler"    => "HandleInscribe",
      "DataGroup"    => "Assessments",
      "Anchor"  => "Participants",
  ),
);
