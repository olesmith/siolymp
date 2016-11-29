<?php
    array
    (
       "DefaultAction" => "Start",
       "CSSFile"       => "siolump.css",
       //"DefaultProfile" => 2,
       "LoginPermissionVars" => array(),
       "SqlTableVars" => array("SqlVars"),
       "CommonData" => array
       (
          "Hashes" => array
          (
             "Login" => "Auth.Data.php",
             "MySql" => ".DB.php",
             "Mail" => ".Mail.php",
          ),
       ),
       "AllowedModules" => array
       (
          "MailTypes",
          "Logs",
          "Units",
          "Friends",
          
          "Events",
          "Sponsors",
          //"Datas",
          //"GroupDatas",
          
          "Permissions",
          
          "Levels",
          
          "Inscriptions",
          "Certificates",
          "Cities",
          "Rooms",
          "Participants",

          "Fiscals",
          "Assessors",
          "Questions",
          "Corrections",
          "Assessments",
       ),
       "ModuleDependencies" => array
       (
          "Logs" => array(),
          "Units" => array("Friends"),
          "MailTypes" => array("Units"),
          "Friends" => array("Units"),
          "Events" => array("Friends","Datas","GroupDatas"),
          //"Datas" => array("Events"),
          //"GroupDatas" => array("Events"),
          "Sponsors" => array("Units","Events"),
          "Permissions" => array("Units","Events"),
          "Inscriptions" => array("Units","Events"),
          "Certificates" => array("Participants"),
          
          "Levels" => array("Units","Events"),
          
          "Cities" => array("Units","Events"),
          "Rooms" => array("Cities"),
          "Participants" => array("Inscriptions","Rooms"),
          
          "Questions" => array("Levels"),
          "Assessments" => array("SubQuestions"),
          
          "Certificates" => array("Participants"),
          
          "Fiscals" => array("Friends"),
          "Assessors" => array("Friends"),
          
          "Assessments" => array("Assessors","Participants","Questions"),
          "Corrections" => array("Questions","Rooms","Levels","Assessors"),
       ),
       "SubModulesVars" => array
       (
         "Logs" => array
          (
             "SqlObject" => "LogsObject",
             "SqlClass" => "Logs",
             "SqlFile" => "Logs.php",
             "SqlHref" => TRUE,
             "SqlTable" => "Logs",
             "SqlFilter" => "#Message",
             "SqlDerivedData" => array("Message"),

             "ItemName"      => "Log Entry",
             "ItemsName"     => "Log Entries",
             "ItemNamer"    => "ID",

             "ItemName_UK"   => "Log Entry",
             "ItemsName_UK"  => "Log Entries",
             "ItemNamer_UK" => "ID",
         ),
         "Friends" => array
          (
             "SqlObject" => "FriendsObject",
             "SqlClass" => "Friends",
             "SqlFile" => "Friends.php",
             "SqlHref" => TRUE,
             "SqlTable" => "Friends",
             "SqlFilter" => "#School, #Name (#Email)",
             "SqlFilter_Public" => "#School, #Name",
             "SqlDerivedData" => array("School","Name","Email"),

             "ItemName"      => "Usuário",
             "ItemsName"     => "Usuários",
             "ItemsNamer"    => "Name",

             "ItemName_UK"   => "User",
             "ItemsName_UK"  => "Users",
             "ItemsNamer_UK" => "Name",
         ),
         "Units" => array
          (
             "SqlAccessor" => "UnitsObj",
             "SqlObject" => "UnitsObject",
             "SqlClass" => "Units",
             "SqlFile" => "Units.php",
             "SqlHref" => TRUE,
             "SqlTable" => "Units",
             "SqlFilter" => "#Name",
             "SqlDerivedData" => array("Name"),

             "ItemName"      => "Entidade",
             "ItemsName"     => "Entidades",
             "ItemsNamer"    => "Name",

             "ItemName_UK"   => "Entity",
             "ItemsName_UK"  => "Entities",
             "ItemsNamer_UK" => "Name",
         ),
         "MailTypes" => array
         (
             "ItemName" => "Email Tipo",
             "ItemName_ES" => "Email Tipo",
             "ItemName_UK" => "Email Type",
             "ItemsName" => "Email Tipos",
             "ItemsName_ES" => "Email Tipos",
             "ItemsName_UK" => "Email Types",
             "ItemsNamer" => "Name",
             "SqlAccessor" => "MailTypesObj",
             "SqlClass" => "MailTypes",
             "SqlDerivedData" => array("Name","Language"),
             "SqlFile" => "MailTypes.php",
             "SqlFilter" => "#Name #Language",
             "SqlHref" => "1",
             "SqlObject" => "MailTypesObject",
             "SqlTable" => "MailTypes",
         ),
         "Events" => array
          (
             "SqlAccessor" => "EventsObj",
             "SqlObject" => "EventsObject",
             "SqlClass" => "Events",
             "SqlFile" => "Events.php",
             "SqlHref" => TRUE,
             "SqlTable" => "#Unit__Events",
             "SqlFilter" => "#Name",
             "SqlDerivedData" => array("Name","Unit"),

             "ItemName"      => "Evento",
             "ItemsName"     => "Eventos",
             "ItemsNamer"    => "Name",

             "ItemName_UK"   => "Event",
             "ItemsName_UK"  => "Events",
             "ItemsNamer_UK" => "Name_UK",
         ),
         "Inscriptions" => array
          (
             "SqlAccessor" => "InscriptionsObj",
             "SqlObject" => "InscriptionsObject",
             "SqlClass" => "Inscriptions",
             "SqlFile" => "Inscriptions.php",
             "SqlHref" => TRUE,
             "SqlTable" => "#Unit__#Event_Inscriptions",
             "SqlFilter" => "#Friend",
             "SqlDerivedData" => array("Friend","Event"),

             "ItemName"      => "Inscrição",
             "ItemsName"     => "Inscrições",
             "ItemsNamer"    => "Name",

             "ItemName_UK"   => "Inscription",
             "ItemsName_UK"  => "Inscriptions",
             "ItemsNamer_UK" => "Name",
         ),
         "Certificates" => array
          (
             "SqlAccessor" => "CertificatesObj",
             "SqlObject" => "CertificatesObject",
             "SqlClass" => "Certificates",
             "SqlFile" => "Certificates.php",
             "SqlHref" => TRUE,
             "SqlTable" => "#Unit__#Event_Certificates",
             "SqlFilter" => "#Friend",
             "SqlDerivedData" => array("Friend","Event"),

             "ItemName"      => "Certificado",
             "ItemsName"     => "Certificados",
             "ItemsNamer"    => "Name",

             "ItemName_UK"   => "Certificate",
             "ItemsName_UK"  => "Certificates",
             "ItemsNamer_UK" => "Name",
         ),
         "Sponsors" => array
          (
             "SqlAccessor" => "SponsorsObj",
             "SqlObject" => "SponsorsObject",
             "SqlClass" => "Sponsors",
             "SqlFile" => "Sponsors.php",
             "SqlHref" => TRUE,
             "SqlTable" => "#Unit__Sponsors",
             "SqlFilter" => "#Initials - #Name",
             "SqlDerivedData" => array("Initials","Name"),

             "ItemName"      => "Patrocinador",
             "ItemsName"     => "Patrocinadores",
             "ItemsNamer"    => "Initials",

             "ItemName_UK"   => "Sponsor",
             "ItemsName_UK"  => "Sponsors",
             "ItemsNamer_UK" => "Initials",
         ),
         "Levels" => array
          (
             "SqlAccessor" => "LevelsObj",
             "SqlObject" => "LevelsObject",
             "SqlClass" => "Levels",
             "SqlFile" => "Levels.php",
             "SqlHref" => TRUE,
             "SqlTable" => "#Unit__Levels",
             "SqlFilter" => "#Name",
             "SqlDerivedData" => array("Name"),

             "ItemName"      => "Nível",
             "ItemsName"     => "Níveis",
             "ItemsNamer"    => "Name",

             "ItemName_UK"   => "Level",
             "ItemsName_UK"  => "Levels",
             "ItemsNamer_UK" => "Name",
         ),
          "Permissions" => array
          (
             "SqlAccessor" => "PermissionsObj",
             "SqlObject" => "PermissionsObject",
             "SqlClass" => "Permissions",
             "SqlFile" => "Permissions.php",
             "SqlHref" => TRUE,
             "SqlTable" => "#Unit__Permissions",
             "SqlFilter" => "#ID #Event",
             "SqlDerivedData" => array("ID","Event"),

             "ItemName"      => "Permissão",
             "ItemsName"     => "Permissões",
             "ItemsNamer"    => "ID",

             "ItemName_UK"   => "Permission",
             "ItemsName_UK"  => "Permissions",
             "ItemsNamer_UK" => "ID",
         ),

         "Cities" => array
          (
             "SqlAccessor" => "CitiesObj",
             "SqlObject" => "CitiesObject",
             "SqlClass" => "Cities",
             "SqlFile" => "Cities.php",
             "SqlHref" => TRUE,
             "SqlTable" => "#Unit__#Event_Cities",
             "SqlFilter" => "#Name, #Institution",
             "SqlDerivedData" => array("Name","Institution","Address"),

             "ItemName"      => "Cidade",
             "ItemsName"     => "Cidades",
             "ItemsNamer"    => "Name",

             "ItemName_UK"   => "City",
             "ItemsName_UK"  => "Cities",
             "ItemsNamer_UK" => "Name",
         ),
         "Rooms" => array
          (
             "SqlAccessor" => "RoomsObj",
             "SqlObject" => "RoomsObject",
             "SqlClass" => "Rooms",
             "SqlFile" => "Rooms.php",
             "SqlHref" => TRUE,
             "SqlTable" => "#Unit__#Event_Rooms",
             "SqlFilter" => "#Name",
             "SqlDerivedData" => array("Name","City"),

             "ItemName"      => "Sala",
             "ItemsName"     => "Salas",
             "ItemsNamer"    => "Name",

             "ItemName_UK"   => "Room",
             "ItemsName_UK"  => "Rooms",
             "ItemsNamer_UK" => "Name",
         ),
         "Participants" => array
          (
             "SqlAccessor" => "ParticipantsObj",
             "SqlObject" => "ParticipantsObject",
             "SqlClass" => "Participants",
             "SqlFile" => "Participants.php",
             "SqlHref" => TRUE,
             "SqlTable" => "#Unit__#Event_Participants",
             "SqlFilter" => "#Name",
             "SqlDerivedData" => array("Name"),

             "ItemName"      => "Participante",
             "ItemsName"     => "Participantes",
             "ItemsNamer"    => "Name",

             "ItemName_UK"   => "Participant",
             "ItemsName_UK"  => "Participants",
             "ItemsNamer_UK" => "Name",
          ),
         "Questions" => array
          (
             "SqlAccessor" => "QuestionsObj",
             "SqlObject" => "QuestionsObject",
             "SqlClass" => "Questions",
             "SqlFile" => "Questions.php",
             "SqlHref" => TRUE,
             "SqlTable" => "#Unit__#Event_Questions",
             "SqlFilter" => "#Level-#Number",
             "SqlDerivedData" => array("Name","Number","Level"),

             "ItemName"      => "Questão",
             "ItemsName"     => "Questões",
             "ItemsNamer"    => "Name",

             "ItemName_UK"   => "Question",
             "ItemsName_UK"  => "Questions",
             "ItemsNamer_UK" => "Name",
          ),
         "Fiscals" => array
          (
             "SqlAccessor" => "FiscalsObj",
             "SqlObject" => "FiscalsObject",
             "SqlClass" => "Fiscals",
             "SqlFile" => "Fiscals.php",
             "SqlHref" => TRUE,
             "SqlTable" => "#Unit__#Event_Fiscals",
             "SqlFilter" => "#Name",
             "SqlDerivedData" => array("Name"),

             "ItemName"      => "Fiscal",
             "ItemsName"     => "Fiscais",
             "ItemsNamer"    => "Name",

             "ItemName_UK"   => "Fiscal",
             "ItemsName_UK"  => "Fiscals",
             "ItemsNamer_UK" => "Name",
          ),
         "Assessors" => array
          (
             "SqlAccessor" => "AssessorsObj",
             "SqlObject" => "AssessorsObject",
             "SqlClass" => "Assessors",
             "SqlFile" => "Assessors.php",
             "SqlHref" => TRUE,
             "SqlTable" => "#Unit__#Event_Assessors",
             "SqlFilter" => "#Name",
             "SqlDerivedData" => array("Name"),

             "ItemName"      => "Corretor",
             "ItemsName"     => "Corretores",
             "ItemsNamer"    => "Name",

             "ItemName_UK"   => "Assessor",
             "ItemsName_UK"  => "Assessors",
             "ItemsNamer_UK" => "Name",
          ),
         "Assessments" => array
          (
             "SqlAccessor" => "AssessmentsObj",
             "SqlObject" => "AssessmentsObject",
             "SqlClass" => "Assessments",
             "SqlFile" => "Assessments.php",
             "SqlHref" => TRUE,
             "SqlTable" => "#Unit__#Event_Assessments",
             "SqlFilter" => "#Name",
             "SqlDerivedData" => array("Name"),

             "ItemName"      => "Avaliação",
             "ItemsName"     => "Avaliações",
             "ItemsNamer"    => "Name",

             "ItemName_UK"   => "Assessment",
             "ItemsName_UK"  => "Assessments",
             "ItemsNamer_UK" => "Name",
          ),
         "Corrections" => array
          (
             "SqlAccessor" => "CorrectionsObj",
             "SqlObject" => "CorrectionsObject",
             "SqlClass" => "Corrections",
             "SqlFile" => "Corrections.php",
             "SqlHref" => TRUE,
             "SqlTable" => "#Unit__#Event_Corrections",
             "SqlFilter" => "#Name",
             "SqlDerivedData" => array("Name"),

             "ItemName"      => "Correção",
             "ItemsName"     => "Correções",
             "ItemsNamer"    => "Name",

             "ItemName_UK"   => "Correction",
             "ItemsName_UK"  => "Corrections",
             "ItemsNamer_UK" => "Name",
          ),
       ),

       "PermissionVars" => array
       (
       ),
    );
?>