<?php 
   
   require_once('includes/head_section.php');
   include 'includes/DBconnect.php';
   
   if(isset($_SESSION['MC_USER'])){
      header('Location: ownerprofile.php');
   }
   
   if ($_SERVER['REQUEST_METHOD'] =='POST') {
     
     $MCUseremail     = $_POST['email'];
     $MCuserpassword  = $_POST['pass'];
     $MChashedpassword= sha1($MCuserpassword);
   
     //$stmt = $con->prepare("SELECT UserID, UserEmail, UserPassword FROM users WHERE UserEmail = ? AND UserPassword = ? AND GroupID = 1 ");
     //$stmt->execute(array($Useremail, $hashedpassword,));
     //$row = $stmt->fetch(); 
     //$count = $stmt->rowCount();
   
     if (empty($MCUseremail) || empty($MCuserpassword)) {
       echo "Please insert all data";
     }else{
       
     $stmt = $con->prepare("SELECT * FROM clinics WHERE Clinic_email = ? AND Clinic_pass = ? ");
     $stmt->execute(array($MCUseremail, $MChashedpassword));
     $profile = $stmt->fetch();
     $count = $stmt->rowCount();

     $stmt2 = $con->prepare("SELECT * FROM labs WHERE Lab_email = ? AND Lab_pass = ? ");
     $stmt2->execute(array($MCUseremail, $MChashedpassword));
     $profile2 = $stmt2->fetch();
     $count2 = $stmt2->rowCount();

     $stmt3 = $con->prepare("SELECT * FROM hospitals WHERE Hospital_email = ? AND Hospital_pass = ? ");
     $stmt3->execute(array($MCUseremail, $MChashedpassword));
     $profile3 = $stmt3->fetch();
     $count3 = $stmt3->rowCount();


   
   
   
     if ($count > 0 || $count2 > 0 || $count3 > 0) {
       # code...
       $_SESSION['MC_USER'] = $MCUseremail;
       //$_SESSION['MC_cID']   = $profile['ClinicID'];

       //$_SESSION['GroupID'] = $profile['GroupID'];
   
       
       
       header('Location: ownerprofile.php');
   
     }else{
      ?>
      <div class="alert alert-danger" role="alert">
          Incorrect mail or password, please try again!
      </div>
      <?php
     }
     }
   
   
     
   
   }
   
   ?>
<title>Health Map | Login</title>
</head>
<body>
   <!--Navbar-->
   <?php include('includes/navbar.php') ?>
   <!-- navbar ending -->
   <!--CONTENT-->
   <?php if (!isset($_SESSION['ID']) && !isset($_SESSION['MC_ID'])) {
      
     ?>
   <div class="o-home">
      <div class="o-layer">
         <div class="container o-container ">
            <div class=" col-lg-8 col-md-8 col-sm-8 offset-md-2 col-md-offset-2 ">
               <div class="o-title2">
                  <h2 >WELCOME BACK,</h2>
                  <h4>Let's work together.</h4>
               </div>
               <div class="row pt-25 pb-25">
                  <div class="container-fluid o-loginn ">
                     <form id="contact-form" class="o-contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">
                        <div class="form-group">
                           <label class="label ">Your Email</label>
                           <input class="form-control" type="email" name="email"  required>
                        </div>
                        <div class="form-group">
                           <label class="label ">Password</label>
                           <input class="form-control" type="password" name="pass" required>
                        </div>
                        <div class="form-group mt-25">
                           <input class="btn btn-outline-primary  btn-lg o-btn" type="submit" value="Login">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php }else{
   ?>
      <div class="alert alert-danger" role="alert">
          Already Logged in!
        </div>
   <?php
      }
   ?>
   <!--FOOTER-->
   <?php include('includes/footer.php') ?>