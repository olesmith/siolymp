array
(
   "ID" => array
   (
      "Name" => "ID",
      "Sql" => "INT NOT NULL PRIMARY KEY AUTO_INCREMENT",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 1,
      "Friend" => 1,
      "Coordinator" => 1,
   ),
   "Unit" => array
   (
      "Name" => "Unidade",
      "Name_UK" => "Unit",

      "Sql" => "INT",
      "SqlClass" => "Units",
      "Search" => FALSE,

      "GETSearchVarName"  => "Unit",

      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 1,
      
      "Compulsory" => 1,
   ),
   "Event" => array
   (
      "Name" => "Evento",
      "Name_UK" => "Event",
      
      "SqlClass" => "Events",
      "Search" => FALSE,
      "Compulsory"  => TRUE,

      "GETSearchVarName"  => "Event",
      "Sql" => "INT",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend"     => 0,
      "Coordinator" => 1,
    ),
   "Room" => array
   (
      "Name" => "Sala",
      "Name_UK" => "Room",

      "Sql" => "INT",
      "SqlClass" => "Rooms",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 0,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => TRUE,
   ),
   "Level" => array
   (
      "Name" => "Nível",
      "Name_UK" => "Level",

      "Sql" => "INT",
      "SqlClass" => "Levels",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 0,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => TRUE,
   ),
   "Type" => array
   (
      "Name" => "Tipo",
      "Name_UK" => "Type",

      "Sql" => "ENUM",
      "Values" => array("Corretor","Revisor"),
      "Values_UK" => array("Corrector","Revisor"),
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 0,
      "Coordinator" => 2,
      "Default" => 1,
      
      "Search"  => TRUE,
      "Compulsory"  => TRUE,
   ),
   "Question" => array
   (
      "Name" => "Questão",
      "Name_UK" => "Question",

      "Sql" => "INT",
      "SqlClass" => "Questions",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 0,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => TRUE,
   ),
   "Assessor" => array
   (
      "Name" => "Corretor",
      "Name_UK" => "Assessor",

      "Sql" => "INT",
      "SqlClass" => "Assessors",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 0,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => TRUE,
   ),
   "NParticipants" => array
   (
      "Name" => "Participantes",
      "Name_UK" => "Participants",

      "Sql" => "INT",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 1,
      "Friend" => 0,
      "Coordinator" => 1,
      
      "Search"  => FALSE,
      "Compulsory"  => FALSE,
   ),
   "Comment" => array
   (
      "Name" => "Comentário",
      "Name_UK" => "Comment",

      "Size" => 35,
      "Sql" => "VARCHAR(256)",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 0,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => TRUE,
   ),
   "Name" => array
   (
      "Name" => "Nome",
      "Name_UK" => "Name",

      "Size" => 35,
      "Sql" => "VARCHAR(256)",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 0,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => TRUE,
   ),
);
