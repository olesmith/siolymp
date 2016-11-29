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
         "Friend"     => 0,
         "Coordinator" => 1,
         "AccessMethod"  => "CheckDeleteAccess",
      ),
      "Envelopes" => array
      (
         "Href"     => "",
         "HrefArgs" => "?ModuleName=Cities&Action=Envelopes&City=#City&ID=#ID",
         "Title"    => "Avaliações, Envelopes",
         "Title_UK" => "Assessments, Envelopes",
         "Name"     => "Avaliações",
         "Name_UK"   => "Assessments",
      
         //"Handler"   => "Room_Envelopes_Handle",

         "Public"   => 0,
         "Person"   => 0,
         "Friend"     => 0,
         "Coordinator" => 1,
         "Admin"    => 1,
         "Singular"    => TRUE,
     ),
   "DistributeRoom" => array
   (
      "Href"     => "",
      "HrefArgs" => "?ModuleName=Cities&Action=DistributeRoom&City=#City&Room=#ID",
      "Name"     => "Distribuição",
      "Name_UK"   => "Distribution",
      "Title"     => "Distribuir Participantes da Sala",
      "Title_UK"   => "Distribute Participants in Room",
      
      //"Icon"   => "people_light.png",

      "Public"   => 0,
      "Person"   => 0,
      "Friend"     => 0,
      "Coordinator" => 2,
      "Admin"    => 2,
      "Singular"    => TRUE,
      
      //"Handler"    => "Cities_Distribution_Handle",
  ),
   "ZeroRoom" => array
   (
      "Href"     => "",
      "HrefArgs" => "?ModuleName=Cities&Action=ZeroRoom&City=#City&Room=#ID",
      "Name"     => "Zerar Sala",
      "Name_UK"   => "Zero Room",
      "Title"     => "Zerar Participantes da Sala",
      "Title_UK"   => "Zero Participants in Room",
      
      //"Icon"   => "people_light.png",

      "Public"   => 0,
      "Person"   => 0,
      "Friend"     => 0,
      "Coordinator" => 2,
      "Admin"    => 2,
      "Singular"    => TRUE,
      
      "Confirm"    => TRUE,
      "ConfirmTitle"    => "Tem Certeza que Quer Zerar Distribuição da Sala?",
      "ConfirmTitle_UK"    => "Are You sure You want to Zero Room Distribution?",
      
      "AccessMethod"    => "Room_Participants_Has",
      //"Handler"    => "Cities_Distribution_Handle",
  ),
   "RoomParticipants" => array
   (
      "Href"     => "",
      "HrefArgs" => "?ModuleName=Participants&Action=Search&City=#City&Room=#ID",
      "Name"     => "Participantes na Sala",
      "Name_UK"   => "Participants in Room",
      
      //"Icon"   => "people_light.png",

      "Public"   => 0,
      "Person"   => 0,
      "Friend"     => 0,
      "Coordinator" => 2,
      "Admin"    => 2,
      "Singular"    => TRUE,
  ),
);
