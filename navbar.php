<!--Navbar-->
<?php require_once('includes/DBconnect.php') ?>
<nav class="navbar navbar-expand-lg navbar-light ">
   <a class="navbar-brand" href="index.php"><img id="logo" src="static/images/Capture.PNG"/></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
         <li class="nav-item ">
            <a class="nav-link" href="index.php"> Home</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="AboutUs.php">About</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="MC_login.php">Medical centers</a>
         </li>
         <?php 
            if (isset($_SESSION['ID']))  {
              ?>
         <li class="nav-item">
            <a class="nav-link" href="regions.php"><?php echo 'Regions'; ?> </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="profile.php"><?php echo 'Profile'; ?> </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="logout.php"><?php echo 'Logout'; ?> </a>
         </li>
         <?php 
            }
             ?>
      </ul>
   </div>
</nav>
<!-- navbar ending -->