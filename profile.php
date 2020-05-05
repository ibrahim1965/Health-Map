<?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>
<?php 
    $Userid = $_SESSION['ID'];
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
                                <h2><span>H</span>ELLO AHMED,</h2>
                                <P>We're always here for your help and your comfort, just feel free to ask anything..</P>
                                <div class="e-profile-ul">
                                    <ul>
                                        <li>
                                            Name :<span><?php echo($profile['UserFullName']) ?></span>
                                        </li>
                                        
                                        <li>
                                            E-mail :<span><?php echo($profile['UserEmail']) ?></span>
                                        </li>
                                        <li>
                                            Phone Number :<span><?php echo($profile['UserPhoneNumber']) ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <!--loop end for user's profile-->

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
                                    <tbody>
                                      <tr>
                                        <th scope="row">
                                            <a href="appointment.html" class="btn btn-outline-primary e-btn-mine mb-1">Edit</a>
                                            <a href="#" class="btn btn-outline-danger mr-3">Delete</a>
                                            1
                                        </th>
                                        <td>Diabetes</td>
                                        <td>4:00 PM</td>
                                        <td>14 May 2020</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">
                                            <a href="appointment.html" class="btn btn-outline-primary e-btn-mine mb-1">Edit</a>
                                            <a href="#" class="btn btn-outline-danger mr-3">Delete</a>
                                            2</th>
                                        <td>Pathology</td>
                                        <td>11:00 AM</td>
                                        <td>25 June 2020</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">
                                            <a href="appointment.html" class="btn btn-outline-primary e-btn-mine mb-1">Edit</a>
                                            <a href="#" class="btn btn-outline-danger mr-3">Delete</a>
                                            3</th>
                                        <td>Surgery</td>
                                        <td>9:00 AM</td>
                                        <td>1 July 2020</td>
                                      </tr>
                                      
                                    </tbody>
                                  </table>
                                  <!--LOOP END for user's schedule-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--starting footer-->

<?php include('includes/footer.php') ?>