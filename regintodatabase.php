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

   

	

   
	
	$delivDate = date('d-M-Y', strtotime($_POST['dob']));


	$conn= odbc_connect('lwosdb','lwos','qaium29');

	if (!$conn)
	{
		die ('Error connection !!!');
	}


$plsql= "INSERT into userinfo (user_id,user_role,full_name,user_name,dob,gender,mobile,email,address,country,city,pass)
		     values(user_id.nextval,'user','".$_POST['name']."','".$_POST['uname']."','".$delivDate."','".$_POST['gender']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['address']."','".$_POST['country']."','".$_POST['state']."','".$_POST['pass']."')";

  																												//,'".$target_file."')
    $regresult=odbc_exec($conn, $plsql);
 ?>  <h2> Successfully Updated </h2> 

 <center>
 <input type="button" onclick="location.href='login.php';" value="GO TO LOGIN "/></center>
 <?php 

	odbc_close($conn);
	
?>

