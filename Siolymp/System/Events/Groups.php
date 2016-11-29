array
(
   "Basic" => array
   (
      "Name" => "Básicos",
      "Name_UK" => "Basic",
      "Data" => array
      (
         "No",
         "Edit",
         "Delete",
         //"Datas","GroupDatas",
         "Date","Title",
         "EventStart","EventEnd",
         "Visible","Status",
         "Inscribe","Inscription",
         "NoOfInscriptionsCell","NoOfParticipantsCell","NoOfParticipantCitiesCell"
      ),
      "Admin" => 1,
      "Person" => 0,
      "Public" => 1,
      "Admin" => 1,
      "Friend"     => 1,
      "Coordinator" => 1,
   ),
   "Inscriptions" => array
   (
      "Name" => "Inscrições",
      "Name_UK" => "Inscriptions",
      "Data" => array
      (
         "No","Edit","Delete",
         "Title",
         "Event_Date_Span","Inscription",
         "StartDate","EndDate","EditDate",
         "InscribeLink",
      ),
      "Admin" => 1,
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
          "No","Edit","Delete",
          "Event","Friend",
          "Certificates","Certificates_Published",
          "Certificates_CH","Certificates_Participants_CH",
          "Certificates_Watermark"
        ),

       "Person" => 1,
       "Public" => 0,
       "Admin" => 1,
       "Friend"     => 1,
       "Coordinator" => 1,
    ),
);
