<?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>

<!--Navbar-->
    <?php include('includes/navbar.php')
     ?>

<!-- navbar ending -->
<?php
	$hospital_ID = $_GET['hospitalid'];
	$Region_ID = $_GET['regid'];

	$stmt = $con->prepare("SELECT * FROM hospital_sec WHERE  Hospital_ID = $hospital_ID");
            $stmt->execute();
            $sections    = $stmt->fetchAll();

	//ob_start();

            $stmt2 = $con->prepare("SELECT * FROM hospitals WHERE  HospitalID = $hospital_ID");
            $stmt2->execute();
            $hospitals    = $stmt2->fetchAll();
            //print_r(expression)

	

	$pagetitle = '';


	if ( isset($_SESSION['ID']) AND ($_SESSION['GroupID']== 1)) {

	 	$do = isset($_GET['do']) ? $_GET['do'] : 'Manage' ;

	 	if ($do == 'Manage') {
	 		# code...
	 		

	 		?>

<div class="o-home3">
    <div class="o-layer3">
        <div id="o-about">
            <div class="container"> 
                <?php foreach ($hospitals as $hospital) {
                    ?> 
                <div class="title d-flex justify-content-center align-items-center">
                    <h1 class="o-hos-name mt-5 pt-5 text-white text-uppercase font-weight-bolder"><?php echo $hospital['HospitalName']; ?></h1>

                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-left align-items-center d-flex o-desc"> 
                        <div class="e-h2-styling">  <!--starting title div-->
                            <h1 class="font-weight-bolder pt-2">Welcome, </h1>
<h2 >Address:    <small class="o-address-o text-center"><?php echo $hospital['HospitalAddress']; ?></small></h2>  <!--Hospital address-->
<h2 >Phone:    <small class="o-address-o text-center"><?php echo $hospital['HospitalPhone']; ?></small></h2>  <!--Hospital phone no-->
<h2 >Working Hours:    <small class="o-address-o text-center"><?php echo $hospital['HospitalWorkingHour']; ?></small></h2> <!--Hospital working hours-->
    <?php } ?>
<?php echo "<a href='?do=Add&hospitalid=". $hospital_ID ."&regid=". $Region_ID. "' class='btn btn-outline-primary my-2 btn-lg e-btn-spec' method='POST'>Add Section</a>";?>
                    </div> <!--button for adding more sections that will href to addsec.html-->
                        </div>  <!--ending title div-->

                    </div>
                </div>
            </div>
            <!--cards-->
            <div class="row row-cols-1 row-cols-md-2">
                <!--beg of section card-->
                <?php foreach ($sections as $section) {

                        ?>
                <div class="col mb-4 col-xl-6 col-md-12 col-sm-12">
                    <div class="card o-card-wi"> 

                        <?php 
                        if(empty($section['Section_image'])){?>
                        	<img src="static/images/dental.jpg" class="card-img-top" alt=""><?php
                        }else{
                        echo "<img src='data/images/".$section['Section_image']."' class='card-img-top' alt='' '>";}?> <!--section image-->
                        <div class="card-body">
                            <h1 class="card-title text-center py-2 o-font"><?php echo $section['HSectionName']; ?></h1> <!--section name-->
<h3 class="card-text text-center">Join us now.</h3>
<div class="o-foote">  
    <!-- Button trigger modal "button reponsible for poping up to book"  -->
<?php echo "<form action='page.php?do=ManageHospital&sectionid=".$section['HSectionID']."&hospitalid=". $hospital_ID ."&regid=". $Region_ID. "' method='POST'>";?>
<button   class="btn btn-outline-primary btn-lg e-book-btn">
    BOOK
    </button>
	</form>
    <!-- Modal -->
    
        
         <!--</div>-->


</div>

                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
  </div>



	 		<?php


	 	}elseif ($do == 'Add') {?>

	 		<div class="o-home9">


    
    


<div class="o-layer9">

     
<div class="container o-container">
<div class="o-section">
<div class=" col-lg-8 col-md-8 col-sm-8 offset-md-2 col-md-offset-2 ">
<div class="o-title2 pb-3">
<h2 >Add more sections!</h2>
           
</div>
<div class="row">
<div class="container-fluid o-loginn ">




<?php echo "<form id='contact-form' class='o-contact-form' action='?do=Insert&hospitalid=". $hospital_ID ."&regid=". $Region_ID. "' method='POST' enctype='multipart/form-data' >";?>
              
<div class="form-group text-left" >
<label class="label font-weight-bold">Section name:</label>
<input class="form-control" type="text" name="section-name" data-required>
</div>
              
<div class="form-group text-left pb-5">
<label class="label font-weight-bold">Image:</label> <br>
<input  type="file" name="section-image">
</div>
              
<div class="form-group e-add-sec-hos-btn ">
  <button class="btn btn-outline-primary mb-3 btn-lg o-btn" id="submit">Add Section</button>
</div>
</form>
</div>
</div>
</div>


</div>
 
</div>
</div>




</div>






	 		<?php
	 		//header('Location: ' . $_SERVER['HTTP_REFERER']);
	 	}

	 	elseif ($do == 'Insert') {
	 		echo "Insert";
	 		$HosID = $_GET['hospitalid'];


	 		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	 			# code...
	 			$section_image = $_FILES['section-image'];


	 			$imageName=  $_FILES['section-image']['name'];

	 			$imageSize= $_FILES['section-image']['size'];

	 			$imageTmp= $_FILES['section-image']['tmp_name'];

	 			$imageType= $_FILES['section-image']['type'];

	 			$avatar_allow_extension= array("jpeg","jpg","png","gif");
	 			$avatar_extension = strtolower(end(explode('.', $imageName)));
	 			$Section_Image = '';


	 			if (in_array($avatar_extension, $avatar_allow_extension) AND !empty($imageName)) {
	 				# code...
	 				$Section_Image = rand(0, 10000). '_' . $imageName;
	 				move_uploaded_file($imageTmp, "data\images\\". $Section_Image);

	 			}
	 			
	 			
	 			




	 			$Section_Name = $_POST['section-name'];
	 			//$checkSectionName = checkItem("HSectionName", "hospital_sec", $Section_Name);
                
                
                    $stmt = $con->prepare("INSERT INTO hospital_sec(HSectionName, Hospital_ID, Section_image) VALUES (:zaddSection, :zhospital_id, :zsecimage )");
                    $stmt->execute(array(
                        'zaddSection' => $Section_Name,
                        'zhospital_id'=> $HosID,
                        ':zsecimage'=>$Section_Image
                    ));

                     
                }
                $back = $hospital_ID.'&regid='.$Region_ID;
            header('Location:?do=Manage&hospitalid='.$back );
            }

            //header("location:?do=Manage&hospitalid='$hospital_ID'&regid='$Region_ID'");
            


	 		
	 	

	 	

	 	
	 }

	 elseif (isset($_SESSION['ID']) AND ($_SESSION['GroupID']== 0)) {
	 	# code...
	 	?>
	 	<div class="o-home3">
    <div class="o-layer3">
        <div id="o-about">
            <div class="container"> 
                <?php foreach ($hospitals as $hospital) {
                    ?> 
                <div class="title d-flex justify-content-center align-items-center">
                    <h1 class="o-hos-name mt-5 pt-5 text-white text-uppercase font-weight-bolder"><?php echo $hospital['HospitalName']; ?></h1>

                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-left align-items-center d-flex o-desc"> 
                        <div class="e-h2-styling">  <!--starting title div-->
                            <h1 class="font-weight-bolder pt-2">Welcome, </h1>
<h2 >Address:    <small class="o-address-o text-center"><?php echo $hospital['HospitalAddress']; ?></small></h2>  <!--Hospital address-->
<h2 >Phone:    <small class="o-address-o text-center"><?php echo $hospital['HospitalPhone']; ?></small></h2>  <!--Hospital phone no-->
<h2 >Working Hours:    <small class="o-address-o text-center"><?php echo $hospital['HospitalWorkingHour']; ?></small></h2> <!--Hospital working hours-->
    <?php } ?>

                    </div> <!--button for adding more sections that will href to addsec.html-->
                        </div>  <!--ending title div-->

                    </div>
                </div>
            </div>
            <!--cards-->
            <div class="row row-cols-1 row-cols-md-2">
                <!--beg of section card-->
                <?php foreach ($sections as $section) {

                        ?>
                <div class="col mb-4 col-xl-6 col-md-12 col-sm-12">
                    <div class="card o-card-wi"> 
                        <img src="static/images/dental.jpg" class="card-img-top" alt="..."> <!--section image-->
                        <div class="card-body">
                            <h1 class="card-title text-center py-2 o-font"><?php echo $section['HSectionName']; ?></h1> <!--section name-->
<h3 class="card-text text-center">Join us now.</h3>
<div class="o-foote">  
    <!-- Button trigger modal "button reponsible for poping up to book"  -->
<?php echo "<form action='page.php?do=ManageHospital&sectionid=".$section['HSectionID']."&hospitalid=". $hospital_ID ."&regid=". $Region_ID. "' method='POST'>";?>
<button   class="btn btn-outline-primary btn-lg e-book-btn">
    BOOK
    </button>
	</form>
    <!-- Modal -->
    
        
         <!--</div>-->


</div>

                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
  </div>

	<?php }else{
      header('location:error.php');
    }
?>
<!--starting footer-->

<?php include('includes/footer.php') ?>