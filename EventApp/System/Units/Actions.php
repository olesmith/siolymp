array
(
      "Start" => array
      (
         "Href"     => "",
         "HrefArgs" => "Unit=#ID&ModuleName=Application&Action=Start",
         "Title"    => "Início",
         "Title_UK" => "Start",
         "Name"     => "Início",
         "Name_UK"   => "Start",
         "URLMethod"  => "GenStartURL",
 
         "Public"   => 1,
         "Person"   => 1,
         "Friend"     => 1,
         "Distributor" => 1,
         "Coordinator" => 1,
         "Admin"    => 1,
      ),
      'Search' => array
      (
         'Public' => 0,
         'Person' => 0,
         "Admin" => 0,
         "Friend"     => 0,
         "Coordinator" => 0,
         "Distributor" => 0,
         "Assessor"  => 0,
      ),
      'Add' => array
      (
         'Public' => 0,
         'Person' => 0,
         "Admin" => 0,
         "Friend"     => 0,
         "Coordinator" => 0,
         "Distributor" => 0,
         "Assessor"  => 0,
      ),
      'Copy' => array
      (
         'Public' => 0,
         'Person' => 0,
         "Admin" => 0,
         "Friend"     => 0,
         "Coordinator" => 0,
         "Distributor" => 0,
         "Assessor"  => 0,
      ),
      'Show' => array
      (
         'Public' => 1,
         'Person' => 0,
         "Admin" => 1,
         "Friend"     => 1,
         "Coordinator" => 1,
         "Distributor" => 1,
         "Assessor"  => 1,
         "AccessMethod" => "CheckShowAccess",
      ),
      'ShowList' => array
      (
         'Public' => 0,
         'Person' => 0,
         "Admin" => 0,
         "Friend"     => 0,
         "Coordinator" => 0,
         "Distributor" => 0,
         "Assessor"  => 0,
      ),
      'Edit' => array
      (
         'Public' => 0,
         'Person' => 0,
         "Admin" => 1,
         "Friend"     => 0,
         "Coordinator" => 0,
         "Assessor"  => 0,
         "Distributor" => 1,
         "AccessMethod" => "CheckEditAccess",
      ),
      'EditList' => array
      (
         'Public' => 0,
         'Person' => 0,
         "Admin" => 0,
         "Friend"     => 0,
         "Coordinator" => 0,
         "Distributor" => 0,
         "Assessor"  => 0,
      ),
      'Delete' => array
      (
         'Public' => 0,
         'Person' => 0,
         "Admin" => 0,
         "Friend"     => 0,
         "Coordinator" => 0,
         "Assessor"  => 0,
         "AccessMethod" => "CheckDeleteAccess",
      ),
      'Download' => array
      (
         'Public' => 1,
         'Person' => 0,
         "Admin" => 1,
         "Friend"     => 1,
         "Coordinator" => 1,
         "Assessor"  => 1,
         "Distributor" => 1,
         "NoLogging" => TRUE,
         //"AccessMethod" => "CheckShowAccess",
      ),
      'Zip' => array
      (
         "HrefArgs" => "?Unit=#ID&ModuleName=Units&Action=Zip",
         'Public' => 0,
         'Person' => 0,
         "Admin" => 1,
         "Friend"     => 0,
         "Coordinator" => 0,
         "Distributor" => 0,
         "Assessor"  => 0,
         "AccessMethod" => "CheckEditAccess",
      ),
      'MyUnit' => array
      (
         'Public' => 0,
         'Person' => 0,
         "Admin" => 1,
         "Friend"     => 0,
         "Coordinator" => 0,
         "Distributor" => 0,
         "Assessor"  => 0,
      ),
);
