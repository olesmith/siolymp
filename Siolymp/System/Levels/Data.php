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
      "Friend"     => 1,
      "Coordinator" => 1,
    ),
   "Name" => array
   (
      "Name" => "Nível",
      "Name_UK" => "Level",

      "Size" => 2,
      "Sql" => "VARCHAR(8)",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => TRUE,
   ),
   "Title" => array
   (
      "Name" => "Discriminação",
      "Name_UK" => "Discrimination",

      "Size" => 25,
      "Sql" => "VARCHAR(256)",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => TRUE,
   ),
   "NParticipants" => array
   (
      "Name" => "Nº Alunos",
      "Name_UK" => "Nº Students",

      "Sql" => "INT",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      "Regexp" => '^\d+$',
      "Size" => 2,
      
      "Search"  => FALSE,
      "Compulsory"  => FALSE,
   ),
   "NQuestions" => array
   (
      "Name" => "Nº Questões",
      "Name_UK" => "Nº Questions",

      "Sql" => "INT",
      "Default" => 4,
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      "Regexp" => '^\d+$',
      "Size" => 2,
      
      "Search"  => FALSE,
      "Compulsory"  => FALSE,
   ),
   "Exam" => array
   (
      "Name" => "Prova",
      "Name_UK" => "Exam",
      "Title" => "Prova (Arquivo PDF))",
      "Title_UK" => "Exam (PDF File)",

      "Size" => 25,
      "Sql" => "FILE",
      "Extensions" => array("pdf"),
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 0,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => FALSE,
   ),
   "Solution" => array
   (
      "Name" => "Gabarito",
      "Name_UK" => "Solution",
      "Title" => "Gabarito (Arquivo PDF))",
      "Title_UK" => "Solution (PDF File)",

      "Size" => 25,
      "Sql" => "FILE",
      "Extensions" => array("pdf"),
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 0,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => FALSE,
   ),
   "Rankings" => array
   (
      "Name" => "Nº em Rankings",
      "Name_UK" => "Nº em Rankings",

      "Size" => 2,
      "Sql" => "INT",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 0,
      "Coordinator" => 2,
      "Default" => 10,
      
      "Search"  => FALSE,
      "Compulsory"  => FALSE,
   ),
);
