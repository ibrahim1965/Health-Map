<?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>
<?php $do = isset($_GET['do']) ? $_GET['do']: ''; ?>

<link rel="stylesheet" href="static/css/hospitalForm.css">


<!--Navbar-->
    <?php include('includes/navbar.php') ?>
<!-- navbar ending -->


 <!--form-->
    <div class="hospital-form py-5">
        <div class="container d-flex justify-content-center mt-5">
        <div class="F-content my-5 ">
      <form class="p-5" action="?do=Insert" method="POST">
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Hospital Name</label>
      <input type="text" class="form-control" name="HospitalName" placeholder="Name">
    </div>
    
  </div>
          <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Address</label>
      <input type="text" class="form-control" name="HospitalAddress"  placeholder="Apartment, studio, or floor">
    </div>
    
  </div>
  
  <div class="form-group">
    <label for="inputAddress2">Telephone Number</label>
    <input type="text" class="form-control" name="HospitalPhone"  placeholder="Number">
  </div>
          <div class="form-group">
    <label for="inputAddress2">Working Hours</label>
    <input type="text" class="form-control" name="WorkingHours"  placeholder="From...">
  </div>
          
          <div class="form-group">
    <label for="exampleFormControlFile1">Hospital Image</label>
    <input type="file" class="form-control-file" name="HospitalImage" >
  </div>
    
  		<button class="btn" id="submit">Add</button>
  		
  
</form>

            
         </div>   
        
        </div>
 </div>

 	<?php 

 		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 			echo "string";
 			echo $_SESSION['HregionID'];

 		

 		$HospitalName 			= $_POST['HospitalName'];
 		$HospitalAddress 		= $_POST['HospitalAddress'];
 		$HospitalPhone 			= $_POST['HospitalPhone'];
 		$HospitalWorkingHour 	= $_POST['WorkingHours'];

 		if($do=='Insert'){
 			echo "string";

 			$stmt = $con->prepare("INSERT INTO hospitals(HospitalName, HospitalAddress, HospitalPhone, HospitalWorkingHour, Region_ID) VALUES (:zHname, :zHaddress, :zHphone, :zHworkinghour, :zhregionid)");
 			$stmt->execute(array(
 				':zHname' 			=> $HospitalName,
 				':zHaddress' 		=> $HospitalAddress,
 				':zHphone' 			=> $HospitalPhone,
 				':zHworkinghour'  	=> $HospitalWorkingHour,
 				':zhregionid'		=> $_SESSION['HregionID']


 			));


 		}
 			//header('location:temp.php');
 		}
 		


 	?>


 <!--starting footer-->

<?php include('includes/footer.php') ?>