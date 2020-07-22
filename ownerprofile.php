
 <?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>
<link rel="stylesheet" href="static/css/about-us.css">
    <title>Health Map | Profile</title>


 </head>
    <body>


        <nav class="navbar navbar-expand-lg navbar-light">

        <a class="navbar-brand" href="index.php"><img id="logo" src="static/images/Capture.PNG"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="changepassword.php?>">Password</a>
                  </li>
                    <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
                </li>
                 
          
              </ul>

        </div>

        </nav>


        <?php 
   $Usermail = $_SESSION['MC_USER'];
   if ( isset($_SESSION['MC_USER']) ) {
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
   

   
   ?>



        <div class="e-region-intro my-5">
        <div class="container">
        <div class="row">
        <div class="col-12">
        <div class="e-region-introlayer">
        <h2 class="w-50 m-auto text-center font-weight-bold">WELCOME TO YOUR PROFILE</h2>
        </div>
        </div>
        </div>
        </div>
        </div>

        <div class="e-profile">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="e-profile-layer">
                            <img src="static/images/profile.png"/>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="e-profile-layer ">
                            <div class="e-profile-caption text-center py-5">
                                <!--loop start for user's profile-->
                                <h2><span>W</span>ELCOME TO <?php 
                                            if($count>$count2){
                                               echo($profile['ClinicName']); 
                                            }else if ($count2>$count3)
                                            {echo($profile['LabName']);
                                            }else {
                                                echo($profile['HospitalName']);
                                            }

                                             ?></h2>
                                <P>We're always here for your help and your comfort, just feel free to ask anything..</P>
                                <div class="e-profile-ul">
                                    <ul>
                                    
                                       
                                        <li>
                                            Location: <span><?php 
                                            if($count>$count2){
                                               echo($profile['ClinicAddress']); 
                                            }else if ($count2>$count3)
                                            {echo($profile['LabAddress']);
                                            }else {
                                                echo($profile['HospitalAddress']);
                                            }
                                             ?></span>
                                            
                                        </li>
                                        <li>
                                            E-mail: <span><?php if($count>$count2){
                                               echo($profile['Clinic_email']); 
                                            }else if ($count2>$count3)
                                            {echo($profile['Lab_email']);
                                            }else {
                                                echo($profile['Hospital_email']);
                                            }
                                             ?></span>
                                        </li>
                                        <li>
                                            Phone Number:<span><?php if($count>$count2){
                                               echo($profile['ClinicPhoneNumber']); 
                                            }else if ($count2>$count3)
                                            {echo($profile['LabPhoneNumber']);
                                            }else {
                                                echo($profile['HospitalPhone']);
                                            }
                                             ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <!--loop end for user's profile-->
                                <?php
                                if($count>$count2){
                                    $Userid = $profile['ClinicID'];
                                    $stmt = $con->prepare("SELECT * FROM appointments WHERE  Clinic_ID = $Userid");
                                    $stmt->execute();
                                    $appointments    = $stmt->fetchAll();
                                }else if($count2>$count3){
                                    $Userid = $profile['LabID'];
                                    $stmt = $con->prepare("SELECT * FROM appointments WHERE  Lab_ID = $Userid");
                                    $stmt->execute();
                                    $appointments  =  $stmt->fetchAll();
                                }else{
                                    $Userid = $profile['HospitalID'];
                                    $stmt = $con->prepare("SELECT * FROM appointments WHERE  Hospital_ID = $Userid");
                                    $stmt->execute();
                                    $appointments  =  $stmt->fetchAll();
                                }
                         
                        
                        
                        
                        
                        ?>
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Your Schedule</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Patient</th>

                                      </tr>
                                    </thead>
                                    <?php  
                           foreach ($appointments as $appointment) {
                                   # code...
                               $ID = $appointment['Clinic_ID'];
                               $Patientid =  $appointment['User_ID'];
                               if (!is_null($ID)) {
                                   # code...
                               $stmt2 = $con->prepare("SELECT ClinicName FROM clinics WHERE ClinicID = $ID ");
                               $stmt2->execute(array($ID));
                               $ClinicName = $stmt2->fetch();
                               
                               
                               $stmt3 = $con->prepare("SELECT UserFullName FROM users WHERE UserID = $Patientid ");
                               $stmt3->execute(array($Patientid));
                               $UserName = $stmt3->fetch();
                           
                           
                           
                            ?>
                                    <tbody>
                                      <tr>
                                        <th scope="row">
                                            
                                            
                                            
                                        </th>
                                        <td><?php echo $ClinicName['ClinicName']; ?></td>
                                        <td><?php echo $appointment['AppointmentTime']; ?></td>
                                        <td><?php echo $appointment['AppointmentDate'];  ?></td>
                                        <td><?php echo $UserName['UserFullName']; ?></td>
                                      </tr>

                                    </tbody>
                                    <?php }} ?>
                                    <?php  
                           foreach ($appointments as $appointment) {
                                   # code...
                               $ID = $appointment['Lab_ID'];
                               $Patientid =  $appointment['User_ID'];
                               if (!is_null($ID)) {
                                   # code...
                               $stmt2 = $con->prepare("SELECT LabName FROM labs WHERE LabID = $ID ");
                               $stmt2->execute(array($ID));
                               $LabName = $stmt2->fetch();
                               
                               
                               $stmt3 = $con->prepare("SELECT UserFullName FROM users WHERE UserID = $Patientid ");
                               $stmt3->execute(array($Patientid));
                               $UserName = $stmt3->fetch();
                           
                           
                           
                            ?>
                                    <tbody>
                                      <tr>
                                        <th scope="row">
                                            
                                            
                                            </th>
                                        <td><?php echo $LabName['LabName']; ?></td>
                                        <td><?php echo $appointment['AppointmentTime']; ?></td>
                                        <td><?php echo $appointment['AppointmentDate'];  ?></td>
                                        <td><?php echo $UserName['UserFullName']; ?></td>
                                      </tr>
                                      </tbody>
                                      <?php }} ?>
                                      <?php  
                           foreach ($appointments as $appointment) {
                                   # code...
                               $ID = $appointment['Hospital_ID'];
                               $Section = $ID;
                               $Patientid =  $appointment['User_ID'];
                               if (!is_null($ID)) {
                                   # code...
                               $stmt2 = $con->prepare("SELECT HospitalName FROM hospitals WHERE HospitalID = $ID ");
                               $stmt2->execute(array($ID));
                               $HospitalName = $stmt2->fetch();

                               $stmt4 = $con->prepare("SELECT HSectionName FROM hospital_sec WHERE Hospital_ID = $ID ");
                               $stmt4->execute(array($Section));
                               $secName = $stmt4->fetch();
                               
                               
                               $stmt3 = $con->prepare("SELECT UserFullName FROM users WHERE UserID = $Patientid ");
                               $stmt3->execute(array($Patientid));
                               $UserName = $stmt3->fetch();
                           
                           
                           
                            ?>
                                      <tbody>
                                      <tr>

                                        <th scope="row">
                                           
                                            </th>
                                        <td><?php echo $secName['HSectionName']; ?></td>
                                        <td><?php echo $appointment['AppointmentTime']; ?></td>
                                        <td><?php echo $appointment['AppointmentDate'];  ?></td>
                                        <td><?php echo $UserName['UserFullName']; ?></td>
                                      </tr>
                                      
                                    </tbody>
                                    <?php }} ?>
                                  </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <?php }else{
      header('location:error.php');
      } ?>

    <?php include('includes/footer.php') ?>