<br/><br/><br/><br/>




<?php 
session_start();
	
	$name=$_POST['name'];
	echo $user_id=$_POST['user_id'];
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

   

	if($_SESSION['reg_flag']==1 && $_SESSION['pass_flag']==1 )
	{

   
	
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

  																												//,'".$target_file."')
    $regresult=odbc_exec($conn, $plsql);

    header('location:profile.php');

	odbc_close($conn);
	}

	else 
	{

		 ?>  <h2>Your Edit is not completed. Please Inpurt data Properly. Please go back and make parfect your Edit. </h2> <?php 
	
	}

	 
	



?>

