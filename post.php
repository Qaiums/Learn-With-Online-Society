<?php
session_start();
$headline=$_POST['headline'];
$post=$_POST['ppost'];
$categori=$_POST['categories'];
$photo=$_POST['photoup'];
$public="public";
//$date_time=$_POST['date'];




$userid=$_SESSION['user_id'];

//echo $userid ;




	$conn= odbc_connect('lwosdb','lwos','qaium29');

	if (!$conn)
	{
		die ('Error connection !!!');
	}

	

    $stmt = odbc_prepare($conn,'CALL INSERT_POST(?,?,?,?,?)');

	$success=odbc_execute($stmt,array($post, $public, $categori, $headline, $userid));

	


    //INSERT_POST

    //echo $query ;

// COMMENT DATABASE WORK....

	



	//$comquery="insert into COMMENT_TAB (COMMENT_ID,COMMENT_CONTENT,COMMENT_POST_TYPE,USER_ID,POST_ID,TIME_DATE)
	//values (comment_id.nextval,'".$comment."','public','".$user_id."','".$post_id."','".$comdate."')";

   // $comresult=odbc_exec($conn,$comquery);




// DATABAS CLOSE AND  BACK TO PAGE LOCATION
	odbc_close($conn);

	if($_SESSION['adminEmail'])
	{
		header("location:adminhome.php");
	}
	else
	{
		header("location:home.php");
	}
	

?>