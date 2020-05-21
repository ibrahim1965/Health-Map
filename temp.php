<?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>
<!--Navbar-->
<?php include('includes/navbar.php')
   ?>
<!-- navbar ending -->
<?php
   //ob_start();
   
   
   //$pagetitle = '';
   
   
   if ( isset($_SESSION['ID']) AND ($_SESSION['GroupID']== 1)) {
   
    	$do = isset($_GET['do']) ? $_GET['do'] : 'Manage' ;
   
    	if ($do == 'Manage') {
    		# code...
    		
    		
   				$ID = $_GET['regid'];
   				
   			  $stmt = $con->prepare("SELECT * FROM hospitals WHERE  Region_ID = $ID");
              $stmt->execute();
              $hospitals    = $stmt->fetchAll();
   
   
              $stmt2 = $con->prepare("SELECT * FROM clinics WHERE  Region_ID = $ID");
              $stmt2->execute();
              $clinics    = $stmt2->fetchAll();
   
              $stmt3 = $con->prepare("SELECT * FROM labs WHERE  Region_ID = $ID");
              $stmt3->execute();
              $labs    = $stmt3->fetchAll();
   		
   
    		?>
<div class="view mt-5">
   <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Hospitals" role="tab" aria-controls="home" aria-selected="true">Hospitals</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Clinics</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Labs</a>
         </li>
      </ul>
      <div class="tab-content mt-5" id="myTabContent">
         <div class="tab-pane fade show active" id="Hospitals" role="tabpanel" aria-labelledby="hospital-tab">
            <!--for admin-->
            <div class="admin-buttons d-flex justify-content-end ">
               <?php echo "<a href='hospitalForm.php?regid=" . $ID. "' method='POST' class='btn btn-success m-2'>Add</a>" ;?>
            </div>
            <div class="row row-cols-1 row-cols-md-3">
               <!--loop start here-->
               <?php foreach ($hospitals as $hospital) {
                  # code...
                  ?>
               <div class="col mb-4">
                  <div class="card">
                     <?php if(empty($hospital['image'])){?>
                     <img src="static/images/dental.jpg" class="card-img-top" alt=""><?php
                        }else{
                        echo "<img src='data/images/".$hospital['image']."' class='card-img-top' alt='' '>";}?>
                     <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $hospital['HospitalName']?></h5>
                        <div class="d-flex justify-content-center">
                           <?php echo "<a href='specHospital.php?do=Manage&hospitalid=". $hospital['HospitalID'] ."&regid=". $hospital['Region_ID'] ."' method='POST' class='my-3 btn btn-outline-dark e-region-btn  py-2'>VIEW</a>";
                              echo "<form action='hospitalForm.php?do=Delete&hospitalid=". $hospital['HospitalID'] ."&regid=". $hospital['Region_ID'] ."' method='POST'>";?>
                           <button class="my-3 btn btn-outline-dark e-region-btn  py-2">Delete</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
               <!--loop end here-->
            </div>
         </div>
         <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="clinic-tab">
            <!--for admin-->
            <div class="admin-buttons d-flex justify-content-end ">
               <?php echo "<a href='clinicform.php?regid=" . $ID. "' method='POST' class='btn btn-success m-2'>Add</a>" ;?>
            </div>
            <div class="row row-cols-1 row-cols-md-3">
               <!--loop start here-->
               <?php foreach ($clinics as $clinic) {
                  # code...
                  ?>
               <div class="col mb-4">
                  <div class="card">
                     <?php if(empty($clinic['Clinicimage'])){?>
                     <img src="static/images/dental.jpg" class="card-img-top" alt=""><?php
                        }else{
                        echo "<img src='data/images/".$clinic['Clinicimage']."' class='card-img-top' alt='' '>";}?>
                     <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $clinic['ClinicName']; ?></h5>
                        <div class="d-flex justify-content-center">
                           <?php echo "<a href='specClinic.php?do=Manage&clinicid=". $clinic['ClinicID'] ."&regid=". $clinic['Region_ID'] ."' method='POST' class='my-3 btn btn-outline-dark e-region-btn  py-2'>VIEW</a>";
                              echo "<form action='clinicform.php?do=Delete&clinicid=". $clinic['ClinicID'] ."&regid=". $clinic['Region_ID'] ."' method='POST'>";?>
                           <button class="my-3 btn btn-outline-dark e-region-btn  py-2">Delete</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
               <!--loop end here-->
            </div>
         </div>
         <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="lab-tab">
            <!--for admin-->
            <div class="admin-buttons d-flex justify-content-end ">
               <?php echo "<a href='LabForm.php?regid=" . $ID. "' method='POST' class='btn btn-success m-2'>Add</a>" ;?>
            </div>
            <div class="row row-cols-1 row-cols-md-3">
               <!--loop start here-->
               <?php foreach ($labs as $lab) {
                  # code...
                  ?>
               <div class="col mb-4">
                  <div class="card">
                     <?php if(empty($lab['LabImage'])){?>
                     <img src="static/images/dental.jpg" class="card-img-top" alt=""><?php
                        }else{
                        echo "<img src='data/images/".$lab['LabImage']."' class='card-img-top' alt='' '>";}?>
                     <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $lab['LabName']; ?></h5>
                        <div class="d-flex justify-content-center">
                           <?php echo "<a href='specLab.php?do=Manage&labid=". $lab['LabID'] ."&regid=". $lab['Region_ID'] ."' method='POST' class='my-3 btn btn-outline-dark e-region-btn  py-2'>VIEW</a>";
                              echo "<form action='LabForm.php?do=Delete&labid=". $lab['LabID'] ."&regid=". $lab['Region_ID'] ."' method='POST'>";?>
                           <button class="my-3 btn btn-outline-dark e-region-btn  py-2">Delete</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <!--loop end here-->
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
   }
   
   
   
   elseif ($do == 'Insert') {
   	
   
   
   	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   		# code...
   
   	}
   }
   
   elseif ($do == 'Edit') {
   	echo "Edit";
   }
   
   elseif ($do == 'Update') {
   	echo "Update";
   }
   
   elseif ($do == 'Delete') {
   	echo "Delete";
   }
   }
   
   
   elseif (isset($_SESSION['ID']) AND ($_SESSION['GroupID']== 0)) {
   # code...
   
   
   
   	$ID = $_GET['regid'];
   		
   	$stmt = $con->prepare("SELECT * FROM hospitals WHERE  Region_ID = $ID");
            $stmt->execute();
            $hospitals    = $stmt->fetchAll();
   
   
            $stmt2 = $con->prepare("SELECT * FROM clinics WHERE  Region_ID = $ID");
            $stmt2->execute();
            $clinics    = $stmt2->fetchAll();
   
            $stmt3 = $con->prepare("SELECT * FROM labs WHERE  Region_ID = $ID");
            $stmt3->execute();
            $labs    = $stmt3->fetchAll();
   
   
   	?>
<div class="view mt-5">
   <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Hospitals" role="tab" aria-controls="home" aria-selected="true">Hospitals</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Clinics</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Labs</a>
         </li>
      </ul>
      <div class="tab-content mt-5" id="myTabContent">
         <div class="tab-pane fade show active" id="Hospitals" role="tabpanel" aria-labelledby="hospital-tab">
            <!--for admin-->
            <div class="row row-cols-1 row-cols-md-3">
               <!--loop start here-->
               <?php foreach ($hospitals as $hospital) {
                  # code...
                  ?>
               <div class="col mb-4">
                  <div class="card">
                     <?php if(empty($hospital['image'])){?>
                     <img src="static/images/dental.jpg" class="card-img-top" alt=""><?php
                        }else{
                        echo "<img src='data/images/".$hospital['image']."' class='card-img-top' alt='' '>";}?> <!--section image-->
                     <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $hospital['HospitalName']?></h5>
                        <div class="d-flex justify-content-center">
                           <?php echo "<a href='specHospital.php?do=Manage&hospitalid=". $hospital['HospitalID'] ."&regid=". $hospital['Region_ID'] ."' method='POST' class='my-3 btn btn-outline-dark e-region-btn  py-2'>VIEW</a>";
                              ?>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
               <!--loop end here-->
            </div>
         </div>
         <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="clinic-tab">
            <!--for admin-->
            <div class="row row-cols-1 row-cols-md-3">
               <!--loop start here-->
               <?php foreach ($clinics as $clinic) {
                  # code...
                  ?>
               <div class="col mb-4">
                  <div class="card">
                     <?php if(empty($clinic['Clinicimage'])){?>
                     <img src="static/images/dental.jpg" class="card-img-top" alt=""><?php
                        }else{
                        echo "<img src='data/images/".$clinic['Clinicimage']."' class='card-img-top' alt='' '>";}?>
                     <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $clinic['ClinicName']; ?></h5>
                        <div class="d-flex justify-content-center">
                           <?php echo "<a href='specClinic.php?do=Manage&clinicid=". $clinic['ClinicID'] ."&regid=". $clinic['Region_ID'] ."' method='POST' class='my-3 btn btn-outline-dark e-region-btn  py-2'>VIEW</a>";
                              ?>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
               <!--loop end here-->
            </div>
         </div>
         <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="lab-tab">
            <!--for admin-->
            <div class="row row-cols-1 row-cols-md-3">
               <!--loop start here-->
               <?php foreach ($labs as $lab) {
                  # code...
                  ?>
               <div class="col mb-4">
                  <div class="card">
                     <?php if(empty($lab['LabImage'])){?>
                     <img src="static/images/dental.jpg" class="card-img-top" alt=""><?php
                        }else{
                        echo "<img src='data/images/".$lab['LabImage']."' class='card-img-top' alt='' '>";}?>
                     <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $lab['LabName']; ?></h5>
                        <div class="d-flex justify-content-center">
                           <?php echo "<a href='specLab.php?do=Manage&labid=". $lab['LabID'] ."&regid=". $lab['Region_ID'] ."' method='POST' class='my-3 btn btn-outline-dark e-region-btn  py-2'>VIEW</a>";
                              ?>
                        </div>
                     </div>
                  </div>
               </div>
               <!--loop end here-->
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
   }else{
      header('location:error.php');
    }
   
   
   
   
   
   
   
      
   ?>
<!--starting footer-->
<?php include('includes/footer.php') ?>