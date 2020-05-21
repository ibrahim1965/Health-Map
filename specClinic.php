<?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>
<!--Navbar-->
    <?php include('includes/navbar.php')
     ?>

<!-- navbar ending -->
<?php
	$Clinic_ID = $_GET['clinicid'];
	$Region_ID = $_GET['regid'];

	$stmt = $con->prepare("SELECT * FROM clinics WHERE  ClinicID = $Clinic_ID");
            $stmt->execute();
            $clinics    = $stmt->fetchAll();

	//ob_start();

            
            //print_r(expression)

	

	$pagetitle = '';


	if (isset($_SESSION['ID'])) {

	 	$do = isset($_GET['do']) ? $_GET['do'] : 'Manage' ;

	 	if ($do == 'Manage') {
	 		# code...
	 		

	 		?>

<div class="o-home6">
<div class="o-layer4">
    
         
<div class="container o-con">
           
           <?php foreach ($clinics as $clinic) {
            //Dr.Hany Elkhattab clini
                    ?>
    


    
    
<div class="card text-center o-clinilab m-auto">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
<div class="card-header o-hood">
<h1 class="text-uppercase py-2"><?php echo $clinic['ClinicName'] ; ?></h1>
</div>
<div class="card-body o-boo px-5">
<h2 >Address:    <small class="o-address-o text-center"><?php echo $clinic['ClinicAddress'] ; ?></small></h2>
<h2 >Phone:    <small class="o-address-o text-center"><?php echo $clinic['ClinicPhoneNumber'] ; ?></small></h2>
<h2 >Working Hours:    <small class="o-address-o text-center"><?php echo $clinic['ClinicWorkingHours'] ; ?></small></h2>
<h3 class="card-text mt-4"> "Extraordinary people. Extraordinary care"</h3>
                
<!-- Button trigger modal -->
<?php echo "<form action='page.php?do=ManageClinics&clinicid=". $Clinic_ID ."&regid=". $Region_ID. "' method='POST'>";?>
<button   class="btn btn-outline-primary btn-lg e-book-btn">
    BOOK
    </button>
    </form>
  

                  
</div>
<div class="card-footer py-3 o-hood">
Your needs, our priorities.
</div>

</div>
</div>
</div>
            
    
    
    
    
    
    
    
    
     
</div>
<?php } ?>
</div>
</div>


	 		<?php  


	 	}elseif ($do == 'Add') {

	 	}elseif ($do == 'Insert') {
	 		echo "Insert";
	 		

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
	 }else{
      header('location:error.php');
    }
?>
<!--starting footer-->

<?php include('includes/footer.php') ?>