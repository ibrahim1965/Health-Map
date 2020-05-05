<?php 
      
    

      if (isset($_SESSION['USER'])) {
        //header('Location: index.php');
        # code...
      }
      require_once('includes/head_section.php');
      include 'includes/DBconnect.php';



      if ($_SERVER['REQUEST_METHOD'] =='POST') {
        
        $Useremail     = $_POST['email'];
        $userpassword  = $_POST['pass'];
        $hashedpassword= sha1($userpassword);

        $stmt = $con->prepare("SELECT UserID, UserEmail, UserPassword FROM users WHERE UserEmail = ? AND UserPassword = ? AND GroupID = 1 ");
        $stmt->execute(array($Useremail, $hashedpassword,));
        $row = $stmt->fetch(); 
        $count = $stmt->rowCount();
        //echo $count;

        if ($count > 0) {
          # code...
          $_SESSION['USER'] = $Useremail;
          $_SESSION['ID']   = $row['UserID'];
          
          
          header('Location: regions.php');

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
<input class="form-control" type="email" name="email"  data-required>
</div>
              
<div class="form-group">
<label class="label ">Password</label>
<input class="form-control" type="password" name="pass">
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

<!--FOOTER-->

<?php include('includes/footer.php') ?>