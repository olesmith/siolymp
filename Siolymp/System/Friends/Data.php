array
(
   "Name"     => array
   (
      "Sql" => "VARCHAR(256)",
      "Name"  => "Responsável do Cadastro",
      "Name_UK"  => "Person Responsible",
      "Size"  => 35,

      "Compulsory" => FALSE,

      "Admin" => 2,
      "Person" => 0,
      "Public" => 0,
      "Friend"     => 2,
      "Coordinator" => 2,
      "TrimCase"  => TRUE,
    ),
   "School"     => array
   (
      "Sql" => "VARCHAR(256)",
      "Name"  => "Nome da Instituição/Colégio",
      "Name_UK"  => "Name of Institution/College",
      "Size"  => 35,

      "Compulsory" => FALSE,

      "Admin" => 2,
      "Person" => 0,
      "Public" => 0,
      "Friend"     => 2,
      "Coordinator" => 2,
      "TrimCase"  => TRUE,
    ),
   "INEP"     => array
   (
      "Sql" => "VARCHAR(256)",
      "Name"  => "INEP",
      "Name_UK"  => "INEP",

      "Size"  => 15,

      "Compulsory" => FALSE,

      "Admin" => 2,
      "Person" => 0,
      "Public" => 0,
      "Friend"     => 2,
      "Coordinator" => 2,
    ),
   "Address"     => array
   (
      "Sql" => "VARCHAR(256)",
      "Name"  => "Endereço",
      "Name_UK"  => "Address",
      "Size"  => 50,

      "Compulsory" => FALSE,

      "Admin" => 2,
      "Person" => 0,
      "Public" => 0,
      "Friend"     => 2,
      "Coordinator" => 2,
    ),
   "City"     => array
   (
      "Sql" => "VARCHAR(256)",
      "Name"  => "Cidade",
      "Name_UK"  => "City",
      "Size"  => 35,

      "Compulsory" => FALSE,

      "Admin" => 2,
      "Person" => 0,
      "Public" => 0,
      "Friend"     => 2,
      "Coordinator" => 2,
    ),
   "Area"     => array
   (
      "Sql" => "VARCHAR(256)",
      "Name"  => "Bairro",
      "Name_UK"  => "Area",
      "Size"  => 35,

      "Compulsory" => FALSE,

      "Admin" => 2,
      "Person" => 0,
      "Public" => 0,
      "Friend"     => 2,
      "Coordinator" => 2,
    ),
   "ZIP"     => array
   (
      "Sql" => "VARCHAR(256)",
      "Name"  => "CEP",
      "Name_UK"  => "ZIP",
      "Size"  => 10,

      "Compulsory" => FALSE,

      "Admin" => 2,
      "Person" => 0,
      "Public" => 0,
      "Friend"     => 2,
      "Coordinator" => 2,
    ),
   "Phone"     => array
   (
      "Sql" => "VARCHAR(256)",
      "Name"  => "Fone",
      "Name_UK"  => "Phone",
      "Size"  => 20,

      "Compulsory" => FALSE,

      "Admin" => 2,
      "Person" => 0,
      "Public" => 0,
      "Friend"     => 2,
      "Coordinator" => 2,
    ),
   "Cell"     => array
   (
      "Sql" => "VARCHAR(256)",
      "Name"  => "Celular",
      "Name_UK"  => "Cell",
      "Size"  => 20,

      "Compulsory" => FALSE,

      "Admin" => 2,
      "Person" => 0,
      "Public" => 0,
      "Friend"     => 2,
      "Coordinator" => 2,
    ),
   "Type"     => array
   (
      "Sql" => "ENUM",
      "Name"  => "Tipo",
      "Name_UK"  => "Type",
      "Values"  => array("Particular","Estadual","Municipal","Federal"),
      "Values_UK"  => array("Private","State","Municipal","Federal"),

      "Compulsory" => FALSE,

      "Admin" => 2,
      "Person" => 0,
      "Public" => 0,
      "Friend"     => 2,
      "Coordinator" => 2,
    ),
);