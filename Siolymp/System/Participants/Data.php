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
      "Friend" => 2,
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
   "Friend" => array
   (
      "Name" => "Cadastro",
      "Name_UK" => "Registration",

      "Sql" => "INT",
      "SqlClass" => "Friends",
      
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
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
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => TRUE,
   ),
   "City" => array
   (
      "Name" => "Cidade das Provas",
      "Name_UK" => "City of Exams",

      "GETSearchVarName"  => "City",
      "Sql" => "INT",
      "SqlClass" => "Cities",
      
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 2,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => TRUE,
   ),
   "Room" => array
   (
      "Name" => "Sala",
      "Name_UK" => "Room",

      "Sql" => "INT",
      "SqlClass" => "Rooms",
      "GETSearchVarName"  => "Room",
      
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => FALSE,
      "EditFieldMethod"  => "Participant_Room_Select_Field",
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
      "Friend" => 2,
      "Coordinator" => 2,
      
      "Search"  => FALSE,
      "Compulsory"  => TRUE,
   ),
   "BirthDay" => array
   (
      "Name" => "Nascimento",
      "Name_UK" => "Birthday",
      "Title" => "Dia de Nascimento (DD/MM/YYYY)",
      "Title_UK" => "Birthday (DD/MM/YYYY)",

      "Sql" => "INT",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 2,
      "Coordinator" => 2,
      "Size" => 10,
      
      "Search"  => FALSE,
      "Compulsory"  => TRUE,
      "IsDate"  => TRUE,
      "TriggerFunction"  => 'TrimDateData',
   ),
   "Deficiency" => array
   (
      "Name" => "Nec. Esp.",
      "Name_UK" => "Needs Special Care",
      "Title" => "Necessidades Especiais",
      "Title_UK" => "Needs Special Care",

      "Sql" => "ENUM",
      "Values" => array("Não","Sim"),
      "Values_UK" => array("Não","Sim"),
      "Default" => 1,
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 2,
      "Coordinator" => 2,
      "Size" => 10,
      
      "Search"  => FALSE,
      "Compulsory"  => TRUE,
   ),
   "SortName" => array
   (
      "Name" => "Nome (Texto)",
      "Name_UK" => "Name (Text)",

      "Size" => 35,
      "Sql" => "VARCHAR(256)",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 2,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => TRUE,
   ),
   "Presence"       => array
   (
      "Sql" => "ENUM",
      "Name" => "Presênça",
      "Name_UK"  => "Presence",
      "Search"  => TRUE,
      
      "Default"  => 1,
      "Values"  => array("Não","Sim"),
      "Values_UK"  => array("No","Yes"),

      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      "SelectCheckBoxes" => 3,
      "PermsMethod" => "MayEditPresence",
   ),
   "Mark"       => array
   (
      "Sql" => "REAL",
      
      "Name" => $this->ApplicationObj()->Sigma,      "Name_UK"  => "Mark",
      "Size" => 5,
      
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 1,
      "Friend" => 1,
      "Coordinator" => 1,
      "Format"  => '%.1f',
   ),
   "Media"       => array
   (
      "Sql" => "REAL",
      
      "Name" => $this->ApplicationObj()->Mu,
      "Size" => 5,
      
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 1,
      "Friend" => 1,
      "Coordinator" => 1,
      "Format"  => '%.1f'
   ),
   "Honouration"       => array
   (
      "Sql" => "ENUM",
      "Name" => "Honoração",
      "Name_UK"  => "Honouration",
      "NoSort"   => 1,
      "NoSelectSort"   => 1,
      "Default"   => 1,
      "Search"  => TRUE,
      "Values"  => array
      (
         "-",
         "Menção Honrosa",
         "Medalha de Bronze",
         "Medalha de Prata",
         "Medalha de Ouro"
      ),
      "Values_UK"  => array
      (
         "None",
         "Honourable Menthioning",
         "Bronze Medal",
         "Silver Medal",
         "Gold Medal"
      ),
      "CertText"  => array
      (
         "participou da",
         "foi classificado com menção honrosa na",
         "foi classificado em 3º lugar na",
         "foi classificado em 2º lugar na",
         "foi classificado em 1º lugar na"
      ),
      
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
   ),
   "PRN" => array
   (
      "Name" => "CPF ou RG",
      "Name_UK" => "PRN",

      "Size" => 20,
      "Sql" => "VARCHAR(256)",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 2,
      "Coordinator" => 2,
      
      "Search"  => FALSE,
      "Compulsory"  => FALSE,
   ),
   "Contact1" => array
   (
      "Name" => "Contato",
      "Name_UK" => "Contact",

      "Size" => 35,
      "Sql" => "VARCHAR(256)",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 2,
      "Coordinator" => 2,
      
      "Search"  => FALSE,
      "Compulsory"  => FALSE,
   ),
   "Contact2" => array
   (
      "Name" => "Contato",
      "Name_UK" => "Contact",

      "Size" => 35,
      "Sql" => "VARCHAR(256)",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 2,
      "Coordinator" => 2,
      
      "Search"  => FALSE,
      "Compulsory"  => FALSE,
   ),
   "Code" => array
   (
      "Name" => "Código",
      "Title" => "Código do Certificado",
      "Name_UK" => "Code",
      "Title_UK" => "Certificate Code",

      "Size" => "50",
      "Sql" => "VARCHAR(64)",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 1,
      "Friend" => 1,
      "Coordinator" => 1,
      
      "Search"  => TRUE,
      "Compulsory"  => FALSE,
   ),
   
);
