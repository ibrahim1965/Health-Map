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
         <?php $CregionID = $_GET['regid']; echo "<form class='p-5' action='?do=Insert&regid=". $CregionID. "' method='POST' enctype='multipart/form-data'> ";?>
         <div class="form-row">
            <div class="form-group col-md-12">
               <label for="inputEmail4">clinic Name</label>
               <input type="text" class="form-control" name="clinicName" placeholder="Name" required>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-12">
               <label for="inputEmail4">Lab Email</label>
               <input type="text" class="form-control" name="clinicmail" placeholder="Email" required>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-12">
               <label for="inputEmail4">Lab password</label>
               <input type="password" class="form-control" name="clinicpass" placeholder="Password" required>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-12">
               <label for="inputEmail4">Address</label>
               <input type="text" class="form-control" name="clinicAddress"  placeholder="Apartment, studio, or floor" required>
            </div>
         </div>
         <div class="form-group">
            <label for="inputAddress2">Telephone Number</label>
            <input type="text" class="form-control" name="clinicPhone"  placeholder="Number" required>
         </div>
         <div class="form-group">
            <label for="inputAddress2">Working Hours</label>
            <input type="text" class="form-control" name="WorkingHours"  placeholder="From..." required>
         </div>
         <div class="form-group">
            <label for="exampleFormControlFile1">Hospital Image</label>
            <input type="file" class="form-control-file" name="clinicImage" >
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
    $CregionID =$_GET['regid']; 
   
        $imageName=  $_FILES['clinicImage']['name'];
   
        $imageSize= $_FILES['clinicImage']['size'];
   
        $imageTmp= $_FILES['clinicImage']['tmp_name'];
   
        $imageType= $_FILES['clinicImage']['type'];
   
        $avatar_allow_extension= array("jpeg","jpg","png","gif");
        $avatar_extension = strtolower(end(explode('.', $imageName)));
        $Clinic_Image = '';
   
   
        if (in_array($avatar_extension, $avatar_allow_extension) AND !empty($imageName)) {
          # code...
          $Clinic_Image = rand(0, 10000). '_' . $imageName;
          move_uploaded_file($imageTmp, "data\images\\". $Clinic_Image);
   
        }
    
   
   $clinicName            = $_POST['clinicName'];
   $clinicAddress         = $_POST['clinicAddress'];
   $clinicPhone           = $_POST['clinicPhone'];
   $clinicWorkingHour     = $_POST['WorkingHours'];
   $clinicMail            = $_POST['clinicmail'];
   $clinicPass            = $_POST['clinicpass'];
    
    
    //$HregionID = $_GET['regid'];
    $stmt = $con->prepare("INSERT INTO clinics(ClinicName, ClinicAddress, ClinicPhoneNumber, ClinicWorkingHours, Clinicimage, Region_ID, Clinic_email , Clinic_pass) VALUES (:zCname, :zCaddress, :zCphone, :zCworkinghour,:zimage, :zCregionid, :zCmail, :zCpass)");
    $stmt->execute(array(
      ':zCname'           => $clinicName,
      ':zCaddress'        => $clinicAddress,
      ':zCphone'          => $clinicPhone,
      ':zCworkinghour'    => $clinicWorkingHour,
      ':zimage'           => $Clinic_Image,
      ':zCregionid'       => $CregionID,
      ':zCmail'           => $clinicMail,
      ':zCpass'           => $clinicPass
   
   
    ));
   
            header('location:temp.php?do=Manage&regid='. $CregionID);
   }  
   
   }elseif ($do == 'Delete') {
            
            $Region_ID = $_GET['regid'];
             //$Region_ID = $HregionID;
   
            if(isset($_GET['clinicid']) && is_numeric($_GET['clinicid'])){
                $clinicid = intval($_GET['clinicid']);
            }
            $checkclinicID = checkItem('ClinicID', 'clinics', $clinicid);
            
            if ($checkclinicID > 0) {
   
                # code...
                $stmt = $con->prepare("DELETE FROM clinics WHERE ClinicID = :zid ");
                $stmt-> bindparam(":zid", $clinicid);
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