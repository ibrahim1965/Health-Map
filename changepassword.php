<?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>
<link rel="stylesheet" href="static/css/about-us.css">

<body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="index.php"><img class="img-fluid" id="logo" src="static/images/Capture.PNG"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="ownerprofile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
     
         
  
      </ul>
      
    </div>
          
  </nav>
  <!-- navbar ending -->

<?php 

    if(isset($_SESSION['MC_USER'])){
      
      if ($_SERVER['REQUEST_METHOD'] =='POST') {
          $Usermail = $_SESSION['MC_USER'];
          $MColdpassword  = $_POST['oldpass'];
          $MCnewpassword  = $_POST['newpass'];

          $MChashpass = sha1($MColdpassword);
          $MCnewhashpass = sha1($MCnewpassword);


          $stmt = $con->prepare("SELECT * FROM clinics WHERE Clinic_email = ?");
          $stmt->execute(array($Usermail));
   //$profile = $stmt->fetch();

          $stmt2 = $con->prepare("SELECT * FROM labs WHERE Lab_email = ?");
          $stmt2->execute(array($Usermail));

          $stmt3 = $con->prepare("SELECT * FROM hospitals WHERE Hospital_email = ?");
          $stmt3->execute(array($Usermail));
   //$profile2 = $stmt->fetch();
   
            $count2 = $stmt2->rowCount();
            $count = $stmt->rowCount();
            $count3 = $stmt3->rowCount();

            if($count>$count2){
              $profile = $stmt->fetch();
              $suff = 'Clinic';
            }else if($count2 > $count3){
              $profile = $stmt2->fetch();
              $suff = 'Lab';
            }else{
              $profile = $stmt3->fetch();
            $suff = 'Hospital';
            }

          if($count>$count2){
              
              if($profile['Clinic_pass'] == $MChashpass){
                $stmt5 = $con->prepare("UPDATE clinics SET Clinic_pass = ? WHERE Clinic_email = ? ");
                $stmt5 ->execute(array($MCnewhashpass, $Usermail));
                ?>
                  <div class="alert alert-danger" role="alert">
                        Password Changed.
                  </div>

                  <?php
                header('Refresh: 1.5; url=ownerprofile.php');
              }else{
                ?>
                <div class="alert alert-danger" role="alert">
                    Incorrect password try again!
                </div>

                <?php
              }



            }else if($count2 > $count3){

              if($profile['Lab_pass'] == $MChashpass){
                $stmt5 = $con->prepare("UPDATE labs SET Lab_pass = ? WHERE Lab_email = ? ");
                $stmt5 ->execute(array($MCnewhashpass, $Usermail));
                ?>
                  <div class="alert alert-danger" role="alert">
                        Password Changed.
                  </div>

                  <?php
                header('Refresh: 1.5; url=ownerprofile.php');
                //header('Location: ownerprofile.php');
              }else{
                ?>
                <div class="alert alert-danger" role="alert">
                    Incorrect password try again!
                </div>
                
                <?php
              }

            }else{

              if($profile['Hospital_pass'] == $MChashpass){
                $stmt5 = $con->prepare("UPDATE hospitals SET Hospital_pass = ? WHERE Hospital_email = ?");
                $stmt5 ->execute(array($MCnewhashpass, $Usermail ));
                ?>
                  <div class="alert alert-danger" role="alert">
                        Password Changed.
                  </div>

                  <?php
                header('Refresh: 1.5; url=ownerprofile.php');
              }else{
                ?>
                <div class="alert alert-danger" role="alert">
                    Incorrect password try again!
                </div>
                
                <?php
              }

            }





            









      }
   }

?>




    <!--CONTENT-->

<div class="o-home">
<div class="o-layer">

     
<div class="container o-container ">
       
<div class=" col-lg-8 col-md-8 col-sm-8 offset-md-2 col-md-offset-2 ">
<div class="o-title2">
<h2 >Welcome,</h2>
<h4>Change password for more security!</h4>
</div>
<div class="row pt-25 pb-25">
<div class="container-fluid o-loginn ">
<form id="contact-form" class="o-contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method ="POST">
              
<div class="form-group">
<label class="label ">Old password</label>
<input class="form-control" type="password" name="oldpass" required>
</div>
              
<div class="form-group">
<label class="label ">New password</label>
<input class="form-control" type="password" name="newpass" required>
</div>
              
<div class="form-group mt-25">
<input class="btn btn-outline-primary  btn-lg o-btn" type="submit" value="Change">
</div>

</form>
</div>
</div>
</div>

 
</div>
</div>
</div>



    
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>




</body>
</html>