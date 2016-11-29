array
(
   "011_ShowEvent" => array
   (
      "Name" => "Sobre o Evento",
      "Title" => "Informações do Evento",
      "Name_UK" => "About the Event",
      "Title_UK" => "Event Info",

      'Href' => '?Unit='.$this->Unit("ID").'&ModuleName=Events&Action=Show&Event=#Event',

      'Public'    => 1,
      'Person'    => 0,
      'Admin'     => 0,

      'Friend'     => 1,
      'Coordinator' => 0,
   ),
   "012_ShowEvent" => array
   (

      "Name" => "Dados do Evento",
      "Title" => "Dados do Evento",
      "Name_UK" => "Event Data",
      "Title_UK" => "Event Data",

       'Href' => '?Unit='.$this->Unit("ID").'&ModuleName=Events&Action=Edit&Event=#Event',

      'Public'    => 0,
      'Person'    => 0,
      'Admin'     => 1,

      'Friend'     => 0,
      'Coordinator' => 1,
   ),
   "021_Inscription" => array
   (
      "Name" => "Inscrição",
      "Title" => "Minha Inscrição",
      "Name_UK" => "Inscription",
      "Title_UK" => "My Inscription",

      'Href' => '?Unit='.$this->Unit("ID").'&ModuleName=Inscriptions&Action=Inscription&Event=#Event',

      'AccessMethod'    => "Friend_Inscribed_Is",
      'Public'    => 0,
      'Person'    => 0,
      'Admin'     => 1,

      'Friend'     => 1,
      'Coordinator' => 1,
   ),
   "022_Inscriptions" => array
   (
      "Name" => "Inscrições",
      "Title" => "Inscrições do Evento",
      "Name_UK" => "Inscriptions",
      "Title_UK" => "Event Inscriptions",

      'Href' => '?Unit='.$this->Unit("ID").'&ModuleName=Inscriptions&Action=Search&Event=#Event',

      'Public'    => 0,
      'Person'    => 0,
      'Admin'     => 1,

      'Friend'     => 0,
      'Coordinator' => 1,
   ),
   /* "021_Certificates" => array */
   /* ( */
   /*    "Name" => "Presenças e Certificados", */
   /*    "Name_UK" => "Presences and Certificates", */

   /*    'Href' => '?Unit='.$this->Unit("ID").'&ModuleName=Inscriptions&Action=EditList&Event=#Event&Inscriptions_GroupName=Certificates', */
   /*    'AccessMethod' => 'HasCertificates', */

   /*    'Public'    => 0, */
   /*    'Person'    => 0, */
   /*    'Admin'     => 1, */

   /*    'Friend'     => 0, */
   /*    'Coordinator' => 1, */
   /* ), */
   "03_Levels" => array
   (
      "Name" => "Níveis",
      "Name_UK" => "Levels",

      'Href' => '?Unit='.$this->Unit("ID").'&ModuleName=Levels&Action=Search&Event=#Event',

      'Public'    => 0,
      'Person'    => 0,
      'Admin'     => 1,

      'Friend'     => 0,
      'Coordinator' => 1,
   ),
   "03_Levels" => array
   (
      "Name" => "Níveis",
      "Name_UK" => "Levels",

      'Href' => '?Unit='.$this->Unit("ID").'&ModuleName=Levels&Action=Search&Event=#Event',

      'Public'    => 0,
      'Person'    => 0,
      'Admin'     => 1,

      'Friend'     => 0,
      'Coordinator' => 1,
   ),
   "05_Cities" => array
   (
      "Name" => "Cidades",
      "Name_UK" => "Cities",

      'Href' => '?Unit='.$this->Unit("ID").'&ModuleName=Cities&Action=Search&Event=#Event',

      'Public'    => 0,
      'Person'    => 0,
      'Admin'     => 1,

      'Friend'     => 0,
      'Coordinator' => 1,
   ),
   "06_Rooms" => array
   (
      "Name" => "Salas",
      "Name_UK" => "Rooms",

      'Href' => '?Unit='.$this->Unit("ID").'&ModuleName=Rooms&Action=Search&Event=#Event',

      'Public'    => 0,
      'Person'    => 0,
      'Admin'     => 1,

      'Friend'     => 0,
      'Coordinator' => 1,
   ),
   "09_Assessors" => array
   (
      "Name" => "Corretores",
      "Name_UK" => "Assessors",

      'Href' => '?Unit='.$this->Unit("ID").'&ModuleName=Assessors&Action=Search&Event=#Event',

      'Public'    => 0,
      'Person'    => 0,
      'Admin'     => 1,

      'Friend'     => 0,
      'Coordinator' => 1,
   ),
   "09_Participants" => array
   (
      "Name" => "Participantes",
      "Name_UK" => "Participants",

      'Href' => '?Unit='.$this->Unit("ID").'&ModuleName=Participants&Action=Search&Event=#Event',

      'Public'    => 0,
      'Person'    => 0,
      'Admin'     => 1,

      'Friend'     => 0,
      'Coordinator' => 1,
   ),
   "10_Distribute" => array
   (
      "Name" => "Distrubuição",
      "Name_UK" => "Distrubution",

      'Href' => '?Unit='.$this->Unit("ID").'&ModuleName=Cities&Action=Distribute&Event=#Event',

      'Public'    => 0,
      'Person'    => 0,
      'Admin'     => 1,

      'Friend'     => 0,
      'Coordinator' => 1,
   ),
   "11_Envelopes" => array
   (
      "Name" => "Avaliações",
      "Name_UK" => "Assessments",

      'Href' => '?Unit='.$this->Unit("ID").'&ModuleName=Cities&Action=Envelopes&Event=#Event',

      'Public'    => 0,
      'Person'    => 0,
      'Admin'     => 1,

      'Friend'     => 0,
      'Coordinator' => 1,
   ),
);
