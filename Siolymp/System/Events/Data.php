array
(     
   "Status" => array
   (
      "Name" => "Status",
      "Sql" => "ENUM",
      "Values"    => array("Aguardando Início das Inscrições","Inscrições Abertas","Inscrições Encerradas"),
      "Values_ES" => array("Aguardando Início das Inscrições","Inscrições Abertas","Inscrições Encerradas"),
      "Values_UK" => array("Awaiting Inscriptions to Open","Inscriptions Open","Inscriptions Closed"),
      "SearchDefault"   => 2,
      "Default"   => 2,
      "Public"   => 1,
      "Person"   => 1,
      "Admin"    => 2,
      "Friend"     => 1,
      "Coordinator" => 1,
      "Assessor"  => 1,
      "Search"  => TRUE,
      "SearchCheckBox"  => TRUE,
   ),
   "Visible" => array
   (
      "Name" => "Visível",
      "Name_UK" => "Visible",

      "Sql" => "ENUM",
      "Values" => array("Sim","Não"),
      "Values_UK" => array("Yes","No"),
      "Default" => 1,
      
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 1,
      
      "Default" => 1,
      "Compulsory" => FALSE,
      "Search" => FALSE,
      "Compulsory"  => FALSE,
   ),
   
   "EventStart" => array
   (
      "Name" => "Início do Evento",
      "ShortName" => "Início",
      "Title" => "Data Início do Evento",
      
      "Name_UK" => "Event Start",
      "ShortName_UK" => "Start",
      "Title_UK" => "Event Start Date",
      "Sql" => "INT",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Search" => FALSE,
      "Compulsory"  => TRUE,
      "IsDate"  => TRUE,
   ),
   "EventEnd" => array
   (
      "Name" => "Fim do Evento",
      "ShortName" => "Fim",
      "Title" => "Data Fim do Evento",
      
      "Name_UK" => "Event End",
      "ShortName_UK" => "End",
      "Title_UK" => "Event End Date",
      "Sql" => "INT",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Compulsory" => 1,
      "Search" => FALSE,
      "Compulsory"  => TRUE,
      "IsDate"  => TRUE,
   ),
   "HtmlLogoHeight" => array
   (
      "Name" => "Altura do Logotipo (px)",
      "Name_UK" => "Logo Height (px)",

      "Sql" => "INT",

      "Search" => FALSE,
      "Size" => 3,
      "Default"  => "0",

      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend"     => 1,
      "Coordinator" => 2,
      "Assessor"  => 0,
   ),
   "HtmlLogoWidth" => array
   (
      "Name" => "Largura do Logotipo (px)",
      "Name_UK" => "Logo Width (px)",

      "Sql" => "INT",
      "Size" => 3,

      "Search" => FALSE,
      "Default"  => "0",

      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend"     => 1,
      "Coordinator" => 2,
      "Assessor"  => 0,
   ),
   "Distribution_Public" => array
   (
      "Name" => "Distribuição de Salas Publicada",
      "Name_UK" => "Room Distribution Public",
      
      "SelectCheckBoxes"  => 2,
      "Sql" => "ENUM",
      "Values" => array("Não","Sim"),
      "Values_UK" => array("No","Yes"),
      
      "Public"   => 0,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Default" => 1,
      "Compulsory" => FALSE,
      "Search" => FALSE,
      "Compulsory"  => TRUE,
   ),
   "Result_Public" => array
   (
      "Name" => "Resultado Publicada",
      "Name_UK" => "Result Public",
      
      "SelectCheckBoxes"  => 2,
      "Sql" => "ENUM",
      "Values" => array("Não","Sim"),
      "Values_UK" => array("No","Yes"),
      
      "Public"   => 0,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Default" => 1,
      "Compulsory" => FALSE,
      "Search" => FALSE,
      "Compulsory"  => TRUE,
   ),
);
