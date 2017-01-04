<br/><br/><br/><br/>




<?php 
session_start();
	
	$name=$_POST['name'];
	 $user_id=$_POST['user_id'];
	$username=$_POST['uname'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	//$country=$_POST['country'];
	//$state=$_POST['state'];
	$pass=$_POST['pass'];

	//echo $_SESSION['reg_flag'] ; 

    //echo  $_SESSION['pass_flag'] ; 

   

	
   
	
	$delivDate = date('d-M-Y', strtotime($_POST['dob']));


	$conn= odbc_connect('lwosdb','lwos','qaium29');

	if (!$conn)
	{
		die ('Error connection !!!');
	}

//country='".$_POST['country']."',
		//city='".$_POST['state']."',

	$plsql= "UPDATE userinfo set

		user_role = 'user',
		full_name='".$_POST['name']."',
		user_name='".$_POST['uname']."',
		dob='".$delivDate."' ,
		gender='".$_POST['gender']."',
		mobile='".$_POST['phone']."',
		email='".$_POST['email']."',
		address='".$_POST['address']."',
		pass='".$_POST['pass']."'

		WHERE user_id = '".$_POST['user_id']."' "; 
/*
FULL_NAME=FN,
USER_NAME=UN,
EMAIL=EMA,
MOBILE=MOBA,
DOB=BD,
GENDER=GEN,
ADDRESS=ADDR,
PASS=PA
		



	$stmt = odbc_prepare($conn,'CALL PROFILE_UPDATE(?,?,?,?,?,?,?,?,?)');
	$success=odbc_execute($stmt,array($user_id, $name, $username, $email, $phone, $dob,$gender ,$address,$pass));*/

  																												//,'".$target_file."')
    $regresult=odbc_exec($conn, $plsql);

    header('location:profile.php');

	odbc_close($conn);
	

	 
	



?>

