array
(
   "Certificate" => array
   (
      "Name" => "Certificado",
      "Name_UK" => "Certificate",
      "Title" => "Certificado Liberado",
      "Title_UK" => "Certificate Granted",

      "Sql" => "ENUM",

      "Search" => TRUE,
      "Values" => array("Não","Sim"),
      "Values_UK" => array("No","Yes"),
      "Default"  => 1,
      //"SelectCheckBoxes"  => 2,

      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend"     => 1,
      "Coordinator" => 2,
      "Assessor"  => 0,
      "SubAction" => "Certificates",
      "SelectCheckBoxes" => 3,
   ),
   "Certificate_CH" => array
   (
      "Name" => "CCH",
      "Name_UK" => "CTLd",

      "Title" => "Certificado CH",
      "Title_UK" => "Certificate TimeLoad",

      "Sql" => "VARCHAR(8)",
      "Size" => 2,

      "Search" => FALSE,
      "Regexp" => '^\d+$',

      "Public"   => 1,
      "Person"   => 0,
      "Admin"    => 2,
      "Friend"     => 1,
      "Coordinator" => 2,
      "Assessor"  => 0,
   ),
   
);
