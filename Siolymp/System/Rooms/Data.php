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
   "City" => array
   (
      "Name" => "Cidade",
      "Name_UK" => "City",

      "GETSearchVarName"  => "City",
      "Sql" => "INT",
      "SqlClass" => "Cities",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => TRUE,
   ),
   "Name" => array
   (
      "Name" => "Sala",
      "Name_UK" => "Room",

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
   "Capacity" => array
   (
      "Name" => "Capacidade",
      "Name_UK" => "Capacity",

      "Size" => 2,
      "Sql" => "INT",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      "Regexp" => '^\d+$',
      
      "Default"  => 30,
      "Search"  => FALSE,
      "Compulsory"  => FALSE,
      "Align"  => 'right',
   ),
   "IsAccessible" => array
   (
      "Name" => "Accessibilidade",
      "Name_UK" => "Accessible",

      "Values" => array("Não","Sim"),
      "Values_UK" => array("No","Yes"),
      "ValueColors" => array("grey","green"),
      "Default" => 1,
      
      "Sql" => "ENUM",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => FALSE,
   ),
   "Fiscal" => array
   (
      "Name" => "Fiscal",
      "Name_UK" => "Fiscal",
      
      "Sql" => "INT",
      "SqlClass" => "Fiscals",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => FALSE,
   ),
);
