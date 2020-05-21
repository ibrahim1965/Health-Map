<?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>
<?php 
    $Userid = $_SESSION['ID'];
    if ( isset($_SESSION['ID']) ) {
    $stmt = $con->prepare("SELECT * FROM users WHERE UserID = ?");

    $stmt->execute(array($Userid));
    $profile = $stmt->fetch();
    //var_dump("expression");
    //print_r($profile);





?>

    

    <title>Health Map | Profile</title>


 </head>
    <body>

<!--Navbar-->
        <?php include('includes/navbar.php') ?>
<!-- navbar ending -->

<!--CONTENT-->

        <div class="e-region-intro mb-5">
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
                                <h2><span>H</span>ELLO <?php echo($profile['UserFullName']) ?>,</h2>
                                <P>We're always here for your help and your comfort, just feel free to ask anything..</P>
                                <div class="e-profile-ul">
                                    <ul>
                                        <li>
                                            Name : <span><?php echo($profile['UserFullName']) ?></span>
                                        </li>
                                        
                                        <li>
                                            E-mail : <span><?php echo($profile['UserEmail']) ?></span>
                                        </li>
                                        <li>
                                            Phone Number : <span><?php echo($profile['UserPhoneNumber']) ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <!--loop end for user's profile-->
                                <?php 
                                    $Userid = $_SESSION['ID'];
                                    $stmt = $con->prepare("SELECT * FROM appointments WHERE  User_ID = $Userid");
                                    $stmt->execute();
                                    $appointments    = $stmt->fetchAll();



                                ?>

                                <!--LOOP START for user's schedule-->

                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Your Schedule</th>
                                        <th scope="col">Depatment</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Date</th>
                                      </tr>
                                    </thead>
                                    
                                    <?php
                                        foreach ($appointments as $appointment) {
                                            # code...
                                        $ID = $appointment['Section_ID'];
                                        //echo $ID;
                                        if (!is_null($ID)) {
                                            # code...
                                            $stmt1 = $con->prepare("SELECT HSectionName FROM hospital_sec WHERE HSectionID = $ID ");
                                        $stmt1->execute(array($ID));
                                        $sectionName = $stmt1->fetch();
                                        

                                        




                                     ?>
                                    <tbody>

                                      <tr>
                                        <th scope="row">

                                            <?php echo "<a href='page.php?do=EHospital&sectionid=".$appointment['Section_ID']."&appid=".$appointment['Appointment_ID']."' class='btn btn-outline-primary e-btn-mine mb-1'>Edit</a>";?>

                                            <?php echo "<a href='page.php?do=DeleteHospital&sectionid=".$appointment['Section_ID']."' class='btn btn-outline-danger mr-3'>Delete</a>";?>
                                            
                                        </th>
                                        <td><?php echo $sectionName['HSectionName']; ?></td>
                                        <td><?php echo $appointment['AppointmentTime']; ?></td>
                                        <td><?php echo $appointment['AppointmentDate']; ?></td>
                                      </tr>
                                      
                                        
                                      
                                    </tbody>
                                    <?php } ?>
                                <?php } 
                                    foreach ($appointments as $appointment) {
                                            # code...
                                        $ID = $appointment['Clinic_ID'];
                                        if (!is_null($ID)) {
                                            # code...
                                            $stmt2 = $con->prepare("SELECT ClinicName FROM clinics WHERE ClinicID = $ID ");
                                        $stmt2->execute(array($ID));
                                        $ClinicName = $stmt2->fetch();
                                        
                                        




                                     ?>
                                    <tbody>

                                      <tr>
                                      
                                        <th scope="row">
                                            
                                            <?php echo "<a href='page.php?do=EClinic&appid=".$appointment['Appointment_ID']."' class='btn btn-outline-primary e-btn-mine mb-1'>Edit</a>";?>

                                            <?php echo "<a href='page.php?do=DeleteClinic&clinicid=".$appointment['Clinic_ID']."' class='btn btn-outline-danger mr-3'>Delete</a>";?>
                                            
                                        </th>
                                        <td><?php echo $ClinicName ['ClinicName']; ?></td>
                                        <td><?php echo $appointment['AppointmentTime']; ?></td>
                                        <td><?php echo $appointment['AppointmentDate']; ?></td>
                                      </tr>
                                      
                                    </tbody>
                                    <?php } ?>
                                <?php } 
                                foreach ($appointments as $appointment) {
                                            # code...
                                        $ID = $appointment['Lab_ID'];
                                        if (!is_null($ID)) {
                                            # code...
                                            $stmt3 = $con->prepare("SELECT LabName FROM labs WHERE LabID = $ID ");
                                        $stmt3->execute(array($ID));
                                        $LabName = $stmt3->fetch();
                                        
                                        




                                     ?>
                                    <tbody>

                                      <tr>
                                        <th scope="row">
                                            <?php echo "<a href='page.php?do=ELab&appid=".$appointment['Appointment_ID']."' class='btn btn-outline-primary e-btn-mine mb-1'>Edit</a>";?>

                                            <?php echo "<a href='page.php?do=DeleteLab&labid=".$appointment['Lab_ID']."' class='btn btn-outline-danger mr-3'>Delete</a>";?>
                                            
                                        </th>
                                        <td><?php echo $LabName['LabName']; ?></td>
                                        <td><?php echo $appointment['AppointmentTime']; ?></td>
                                        <td><?php echo $appointment['AppointmentDate']; ?></td>
                                      </tr>
                                      
                                        
                                      
                                    </tbody>
                                    <?php } ?>
                                <?php } 
                                  ?>



                                  </table>
                                  <!--LOOP END for user's schedule-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }else{
      header('location:error.php');
    } ?>

        <!--starting footer-->

<?php include('includes/footer.php') ?>