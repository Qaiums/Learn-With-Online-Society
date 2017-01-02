<br/><br/><br/><br/>




<?php 
session_start();
	
	$name=$_POST['name'];
	$username=$_POST['uname'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$country=$_POST['country'];
	$state=$_POST['state'];
	$pass=$_POST['pass'];

	//echo $_SESSION['reg_flag'] ; 


   //echo  $_SESSION['pass_flag'] ; 

   

	if($_SESSION['reg_flag']==1 && $_SESSION['pass_flag']==1 )
	{

   
	
	$delivDate = date('d-M-Y', strtotime($_POST['dob']));


	$conn= odbc_connect('lwosdb','lwos','qaium29');

	if (!$conn)
	{
		die ('Error connection !!!');
	}


$plsql= "UPDATE userinfo (user_id,user_role,full_name,user_name,dob,gender,mobile,email,address,country,city,pass)
		     values(user_id.nextval,'user','".$_POST['name']."','".$_POST['uname']."','".$delivDate."','".$_POST['gender']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['address']."','".$_POST['country']."','".$_POST['state']."','".$_POST['pass']."')";

  																												//,'".$target_file."')
    $regresult=odbc_exec($conn, $plsql);
 ?>  <h2> Successfully Updated </h2> 

 <center>
 <input type="button" onclick="location.href='profile.php';" value="GO TO PROFILE "/></center>
 <?php 

	odbc_close($conn);
	}

	else 
	{

		 ?>  <h2>Your registration is not completed. Please Register Properly. Please go back and make parfect your registration. </h2> <?php 
	
	}

	 
	



?>

