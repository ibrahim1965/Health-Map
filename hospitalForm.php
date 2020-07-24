<?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>
<?php $do = isset($_GET['do']) ? $_GET['do']: ''; ?>
<link rel="stylesheet" href="static/css/hospitalForm.css">
<!--Navbar-->
<?php include('includes/navbar.php') ?>
<!-- navbar ending -->
<?php if (isset($_SESSION['ID'])) { 
   $do = isset($_GET['do']) ? $_GET['do'] : 'Manage' ;
   
         if ($do == 'Manage') { ?>
<!--form-->
<div class="hospital-form py-5">
   <div class="container d-flex justify-content-center mt-5">
      <div class="F-content my-5 ">
         <?php 
            $HregionID = $_GET['regid']; 
            echo "<form class='p-5' action='?do=Insert&regid=". $HregionID. "' method='POST' enctype='multipart/form-data'> ";?>
         <div class="form-row">
            <div class="form-group col-md-12">
               <label for="inputEmail4">Hospital Name</label>
               <input type="text" class="form-control" name="HospitalName" placeholder="Name" required>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-12">
               <label for="inputEmail4">Lab Email</label>
               <input type="text" class="form-control" name="Hospitalmail" placeholder="Email" required>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-12">
               <label for="inputEmail4">Lab password</label>
               <input type="password" class="form-control" name="Hospitalpass" placeholder="Password" required>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-12">
               <label for="inputEmail4">Address</label>
               <input type="text" class="form-control" name="HospitalAddress"  placeholder="Apartment, studio, or floor" required>
            </div>
         </div>
         <div class="form-group">
            <label for="inputAddress2">Telephone Number</label>
            <input type="text" class="form-control" name="HospitalPhone"  placeholder="Number" required>
         </div>
         <div class="form-group">
            <label for="inputAddress2">Working Hours</label>
            <input type="text" class="form-control" name="WorkingHours"  placeholder="From..." required>
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
   }
   
    	
   
   
   
   if($do == 'Insert'){
   	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   	$HregionID = $_GET['regid']; 
   	
   		$imageName=  $_FILES['HospitalImage']['name'];
   
   		$imageSize= $_FILES['HospitalImage']['size'];
   
   		$imageTmp= $_FILES['HospitalImage']['tmp_name'];
   
   		$imageType= $_FILES['HospitalImage']['type'];
   
   		$avatar_allow_extension= array("jpeg","jpg","png","gif");
   		$avatar_extension = strtolower(end(explode('.', $imageName)));
   		$Hospital_Image = '';
   
   
   		if (in_array($avatar_extension, $avatar_allow_extension) AND !empty($imageName)) {
   			# code...
   			$Hospital_Image = rand(0, 10000). '_' . $imageName;
   			move_uploaded_file($imageTmp, "data\images\\". $Hospital_Image);
   
   		}
   		
   	
   
   $HospitalName 			    = $_POST['HospitalName'];
   $HospitalAddress 		  = $_POST['HospitalAddress'];
   $HospitalPhone 			  = $_POST['HospitalPhone'];
   $HospitalWorkingHour 	= $_POST['WorkingHours'];
   $Hospitalmail          = $_POST['Hospitalmail'];
   $Hospitalpass          = $_POST['Hospitalpass'];
   $Hospitalhashpass      = sha1($Hospitalpass);
   
   	
   	
   	//$HregionID = $_GET['regid'];
   	$stmt = $con->prepare("INSERT INTO hospitals(HospitalName, HospitalAddress, HospitalPhone, HospitalWorkingHour,image, Region_ID, Hospital_email, Hospital_pass) VALUES (:zHname, :zHaddress, :zHphone, :zHworkinghour, :zimage, :zhregionid, :zhmail, :zhpass)");
   	$stmt->execute(array(
   		':zHname' 			  => $HospitalName,
   		':zHaddress' 		  => $HospitalAddress,
   		':zHphone' 			  => $HospitalPhone,
   		':zHworkinghour'  => $HospitalWorkingHour,
   		':zimage'			    => $Hospital_Image,
   		':zhregionid'		  => $HregionID,
      ':zhmail'         => $Hospitalmail,
      ':zhpass'         => $Hospitalhashpass
   
   
   	));
   
   	        header('location:temp.php?do=Manage&regid='. $HregionID);
   }	
   
   }elseif ($do == 'Delete') {
            
            $Region_ID = $_GET['regid'];
             //$Region_ID = $HregionID;
   
            if(isset($_GET['hospitalid']) && is_numeric($_GET['hospitalid'])){
                $hospitalid = intval($_GET['hospitalid']);
            }
            $checkhospitalID = checkItem('HospitalID', 'hospitals', $hospitalid);
            
            if ($checkhospitalID > 0) {
   
                # code...
                $stmt = $con->prepare("DELETE FROM hospitals WHERE HospitalID = :zid ");
                $stmt-> bindparam(":zid", $hospitalid);
                $stmt->execute();
                echo $Region_ID;
   
                header('location:temp.php?do=Manage&regid='. $Region_ID);
            }
            
        }
    }else{
      header('location:error.php');
    }
   
   
   
   
   
   ?>
<!--starting footer-->
<?php include('includes/footer.php') ?>