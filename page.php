<?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>

<?php $do = isset($_GET['do']) ? $_GET['do']: ''; ?>
<!--Navbar-->
    <?php include('includes/navbar.php') ?>
<!-- navbar ending -->

<?php if (isset($_SESSION['ID'])) { 
     //$do = isset($_GET['do']) ? $_GET['do'] : '' ;

        
        if ($do == 'ManageHospital') { 
            $Region_ID = $_GET['regid'];
            echo "Hospitals";
        $hospital_ID = $_GET['hospitalid'];
        //$Region_ID = $_GET['regid'];
        $section = $_GET['sectionid'];
        ?>

<div class="e-region-intro mb-5">
        <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="e-region-introlayer">
                    <h2 class="w-50 m-auto text-center font-weight-bold">APPOINTEMENT</h2>
                </div>
            </div>
        </div>
        </div>
        </div>

        <div class="e-app-form">
            <div class="e-app-form-layer">
            <div class="container">
               
                <div class="row">
                   
                    <div class="col-md-7 col-sm-12 ml-auto">
                        <div class=" bg-light my-5 p-5">
                            <?php echo "<form  class='text-center'action='page.php?do=EditHospital&sectionid=".$section."&hospitalid=". $hospital_ID ."&regid=". $Region_ID. "' method='POST'>";?>
                            
                            
                                <div class="form-group text-left ">
                
                                
                                  <label for="exampleFormControlInput4">DATE</label>
                                  <input type="date" name="HospitalDate" class="form-control" id="exampleFormControlInput4" placeholder="Choose your date">
                                  <label for="exampleFormControlInput5">TIME</label>
                                  <input type="time" name="HospitalTime" class="form-control" id="exampleFormControlInput5" placeholder="Select  your appointement">
                                </div>
                                
                                
                                <div class="form-group text-left">
                                  <label for="exampleFormControlTextarea1">LEAVE YOUR COMMENT</label>
                                  <textarea class="form-control" name="HospitalComment" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                

                                <button class="btn btn-outline-primary e-btn-mine mx-2" >SAVE CHANGES</button>

                                <a href="regions.php" class="btn btn-outline-primary e-btn-mine">BACK TO HOME </a>

                                
                              </form>
                        </div>
                    </div>
                  </div>
                
            </div>

            </div>
        </div>

 <?php }
 elseif ($do =='ManageClinics') {
    
    ?>
            <?php  
        $Clinic_ID = $_GET['clinicid'];
        $Region_ID = $_GET['regid'];
        
        ?>

<div class="e-region-intro mb-5">
        <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="e-region-introlayer">
                    <h2 class="w-50 m-auto text-center font-weight-bold">APPOINTEMENT</h2>
                </div>
            </div>
        </div>
        </div>
        </div>

        <div class="e-app-form">
            <div class="e-app-form-layer">
            <div class="container">
               
                <div class="row">
                   
                    <div class="col-md-7 col-sm-12 ml-auto">
                        <div class=" bg-light my-5 p-5">
                            <?php echo "<form  class='text-center'action='page.php?do=EditClinic&clinicid=".$Clinic_ID. "&regid=". $Region_ID. "' method='POST'>";?>
                            
                            
                                <div class="form-group text-left ">
                
                                
                                  <label for="exampleFormControlInput4">DATE</label>
                                  <input type="date" name="ClinicDate" class="form-control" id="exampleFormControlInput4" placeholder="Choose your date">
                                  <label for="exampleFormControlInput5">TIME</label>
                                  <input type="time" name="ClinicTime" class="form-control" id="exampleFormControlInput5" placeholder="Select  your appointement">
                                </div>
                                
                                
                                <div class="form-group text-left">
                                  <label for="exampleFormControlTextarea1">LEAVE YOUR COMMENT</label>
                                  <textarea class="form-control" name="ClinicComment" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <button class="btn btn-outline-primary e-btn-mine mx-2" >SAVE CHANGES</button>

                                <a href="regions.php" class="btn btn-outline-primary e-btn-mine">BACK TO HOME </a>
                              </form>
                        </div>
                    </div>
                  </div>
                
            </div>

            </div>
        </div>

 <?php 

 }elseif ($do =='ManageLabs') {
    
    ?>
            <?php  
        $Lab_ID = $_GET['labid'];
        $Region_ID = $_GET['regid'];
        
        ?>

<div class="e-region-intro mb-5">
        <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="e-region-introlayer">
                    <h2 class="w-50 m-auto text-center font-weight-bold">APPOINTEMENT</h2>
                </div>
            </div>
        </div>
        </div>
        </div>

        <div class="e-app-form">
            <div class="e-app-form-layer">
            <div class="container">
               
                <div class="row">
                   
                    <div class="col-md-7 col-sm-12 ml-auto">
                        <div class=" bg-light my-5 p-5">
                            <?php echo "<form  class='text-center'action='page.php?do=EditLab&labid=".$Lab_ID. "&regid=". $Region_ID. "' method='POST'>";?>
                            
                            
                                <div class="form-group text-left ">
                
                                
                                  <label for="exampleFormControlInput4">DATE</label>
                                  <input type="date" name="LabDate" class="form-control" id="exampleFormControlInput4" placeholder="Choose your date">
                                  <label for="exampleFormControlInput5">TIME</label>
                                  <input type="time" name="LabTime" class="form-control" id="exampleFormControlInput5" placeholder="Select  your appointement">
                                </div>
                                
                                
                                <div class="form-group text-left">
                                  <label for="exampleFormControlTextarea1">LEAVE YOUR COMMENT</label>
                                  <textarea class="form-control" name="LabComment" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <button class="btn btn-outline-primary e-btn-mine mx-2" >SAVE CHANGES</button>

                                <a href="regions.php" class="btn btn-outline-primary e-btn-mine">BACK TO HOME </a>
                              </form>
                        </div>
                    </div>
                  </div>
                
            </div>

            </div>
        </div>

 <?php 
 }




 elseif ($do == 'EditHospital') {
            
            $hospital_ID = $_GET['hospitalid'];
            $Section_ID =   $_GET['sectionid'];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $AppointmentDate    = $_POST['HospitalDate'];
                $AppointmentTime    = $_POST['HospitalTime'];
                $AppointmentComment = $_POST['HospitalComment'];
                $User_ID            = $_SESSION['ID'];

                $stmt = $con->prepare("INSERT INTO appointments(AppointmentDate , AppointmentTime, AppointmentComment, Section_ID, User_ID) VALUES (:zAdate, :zAtime, :zAcomment, :zAsecid, :zAuserid)");
            $stmt->execute(array(
                ':zAdate'           => $AppointmentDate,
                ':zAtime'           => $AppointmentTime,
                ':zAcomment'        => $AppointmentComment,
                ':zAsecid'          => $Section_ID,
                ':zAuserid'         => $User_ID
                


            ));

                    header('location:profile.php');
        }   


                //echo $AppointmentDate . ' ' .$AppointmentTime. ' '.$AppointmentComment ;
        }elseif ($do == 'EditClinic') {
            
            $Clinic_ID = $_GET['clinicid'];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $AppointmentDate    = $_POST['ClinicDate'];
                $AppointmentTime    = $_POST['ClinicTime'];
                $AppointmentComment = $_POST['ClinicComment'];
                $User_ID            = $_SESSION['ID'];

                $stmt = $con->prepare("INSERT INTO appointments(AppointmentDate , AppointmentTime, AppointmentComment, Clinic_ID, User_ID) VALUES (:zAdate, :zAtime, :zAcomment, :zAclinicid, :zAuserid)");
            $stmt->execute(array(
                ':zAdate'              => $AppointmentDate,
                ':zAtime'              => $AppointmentTime,
                ':zAcomment'           => $AppointmentComment,
                ':zAclinicid'          => $Clinic_ID,
                ':zAuserid'            => $User_ID
                


            ));

                    header('location:profile.php');
        }   


                //echo $AppointmentDate . ' ' .$AppointmentTime. ' '.$AppointmentComment ;
        }elseif ($do == 'EditLab') {
            
            $Lab_ID = $_GET['labid'];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $AppointmentDate    = $_POST['LabDate'];
                $AppointmentTime    = $_POST['LabTime'];
                $AppointmentComment = $_POST['LabComment'];
                $User_ID            = $_SESSION['ID'];

                $stmt = $con->prepare("INSERT INTO appointments(AppointmentDate , AppointmentTime, AppointmentComment, Lab_ID, User_ID) VALUES (:zAdate, :zAtime, :zAcomment, :zAlabid, :zAuserid)");
            $stmt->execute(array(
                ':zAdate'           => $AppointmentDate,
                ':zAtime'           => $AppointmentTime,
                ':zAcomment'        => $AppointmentComment,
                ':zAlabid'          => $Lab_ID,
                ':zAuserid'         => $User_ID
                


            ));

                    header('location:profile.php');
        }   


                
        }elseif ($do == 'EHospital') {
            # code...

        
        
        //$Region_ID = $_GET['regid'];
        $section = $_GET['sectionid'];
        ?>

<div class="e-region-intro mb-5">
        <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="e-region-introlayer">
                    <h2 class="w-50 m-auto text-center font-weight-bold">EDIT APPOINTEMENT</h2>
                </div>
            </div>
        </div>
        </div>
        </div>

        <div class="e-app-form">
            <div class="e-app-form-layer">
            <div class="container">
               
                <div class="row">
                   
                    <div class="col-md-7 col-sm-12 ml-auto">
                        <div class=" bg-light my-5 p-5">
                            <?php echo "<form  class='text-center'action='page.php?do=UpdateAppointment&appid=".$_GET['appid']."' method='POST'>";?>
                            
                            
                                <div class="form-group text-left ">
                
                                
                                  <label for="exampleFormControlInput4">DATE</label>
                                  <input type="date" name="Date" class="form-control" id="exampleFormControlInput4" placeholder="Choose your date">
                                  <label for="exampleFormControlInput5">TIME</label>
                                  <input type="time" name="Time" class="form-control" id="exampleFormControlInput5" placeholder="Select  your appointement">
                                </div>
                                
                                
                                <div class="form-group text-left">
                                  <label for="exampleFormControlTextarea1">LEAVE YOUR COMMENT</label>
                                  <textarea class="form-control" name="Comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <button class="btn btn-outline-primary e-btn-mine mx-2" >SAVE CHANGES</button>

                                <a href="profile.php" class="btn btn-outline-primary e-btn-mine">BACK TO HOME </a>
                              </form>
                        </div>
                    </div>
                  </div>
                
            </div>

            </div>
        </div>

        <?php 
        }elseif ($do == 'EClinic') {
            # code...
            ?>
            <div class="e-region-intro mb-5">
        <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="e-region-introlayer">
                    <h2 class="w-50 m-auto text-center font-weight-bold">APPOINTEMENT</h2>
                </div>
            </div>
        </div>
        </div>
        </div>

        <div class="e-app-form">
            <div class="e-app-form-layer">
            <div class="container">
               
                <div class="row">
                   
                    <div class="col-md-7 col-sm-12 ml-auto">
                        <div class=" bg-light my-5 p-5">
                            <?php echo "<form  class='text-center'action='page.php?do=UpdateAppointment&appid=".$_GET['appid']."' method='POST'>";?>
                            
                            
                                <div class="form-group text-left ">
                
                                
                                  <label for="exampleFormControlInput4">DATE</label>
                                  <input type="date" name="Date" class="form-control" id="exampleFormControlInput4" placeholder="Choose your date">
                                  <label for="exampleFormControlInput5">TIME</label>
                                  <input type="time" name="Time" class="form-control" id="exampleFormControlInput5" placeholder="Select  your appointement">
                                </div>
                                
                                
                                <div class="form-group text-left">
                                  <label for="exampleFormControlTextarea1">LEAVE YOUR COMMENT</label>
                                  <textarea class="form-control" name="Comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <button class="btn btn-outline-primary e-btn-mine mx-2" >SAVE CHANGES</button>

                                <a href="profile.php" class="btn btn-outline-primary e-btn-mine">BACK TO HOME </a>
                              </form>
                        </div>
                    </div>
                  </div>
                
            </div>

            </div>
        </div>

            <?php

        }elseif ($do == 'ELab') {
            # code...

            ?>


            <div class="e-region-intro mb-5">
        <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="e-region-introlayer">
                    <h2 class="w-50 m-auto text-center font-weight-bold">APPOINTEMENT</h2>
                </div>
            </div>
        </div>
        </div>
        </div>

        <div class="e-app-form">
            <div class="e-app-form-layer">
            <div class="container">
               
                <div class="row">
                   
                    <div class="col-md-7 col-sm-12 ml-auto">
                        <div class=" bg-light my-5 p-5">
                            <?php echo "<form  class='text-center'action='page.php?do=UpdateAppointment&appid=".$_GET['appid']."' method='POST'>";?>
                            
                                <div class="form-group text-left ">
                
                                
                                  <label for="exampleFormControlInput4">DATE</label>
                                  <input type="date" name="Date" class="form-control" id="exampleFormControlInput4" placeholder="Choose your date">
                                  <label for="exampleFormControlInput5">TIME</label>
                                  <input type="time" name="Time" class="form-control" id="exampleFormControlInput5" placeholder="Select  your appointement">
                                </div>
                                
                                
                                <div class="form-group text-left">
                                  <label for="exampleFormControlTextarea1">LEAVE YOUR COMMENT</label>
                                  <textarea class="form-control" name="Comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <button class="btn btn-outline-primary e-btn-mine mx-2" >SAVE CHANGES</button>

                                <a href="profile.php" class="btn btn-outline-primary e-btn-mine">BACK TO HOME </a>
                              </form>
                        </div>
                    </div>
                  </div>
                
            </div>

            </div>
        </div>

            <?php

        }



        elseif ($do == 'UpdateAppointment') {
            # code...

            $AppointmentDate = $_POST['Date'];
            $AppointmentTime = $_POST['Time'];
            $AppointmentComment = $_POST['Comment'];
            $Appointment_ID = $_GET['appid'];


            $stmt= $con->prepare("UPDATE appointments SET AppointmentDate =?, AppointmentTime=?, AppointmentComment=? WHERE Appointment_ID=? ");

            $stmt->execute(array($AppointmentDate,$AppointmentTime, $AppointmentComment,$Appointment_ID));

            header('location:profile.php');
        }




        elseif ($do == 'DeleteHospital') {
            # code...
            
            //$Region_ID = $_GET['regid'];
             //$Region_ID = $HregionID;

            if(isset($_GET['sectionid']) && is_numeric($_GET['sectionid'])){
                $sectionid = intval($_GET['sectionid']);
            }
            $checksectionID = checkItem('Section_ID', 'appointments', $sectionid);
            
            if ($checksectionID > 0) {

                # code...
                $stmt = $con->prepare("DELETE FROM appointments WHERE Section_ID = :zid ");
                $stmt-> bindparam(":zid", $sectionid);
                $stmt->execute();
                //echo $Region_ID;

                header('location:profile.php');
            }


        }elseif ($do == 'DeleteClinic') {
            # code...
            
            //$Region_ID = $_GET['regid'];
             //$Region_ID = $HregionID;

            if(isset($_GET['clinicid']) && is_numeric($_GET['clinicid'])){
                $clinicid = intval($_GET['clinicid']);
            }
            $checkclinicID = checkItem('Clinic_ID', 'appointments', $clinicid);
            
            if ($checkclinicID > 0) {

                # code...
                $stmt = $con->prepare("DELETE FROM appointments WHERE Clinic_ID = :zid ");
                $stmt-> bindparam(":zid", $clinicid);
                $stmt->execute();
                //echo $Region_ID;

                header('location:profile.php');
            }

        }elseif ($do == 'DeleteLab') {
            # code...
            
            //$Region_ID = $_GET['regid'];
             //$Region_ID = $HregionID;

            if(isset($_GET['labid']) && is_numeric($_GET['labid'])){
                $labid = intval($_GET['labid']);
            }
            $checklabID = checkItem('Lab_ID', 'appointments', $labid);
            
            if ($checklabID > 0) {

                # code...
                $stmt = $con->prepare("DELETE FROM appointments WHERE Lab_ID = :zid ");
                $stmt-> bindparam(":zid", $labid);
                $stmt->execute();
                //echo $Region_ID;

                header('location:profile.php');
            }

        }
} else{
      header('location:error.php');
    }        
?>

 <!--starting footer-->

<?php include('includes/footer.php') ?>