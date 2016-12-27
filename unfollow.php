<?php 

session_start();
			require("oracle_to_json.php");
		    $v=$_SESSION['email'];
			$v1=$_SESSION['pass'];
			$user_id=$_SESSION['user_id'];
		    $public_user_id= $_POST['unfollow'];


		    $conn= odbc_connect('lwosdb','lwos','qaium29');

	if (!$conn)
	{
		die ('Error connection !!!');
	}

 $unfollowquery="DELETE FROM FOLLOW 
  WHERE FOLLOWER_USER_ID='".$public_user_id."' and FOLLOWING_USER_ID= '".$user_id."'";

  odbc_exec($conn, $unfollowquery);

  echo "deleted";

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


		    ?>