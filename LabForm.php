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
         <?php $LregionID = $_GET['regid']; echo "<form class='p-5' action='?do=Insert&regid=". $LregionID. "' method='POST' enctype='multipart/form-data'>";?>
         <div class="form-row">
            <div class="form-group col-md-12">
               <label for="inputEmail4">Lab Name</label>
               <input type="text" class="form-control" name="labName" placeholder="Name" required>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-12">
               <label for="inputEmail4">Lab Email</label>
               <input type="text" class="form-control" name="Labmail" placeholder="Email" required>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-12">
               <label for="inputEmail4">Lab password</label>
               <input type="password" class="form-control" name="Labpass" placeholder="Password" required>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-12">
               <label for="inputEmail4">Address</label>
               <input type="text" class="form-control" name="labAddress"  placeholder="Apartment, studio, or floor" required>
            </div>
         </div>
         <div class="form-group">
            <label for="inputAddress2">Telephone Number</label>
            <input type="text" class="form-control" name="labPhone"  placeholder="Number" required>
         </div>
         <div class="form-group">
            <label for="inputAddress2">Working Hours</label>
            <input type="text" class="form-control" name="WorkingHours"  placeholder="From..." required>
         </div>
         <div class="form-group">
            <label for="exampleFormControlFile1">Hospital Image</label>
            <input type="file" class="form-control-file" name="labImage" >
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
     $LregionID = $_GET['regid']; 
     
       $imageName=  $_FILES['labImage']['name'];
   
       $imageSize= $_FILES['labImage']['size'];
   
       $imageTmp= $_FILES['labImage']['tmp_name'];
   
       $imageType= $_FILES['labImage']['type'];
   
       $avatar_allow_extension= array("jpeg","jpg","png","gif");
       $avatar_extension = strtolower(end(explode('.', $imageName)));
       $Lab_Image = '';
   
   
       if (in_array($avatar_extension, $avatar_allow_extension) AND !empty($imageName)) {
         # code...
         $Lab_Image = rand(0, 10000). '_' . $imageName;
         move_uploaded_file($imageTmp, "data\images\\". $Lab_Image);
   
       }
     
   
   $labName               = $_POST['labName'];
   $labAddress            = $_POST['labAddress'];
   $labPhone              = $_POST['labPhone'];
   $labWorkingHour        = $_POST['WorkingHours'];
   $LabMail               = $_POST['Labmail'];
   $LabPass               = $_POST['Labpass'];
   $Labhashpass           = sha1($LabPass);
     
     
     //$HregionID = $_GET['regid'];
     $stmt = $con->prepare("INSERT INTO labs(LabName, LabAddress, LabPhoneNumber, LabWorkingHours, LabImage, Region_ID, Lab_email, Lab_pass) VALUES (:zLname, :zLaddress, :zLphone, :zLworkinghour,:zimage, :zLregionid, :zLmail, :zLpass)");
     $stmt->execute(array(
       ':zLname'           => $labName,
       ':zLaddress'        => $labAddress,
       ':zLphone'          => $labPhone,
       ':zLworkinghour'    => $labWorkingHour,
       ':zimage'           => $Lab_Image,
       ':zLregionid'       => $LregionID,
       'zLmail'            => $LabMail,
       'zLpass'            => $Labhashpass
   
   
     ));
   
             header('location:temp.php?do=Manage&regid='. $LregionID);
   } 
   
   }elseif ($do == 'Delete') {
           echo "Delete";
           $Region_ID = $_GET['regid'];
            //$Region_ID = $HregionID;
   
           if(isset($_GET['labid']) && is_numeric($_GET['labid'])){
               $labid = intval($_GET['labid']);
           }
           $checklabID = checkItem('LabID', 'labs', $labid);
           
           if ($checklabID > 0) {
   
               # code...
               $stmt = $con->prepare("DELETE FROM labs WHERE LabID = :zid ");
               $stmt-> bindparam(":zid", $labid);
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