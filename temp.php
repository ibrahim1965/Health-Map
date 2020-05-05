<?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>
<!--Navbar-->
    <?php include('includes/navbar.php')
     ?>

<!-- navbar ending -->
<?php

	//ob_start();
	

	$pagetitle = '';

	if (isset($_SESSION['USER'])) {

	 	$do = isset($_GET['do']) ? $_GET['do'] : 'Manage' ;

	 	if ($do == 'Manage') {
	 		# code...
	 		echo "Welcome";

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
         <a href="hospitalForm.php" class="btn btn-success m-2">Add</a>
           </div>
    
<div class="row row-cols-1 row-cols-md-3">
    <!--loop start here-->
  <div class="col mb-4">
    <div class="card">
      <img src="static/images/3a0a482b5fc6945e2b4c50403a0c5beb.jpg" class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title">Hospital Name</h5>
        
          <div class="d-flex justify-content-center">
          <a href="specHospital.html" class="btn m-2">View</a>
              <!--for admin-->
          <button class="btn1">Delete</button>

              </div>
      </div>
    </div>
  </div>


 <!--loop end here-->
    </div>
      
       </div>
      
      
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="clinic-tab">
      
      
      <!--for admin-->
      <div class="admin-buttons d-flex justify-content-end ">
         <a href="clinicForm.html" class="btn btn-success m-2">Add</a>
           </div>
    
<div class="row row-cols-1 row-cols-md-3">
    <!--loop start here-->
  <div class="col mb-4">
    <div class="card">
      <img src="images/3a0a482b5fc6945e2b4c50403a0c5beb.jpg" class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title">Clinic Name</h5>
       
          <div class="d-flex justify-content-center">
          <a href="specClinic.html" class="btn m-2">View</a>
              <!--for admin-->
          <button class="btn1">Delete</button>

              </div>
      </div>
    </div>
  </div>
 <!--loop end here-->
    </div>
      
       </div> 
      
      
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="lab-tab">
      
      <!--for admin-->
      <div class="admin-buttons d-flex justify-content-end ">
         <a href="labForm.html" class="btn btn-success m-2">Add</a>
           </div>
    
<div class="row row-cols-1 row-cols-md-3">
    <!--loop start here-->
  <div class="col mb-4">
    <div class="card">
      <img src="images/3a0a482b5fc6945e2b4c50403a0c5beb.jpg" class="card-img-top" alt="...">
      <div class="card-body text-center">
        <h5 class="card-title">Lab Name</h5>
        
          <div class="d-flex justify-content-center">
          <a href="specLab.html" class="btn m-2">View</a>
              <!--for admin-->
          <button class="btn1">Delete</button>

              </div>
      </div>
    </div>
  </div>
 <!--loop end here-->
    </div>
      
       </div>
      
      
 	</div>

    
    </div>
           
           
    </div>
       <?php
	 	}

	 	elseif ($do == 'Add') {

	 	}

	 	elseif ($do == 'Insert') {
	 		echo "Insert";


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
?>
<!--starting footer-->

<?php include('includes/footer.php') ?>