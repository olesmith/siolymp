array
(
   "Basic" => array
   (
      "Name" => "Básicos",
      "Name_UK" => "Basic",
      "Data" => array
      (
          "No","Edit","Delete","Inscription",
          "Name","Level","BirthDay","Deficiency",
          "City","Room",
          "Presence","Mark","Honouation","Friend","GenCert",
      ),
      "Admin" => 1,
      "Person" => 0,
      "Public" => 1,
      "Admin" => 1,
      "Friend"     => 1,
      "Coordinator" => 1,
   ),
    "Registration" => array
    (
       "Name" => "Lançamento",
       "Name_UK" => "Registration",
       "Data" => array
       (
          "No","Delete","GenCert",
          "Level","Name","BirthDay","Deficiency","City",
        ),

       "ShowDatas" => array
       (
          "No","Delete","GenCert",
          "Level",
       ),
       "EditDatas" => array
       (
          "Name","BirthDay","Deficiency","City",
          "Presence",
       ),
       
       "Edit_Coordinator" => 1, //edit default for this group
       "Edit_Admin" => 1, //edit default for this group
       
       "Person" => 0,
       "Public" => 1,
       "Admin" => 1,
       "Friend"     => 1,
       "Coordinator" => 1,
       "Assessor"  => 0,
    ),
    "Rooms" => array
    (
       "Name" => "Salas",
       "Name_UK" => "Rooms",
       
       "Data" => array
       (
          "No",
          "Level","Name","BirthDay","Deficiency","City","Room"
        ),
       
       "ShowDatas" => array
       (
          "No","Level","Name","BirthDay","Deficiency","City",
       ),
       
       "EditDatas" => array
       (
          "Room"
       ),

       "Edit_Coordinator" => 1, //edit default for this group
       "Edit_Admin" => 1, //edit default for this group
       
       "Person" => 0,
       "Public" => 1,
       "Admin" => 1,
       "Friend"     => 1,
       "Coordinator" => 1,
       "Assessor"  => 0,
       "AccessMethod"    => "MaySeeDistribution",
    ),
    "Assessments" => array
    (
       "Name" => "Avaliações",
       "Name_UK" => "Assessments",
       
       "Data" => array
       (
          "No",
          "Edit","Inscription","GenCert",
          "City","Level","Name","BirthDay","Deficiency",
          "Presence","Mark","Media","Honouration"
        ),
       
       "ShowDatas" => array
       (
          "No","Level","City","Name","BirthDay","Deficiency"
       ),
       
       "EditDatas" => array
       (
          "Presence","Mark","Honouration"
       ),

       "Edit_Coordinator" => 1, //edit default for this group
       "Edit_Admin" => 1, //edit default for this group
       
       "Person" => 0,
       "Public" => 1,
       "Admin" => 1,
       "Friend"     => 1,
       "Coordinator" => 1,
       "Assessor"  => 0,
       "AccessMethod"    => "MaySeeDistribution",
    ),
    "Info" => array
    (
       "Name" => "Info",
       "Name_UK" => "Info",
       
       "Data" => array
       (
          "No",
          "Level","Name","BirthDay","Deficiency","Room","City",
        ),
       
       "ShowDatas" => array
       (
          "No","Level","Name","BirthDay","Deficiency","City",
       ),
       
       "EditDatas" => array
       (
        "PRN","Contact1","Contact2",
       ),

       "Edit_Coordinator" => 1, //edit default for this group
       "Edit_Admin" => 1, //edit default for this group
       
       "Person" => 0,
       "Public" => 1,
       "Admin" => 1,
       "Friend"     => 1,
       "Coordinator" => 1,
       "Assessor"  => 0,
    ),
    "Envelope" => array
    (
       "Name" => "Envelope",
       "Name_UK" => "Envelope",
       
       "Data" => array
       (
          "No","Level","Name","BirthDay","Deficiency","Presence","Mark","Honouration",
        ),
       
       "ShowDatas" => array
       (
          "Level","Name","BirthDay","Deficiency",
       ),
       "EditDatas" => array
       (
          "Mark","Media","Presence","Honouration",
       ),
       
       "Person" => 0,
       "Public" => 1,
       "Admin" => 1,
       "Friend"     => 1,
       "Coordinator" => 1,
       "Assessor"  => 0,
    ),
    "Certificates" => array
    (
       "Name" => "Certificados",
       "Name_UK" => "Certificates",
       
       "Data" => array
       (
          "No","Edit","Delete",
          "Level","Name","Deficiency","Presence","Mark","Honouration",
          "Certificate","Certificate_CH","Code","GenCert",
        ),
       
     
       "Person" => 0,
       "Public" => 1,
       "Admin" => 1,
       "Friend"     => 1,
       "Coordinator" => 1,
       "Assessor"  => 0,
    ),
);
