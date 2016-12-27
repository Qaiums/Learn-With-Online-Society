<?php 

session_start();
			require("oracle_to_json.php");
		    $v=$_SESSION['email'];
			$v1=$_SESSION['pass'];
			$user_id=$_SESSION['user_id'];
		    $public_user_id= $_POST['follow'];




 $conn= odbc_connect('lwosdb','lwos','qaium29');

	if (!$conn)
	{
		die ('Error connection !!!');
	}

 $followquery="insert into FOLLOW  (FOLLOW_ID,FOLLOWER_USER_ID,FOLLOWING_USER_ID,IS_ACTIVE)
  values  (FOLLOW_ID.nextval,'".$public_user_id."','".$user_id."',1 )";

  odbc_exec($conn, $followquery);

/*

  if($_SESSION['adminEmail'])
	{
		header("location:adminhome.php");
	}
	else
	{
		header("location:home.php");
	}

*/
odbc_close($conn);
?>