<?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>
<title>Health Map | Register</title>
</head>
<?php 
   if ($_SERVER['REQUEST_METHOD'] =='POST') {
   
   
   	$UserFullName 		= $_POST['name'];
   	$UserEmail 			= $_POST['email'];
   	$UserPhoneNumber 	= $_POST['phone'];
   	$UserPassword 		= $_POST['password'];
   	$confirmPassword	= $_POST['confirmPass'];
   
   	$hashedpassword= sha1($UserPassword);
   	$con_hashedpassword= sha1($confirmPassword);
   
   	if (empty($UserFullName)|| empty($UserEmail)||empty($UserPhoneNumber)||empty($UserPassword)||empty($confirmPassword)) {
   		?>
   		<div class="alert alert-danger" role="alert">
    			Fill in the form
  		</div>
  		<?php
   	}else{
   		if($hashedpassword != $con_hashedpassword){
   
   		echo "Wrong Confirm password";
   
   
   	}else{
   
   			$stmt = $con->prepare("INSERT INTO users(UserFullName, UserEmail, UserPhoneNumber, UserPassword) VALUES (:zname, :zemail, :zLphone, :zpass)");
    			$stmt->execute(array(
    				':zname' 	=> $UserFullName,
    				':zemail' 	=> $UserEmail,
    				':zLphone' 	=> $UserPhoneNumber,
    				':zpass'  	=> $hashedpassword
           		           
    					 
   
   
   
    			));
    			header('location:login.php');
   
   		}
   	}
   
   		
   	}
   
   
   
   
   
   
   
   
   
   ?>
<body>
   <!--Navbar-->
   <?php include('includes/navbar.php') ?>
   <!-- navbar ending -->
   	<?php if (!isset($_SESSION['ID'])) {
   		
   	 ?>
   <!--CONTENT-->
   <div class="o-home">
      <div class="o-layer">
         <div class="container o-container mt-5">
            <div class=" col-lg-8 col-md-12 col-sm-12 offset-md-2 col-md-offset-2 ">
               <div class="o-title text-white">
                  <h2 >Be one of us, </h2>
                  <h4>Let's work together.</h4>
               </div>
               <div class="row">
                  <div class="container-fluid">
                     <form id="contact-form" class="o-contact-form" method="POST" >
                        <div class="form-group ">
                           <label class="label">Your Name</label>
                           <input class="form-control" type="text" name="name" required>
                        </div>
                        <div class="form-group">
                           <label class="label ">Your Email</label>
                           <input class="form-control" type="email" name="email" required>
                        </div>
                        <div class="form-group">
                           <label class="label ">Phone Number</label>
                           <input class="form-control" type="number" name="phone" required>
                        </div>
                        <div class="form-group">
                           <label class="label ">Password</label>
                           <input class="form-control" type="password" name="password" required>
                        </div>
                        <div class="form-group">
                           <label class="label ">Confirm password</label>
                           <input class="form-control" type="password" name="confirmPass" required>
                        </div>
                        <div class="form-group">
                           <input class="btn btn-outline-primary  btn-lg o-btn" type="submit" value="Register">
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
          Logout First
      	</div>
   <?php
   		}
   ?>
   <!--starting footer-->
   <?php include('includes/footer.php') ?>