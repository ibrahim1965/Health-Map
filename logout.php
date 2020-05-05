<?php 

		 require_once('includes/DBconnect.php');
    
        session_start();  

		session_unset();
		session_destroy();

		header('location:index.php');
		exit();

 ?>