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
         "HrefArgs" => "?ModuleName=Cities&Action=Envelopes&City=#ID",
         "Title"    => "Avaliações, Envelopes",
         "Title_UK" => "Assessments, Envelopes",
         "Name"     => "Avaliações",
         "Name_UK"   => "Assessments",
      
         "Handler"   => "City_Envelopes_Handle",

         "Public"   => 0,
         "Person"   => 0,
         "Friend"     => 0,
         "Coordinator" => 1,
         "Admin"    => 1,
         "Singular"    => TRUE,
     ),
      "Distribute" => array
      (
          "Href"     => "",
          "HrefArgs" => "?ModuleName=Cities&Action=Distribute",
          "Name"     => "Distribuição",
          "Name_UK"   => "Distribution",
          "Title"     => "Distribuição de Participantes",
          "Title_UK"   => "Distribution of Participants",
      
          //"Icon"   => "people_light.png",

          "Public"   => 0,
          "Person"   => 0,
          "Friend"     => 0,
          "Coordinator" => 2,
          "Admin"    => 2,
          "NonGetVars"    => array("Room","City"),
      
          "Handler"    => "Cities_Distribution_Handle",
      ),
      "DistributePrint" => array
      (
          "Href"     => "",
          "HrefArgs" => "?ModuleName=Cities&Action=Distribute&Latex=1",
          "Name"     => "Distribuição, Versão Impresso",
          "Name_UK"   => "Distribution, Printable Version",
      
          //"Icon"   => "people_light.png",

          "Public"   => 0,
          "Person"   => 0,
          "Friend"     => 0,
          "Coordinator" => 2,
          "Admin"    => 2,
          "NonGetVars"    => array("Room","City"),
      
          "Handler"    => "Cities_Distribution_Handle",
      ),
      "Zero" => array
      (
          "Href"     => "",
          "HrefArgs" => "?ModuleName=Cities&Action=Zero",
          "Name"     => "Zerar Distribuição",
          "Name_UK"   => "Zero Distribution",
          "Title"     => "Zerar Distribuição de Participantes",
          "Title_UK"   => "Zero Distribution of Participants",
      
          //"Icon"   => "people_light.png",

          "Public"   => 0,
          "Person"   => 0,
          "Friend"     => 0,
          "Coordinator" => 2,
          "Admin"    => 2,
          "NonGetVars"    => array("Room","City"),
      
          "Confirm"    => TRUE,
          "ConfirmTitle"    => "Tem Certeza que Quer Zerar Distribuição da CIDADE?",
          "ConfirmTitle_UK"    => "Are You sure You want to Zero CITY Distribution?",
      
          "Handler"    => "Cities_Distribution_Handle",
      ),
      "DistributeCity" => array
      (
          "Href"     => "",
          "HrefArgs" => "?ModuleName=Cities&Action=DistributeCity&ID=#ID",
          "Name"     => "Distribuir Cidade",
          "Name_UK"   => "Distribute City",
          "Title"     => "Distribuir Participantes da Cidade",
          "Title_UK"   => "Distribute City Participants",
      
          //"Icon"   => "people_light.png",

          "Public"   => 0,
          "Person"   => 0,
          "Friend"     => 0,
          "Coordinator" => 2,
          "Admin"    => 2,
          "Singular"    => TRUE,
          "NonGetVars"    => array("Room"),
      
          "Handler"    => "Cities_Distribution_Handle",
          "AccessMethod"    => "City_Participants_Has",
      ),
      "ZeroCity" => array
      (
          "Href"     => "",
          "HrefArgs" => "?ModuleName=Cities&Action=ZeroCity&City=#ID",
          "Name"     => "Zerar Cidade",
          "Name_UK"   => "Zero City",
          "Title"     => "Zerar Participantes da Cidade",
          "Title_UK"   => "Zero City Participants",
      
          //"Icon"   => "people_light.png",

          "Public"   => 0,
          "Person"   => 0,
          "Friend"     => 0,
          "Coordinator" => 2,
          "Admin"    => 2,
          "Singular"    => TRUE,
          "NonGetVars"    => array("Room"),
      
          "Confirm"    => TRUE,
          "ConfirmTitle"    => "Tem Certeza que Quer Zerar Cidade?",
          "ConfirmTitle_UK"    => "Are You sure You want to Zero City?",
      
          "Handler"    => "Cities_Distribution_Handle",
          "AccessMethod"    => "City_Zero_May",
      ),
      "AddRoom" => array
      (
          "Href"     => "",
          "HrefArgs" => "?ModuleName=Rooms&Action=Add&ID=#ID",
          "Name"     => "Adicionar Sala",
          "Name_UK"   => "Add Room",
      
          //"Icon"   => "people_light.png",

          "Public"   => 0,
          "Person"   => 0,
          "Friend"     => 0,
          "Coordinator" => 2,
          "Admin"    => 2,
          "Singular"    => TRUE,
          "AccessMethod"    => "City_Participants_Has_Not",
      ),
      "CityRooms" => array
      (
          "Href"     => "",
          "HrefArgs" => "?ModuleName=Rooms&Action=Search&ID=#ID",
          "Name"     => "Salas da Cidade",
          "Name_UK"   => "City Rooms",
      
          //"Icon"   => "people_light.png",

          "Public"   => 0,
          "Person"   => 0,
          "Friend"     => 0,
          "Coordinator" => 2,
          "Admin"    => 2,
          "Singular"    => TRUE,
          "AccessMethod"    => "City_Participants_Has",
      ),
      "CityParticipants" => array
      (
          "Href"     => "",
          "HrefArgs" => "?ModuleName=Participants&Action=Search&City=#ID",
          "Name"     => "Participantes da Cidade",
          "Name_UK"   => "City Participants",
      
          //"Icon"   => "people_light.png",

          "Public"   => 0,
          "Person"   => 0,
          "Friend"     => 0,
          "Coordinator" => 2,
          "Admin"    => 2,
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
      
          "Handler"    => "Cities_Distribution_Handle",
          //"AccessMethod"    => "City_Room_Participants_Has",
      ),
      "ZeroRoom" => array
      (
          "Href"     => "",
          "HrefArgs" => "?ModuleName=Cities&Action=ZeroRoom&City=#City&Room=#ID",
          "Name"     => "Zerar Sal",
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
      
          "Handler"    => "Cities_Distribution_Handle",
          //"AccessMethod"    => "City_Room_Participants_Has",
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
);
