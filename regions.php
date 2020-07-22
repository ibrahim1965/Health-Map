<?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>
<title>Health Map | Regions</title>
</head>
<body>
   <!--Navbar-->
   <?php include('includes/navbar.php') ?>
   <!-- navbar ending -->
   <?php
      //ob_start();
      //ob_clean()
      
      
      //$pagetitle = '';
      
      if ( isset($_SESSION['ID']) AND ($_SESSION['GroupID']== 1) ) {
      
          
      
          $do = isset($_GET['do']) ? $_GET['do'] : 'Manage' ;
          
      
          if ($do == 'Manage') {
              # code...
              //echo "Welcome";
      
              $stmt2 = $con->prepare("SELECT * FROM regions ORDER BY RegionName ASC");
              $stmt2->execute();
              $regions    = $stmt2->fetchAll();
              
              
              //print_r();
              ?>
   <div class="e-sec1-regions mb-5">
      <div class="e-sec1-layer">
         <div class="container">
            <div class="e-sec1-regions-caption">
               <h2>Emergency?</h2>
               <h1>Find Nearest</h1>
               <h2>Medical Facility...</h2>
            </div>
         </div>
      </div>
   </div>
   <div class="e-region-intro my-5">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="e-region-introlayer">
                  <h2 class="w-50 m-auto text-center font-weight-bold">CHOOSE YOUR REGION</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="e-regions my-5">
      <div class="container">
         <div class="row">
            <!--regions loop start-->
            <?php foreach ($regions as $region) { ?>
            <div class="col-lg-3 col-md-6 col-sm-12">
               <div class="e-regions-layer text-center pb-3 my-4">
                  <i class="fas fa-2x fa-map-marker-alt my-3"></i>
                  <!-- region name--> 
                  <h2 class="font-weight-bold"> <?php echo $region['RegionName']; ?></h2>
                  <?php echo "<a href='temp.php?do=Manage&regid=". $region['RegionID'] .  "' method='POST' class='my-3 btn btn-outline-dark e-region-btn  py-2'>VIEW</a>";
                     echo "<form action='?do=Delete&regid=". $region['RegionID'] .  "' method='POST'>";?>
                  <button  class="btn btn-outline-danger m-auto d-block py-2">DELETE</button>
                  </form>
               </div>
            </div>
            <?php } ?>
            <!-- loop End -->
         </div>
      </div>
   </div>
   <div class="e-admin-btns d-flex  justify-content-center">
      <div class="form-group e-btn-admin my-5">
         <form action="?do=Insert" method="POST">
            <button class="btn btn-outline-success p-2" >ADD</button>
            <input class="form-group p-2" type="text" name="addRegion"  required placeholder="Enter region name "/><br/>
         </form>
      </div>
   </div>
   <?php
      }
      
      
      
      elseif ($do == 'Insert') {
          //echo "Insert";
      
      
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              # code...
              $addRegion = $_POST['addRegion'];
      
              
      
      
              $checkregionName = checkItem("RegionName", "regions", $addRegion);
              if ($checkregionName > 0 OR empty($addRegion)) {
                  # code...
                  //echo "exist";

                  ?>
                  <div class="alert alert-danger" role="alert">
                        This Region existed!
                  </div>

                  <?php
                  header('Refresh: 1.5; url=?do=Manage');
                  //header('location:?do=Manage');
                  //exit();
              }else{
                  $stmt = $con->prepare("INSERT INTO regions(RegionName) VALUES (:zaddRegion)");
                  $stmt->execute(array(
                      'zaddRegion' => $addRegion
                  ));
      
                   header('location:?do=Manage');
              }
          }
         // header('location:?do=Manage');
      }
      
      elseif ($do == 'Edit') {
          echo "Edit";
      }
      
      elseif ($do == 'Update') {
          echo "Update";
      }
      
      elseif ($do == 'Delete') {
          echo "Delete";
      
           
      
          if(isset($_GET['regid']) && is_numeric($_GET['regid'])){
              $regid = intval($_GET['regid']);
          }
          $checkregionID = checkItem('RegionID', 'regions', $regid);
      
          if ($checkregionID > 0) {
              # code...
              $stmt = $con->prepare("DELETE FROM regions WHERE RegionID = :zid");
              $stmt-> bindparam(":zid", $regid);
              $stmt->execute();
          }
          header('location:?do=Manage');
      }
      }
      
      
      
      
      elseif (isset($_SESSION['ID']) AND ($_SESSION['GroupID']== 0)) {
       # code...
      $stmt2 = $con->prepare("SELECT * FROM regions ORDER BY RegionName ASC");
          $stmt2->execute();
          $regions    = $stmt2->fetchAll();
          
          
          //print_r();
          ?>
   <div class="e-sec1-regions mb-5">
      <div class="e-sec1-layer">
         <div class="container">
            <div class="e-sec1-regions-caption">
               <h2>Emergency?</h2>
               <h1>Find Nearest</h1>
               <h2>Medical Facility...</h2>
            </div>
         </div>
      </div>
   </div>
   <div class="e-region-intro my-5">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="e-region-introlayer">
                  <h2 class="w-50 m-auto text-center font-weight-bold">CHOOSE YOUR REGION</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="e-regions my-5">
      <div class="container">
         <div class="row">
            <!--regions loop start-->
            <?php foreach ($regions as $region) { ?>
            <div class="col-lg-3 col-md-6 col-sm-12">
               <div class="e-regions-layer text-center pb-3 my-4">
                  <i class="fas fa-2x fa-map-marker-alt my-3"></i>
                  <!-- region name--> 
                  <h2 class="font-weight-bold"> <?php echo $region['RegionName'] .' '. $region['RegionID']; ?></h2>
                  <?php echo "<a href='temp.php?do=Manage&regid=". $region['RegionID'] .  "' method='POST' class='my-3 btn btn-outline-dark e-region-btn  py-2'>VIEW</a>";
                     ?>
               </div>
            </div>
            <?php } ?>
            <!-- loop End -->
         </div>
      </div>
   </div>
   <?php }else{
      header('location:error.php');
      }
      ?>
   <!--starting footer-->
   <?php include('includes/footer.php') ?>