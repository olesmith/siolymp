array
(
   "Basic" => array
   (
      "Name" => "Evento",
      "Name_UK" => "Event",

      "Data" => array
      (
         "Status","Visible","Initials","Name","Title","Place","Place_Address","Place_Site",
         "EventStart","EventEnd",
         "Date",
         "AnnouncementLink","Announcement",
      ),
      "Admin" => 1,
      "Person" => 0,
      "Public" => 1,
      "Admin" => 1,
      "Friend"     => 1,
      "Coordinator" => 1,
      "Single" => FALSE,
    ),
    "Components" => array
    (
       "Name" => "Componentes",
       "Name_UK" => "Components",
       "Data" => array
       (
          "Payments","Selection",
          "Certificates","Certificates_Published",
          "Distribution_Public","Result_Public",
          //"Collaborations",
          "Info",
       ),

       "Person" => 0,
       "Public" => 1,
       "Admin" => 1,
       "Friend"     => 1,
       "Coordinator" => 1,
    ),
    "Certificates" => array
    (
       "Name" => "Certificados",
       "Name_UK" => "Certificates",
       "Data" => array
       (
           "Certificates","Certificates_Published","Certificates_CH","Certificates_Participants_CH",
           "Certificates_Latex_Sep_Vertical",
           "Certificates_Latex_Sep_Horisontal",
           "Certificates_Watermark","GenCert",
        ),

       "Person" => 0,
       "Public" => 1,
       "Admin" => 1,
       "Friend"     => 0,
       "Coordinator" => 1,
       "GenTableMethod" => "Event_Certificate_Table",
       "SubAction" => "Certificates",
    ),
    "Certificate_Signatures" => array
    (
       "Name" => "Certificados, Assinaturas",
       "Name_UK" => "Certificates, Signatures",
       "Data" => array
       (
          "Certificates_Signature_1","Certificates_Signature_1_Text1","Certificates_Signature_1_Text2",
          "Certificates_Signature_2","Certificates_Signature_2_Text1","Certificates_Signature_2_Text2",
          "Certificates_Signature_3","Certificates_Signature_3_Text1","Certificates_Signature_3_Text2",
        ),

       "Person" => 0,
       "Public" => 1,
       "Admin" => 1,
       "Friend"     => 0,
       "Coordinator" => 1,
       "AccessMethod" => "Event_Certificates_Has",
       "SubAction" => "Certificates",
    ),
    "Certificate_Latex" => array
    (
       "Name" => "Certificados, Participante",
       "Name_UK" => "Certificates, Participant",
       "Data" => array
       (
           "Certificates_Latex","Certificates_Participant_Latex","Certificates_Honouration_Latex"
        ),

       "Person" => 0,
       "Public" => 1,
       "Admin" => 1,
       "Friend"     => 0,
       "Coordinator" => 1,
       "Single" => 1,
       "AccessMethod" => "Event_Certificates_Has",
       "SubAction" => "Certificates",
    ),
    /* "Collaborations" => array */
    /* ( */
    /*    "Name" => "Colaborações", */
    /*    "Name_UK" => "Collaborations", */
    /*    "Data" => array */
    /*    ( */
    /*       "Collaborations","Collaborations_Inscriptions","Collaborations_StartDate","Collaborations_EndDate", */
    /*    ), */

    /*    "Person" => 0, */
    /*    "Public" => 1, */
    /*    "Admin" => 1, */
    /*    "Friend"     => 1, */
    /*    "Coordinator" => 1, */
    /*    "AccessMethod" => "Event_Collaborations_Has", */
    /*    "SubAction" => "Collaborations", */
    /* ), */
);
