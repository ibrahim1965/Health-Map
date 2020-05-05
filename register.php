<?php require_once('includes/DBconnect.php') ?>
<?php require_once('includes/head_section.php') ?>

    <title>Health Map | Home Page</title>


</head>
<body>
<!--Navbar-->
    <?php include('includes/navbar.php') ?>

<!-- navbar ending -->

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
<form id="contact-form" class="o-contact-form" >
<div class="form-group ">
<label class="label">Your Name</label>
<input class="form-control" type="text" name="name" data-required>
</div>
<div class="form-group">
<label class="label ">Your Email</label>
<input class="form-control" type="email" name="email" data-required>
</div>
<div class="form-group">
<label class="label ">Phone Number</label>
<input class="form-control" type="number" name="phone">
</div>
<div class="form-group">
<label class="label ">Password</label>
<input class="form-control" type="password" name="password">
</div>
<div class="form-group">
<label class="label ">Confirm password</label>
<input class="form-control" type="password" name="confirmPass">
</div>
<div class="form-group">
  <a href="regions.html" class="btn btn-outline-primary  btn-lg o-btn" id="submit">Register</a>
</div>
</form>
</div>
</div>
</div>

 
</div>



 

</div>
</div>



<!--starting footer-->

<?php include('includes/footer.php') ?>