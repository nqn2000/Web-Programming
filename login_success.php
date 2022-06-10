<?php  
include_once 'database.php';
//include_once 'session.php';


 
 	if(isset($_SESSION["sid"]))  
 	{  
     	header("Location:index.php");
 	}  
 	else  
 	{  
	   	echo '<script type="text/javascript">'; 
		echo 'alert("Wrong Password OR User ID!");'; 
		echo 'window.location.href = "login.php";';
		echo '</script>';
 	}  
 ?>  