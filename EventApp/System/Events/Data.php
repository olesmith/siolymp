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
      "SqlDerivedData" => array("Name"),
      "GETSearchVarName"  => "Unit",

      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 1,
      "Friend" => 1,
      "Coordinator" => 1,
      
      "Compulsory" => 1,
   ),
   "Name" => array
   (
      "Name" => "Nome",
      "Title" => "Nome do Evento",

      "Size" => "20",
      "Sql" => "VARCHAR(256)",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => TRUE,
   ),
   "Name_UK" => array
   (
      "Name" => "Name",
      "Title" => "Event Name",
      "Size" => "20",
      "Sql" => "VARCHAR(256)",
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => FALSE,
   ),
   "Title" => array
   (
      "Name" => "Título",
      "Title" => "Título do Evento",
      "Size" => "50",
      "Sql" => "VARCHAR(255)",
      "Public" => 1,
      "Person" => 0,
      "Admin" => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => TRUE,
   ),
   "Title_UK" => array
   (
      "Name" => "Title",
      "Title" => "Event Title",
      "Size" => "50",
      "Sql" => "VARCHAR(255)",
      "Public" => 1,
      "Person" => 0,
      "Admin" => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Search"  => TRUE,
      "Compulsory"  => FALSE,
   ),
   /* "AnnouncementLink" => array */
   /* ( */
   /*    "HRefIt" => TRUE, */
   /*    "ShortName" => "URL", */
   /*    "ShortName_UK" => "URL", */
   /*    "Name" => "Link Oficial", */
   /*    "Name_UK" => "Official Link", */
   /*    "Title" => "Link Oficial", */
   /*    "Title_UK" => "Official Link", */

   /*    "Size" => "35", */
   /*    "Sql" => "VARCHAR(256)", */
   /*    "Public"   => 1, */
   /*    "Person"   => 0, */
   /*    "Admin"    => 2, */
   /*    "Friend" => 1, */
   /*    "Coordinator" => 2, */
      
   /*    "Search"  => TRUE, */
   /*    "Compulsory"  => TRUE, */
   /* ), */
   "Date" => array
   (
      "Name" => "Data de Publicação",
      "ShortName" => "Publicação",
      "Title" => "Data de Publicação",
      
      "Name_UK" => "Publication Date",
      "ShortName_UK" => "Publication",
      "Title_UK" => "Publication Date",
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
   "Inscriptions_Public" => array
   (
      "Title" => "Inscrições Abertas ao Público",
      "Name" => "Inscrições Públicas",
      
      "Name_UK" => "Public Inscriptions",
      "ShortName_UK" => "Publication",
      "Title_UK" => "Inscriptions are Public",
      
      "Sql" => "ENUM",
      "Values" => array("Sim","Não"),
      "Values_UK" => array("Yes","No"),
      "Default" => 1,
      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Compulsory" => 1,
      "Search" => FALSE,
      "Compulsory"  => TRUE,
   ),
   "StartDate" => array
   (
      "Name" => "Início das Inscrições",
      "ShortName" => "Início",
      "Title" => "Data de Início das Inscrições",
      
      "Name_UK" => "Inscriptions Starts",
      "ShortName_UK" => "Start",
      "Title_UK" => "Inscriptions Starts Date",
      
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
   "EndDate" => array
   (
      "Name" => "Novas Inscrições Até",
      "ShortName" => "Inscrições Até",
      "Title" => "Novas Inscrições Até",
      
      "Name_UK" => "Inscriptions Ends",
      "ShortName_UK" => "End",
      "Title_UK" => "Inscriptions Ends Date",
      
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
   "EditDate" => array
   (
      "Name" => "Editar Inscrições Até",
      "ShortName" => "Editar Até",
      "Title" => "Editar Inscrições Até",
      
      "Name_UK" => "Inscriptions Editable Until",
      "ShortName_UK" => "Editable",
      "Title_UK" => "Inscriptions Editable until Date",
      
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
   "Announcement" => array
   (
      "Name" => "Edital",
      "Name_UK" => "Announcement",

      "Sql" => "FILE",

      "Search" => FALSE,

      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend" => 1,
      "Coordinator" => 2,
      
      "Compulsory" => 0,
      "Extensions" => "pdf",
      "Icon" => "pdf.png",
      "Iconify" => TRUE, 
   ),
);
