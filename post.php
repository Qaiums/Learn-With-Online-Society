<?php
session_start();
$headline=$_POST['headline'];
$post=$_POST['ppost'];
$categori=$_POST['categories'];
$photo=$_POST['photoup'];
//$date_time=$_POST['date'];




$userid=$_SESSION['user_id'];

//echo $userid ;




	$conn= odbc_connect('lwosdb','lwos','qaium29');

	if (!$conn)
	{
		die ('Error connection !!!');
	}

	//if ($_POST['categories']=="")
	//	$_POST['categories']='Other';

	

	

	$query= "insert into POST_TAB (post_id,post,post_type,CATEGORIES,post_headline,user_id)
	values(POST_ID_S.nextval,'".$_POST['ppost']."','public','".$_POST['categories']."','".$_POST['headline']."','".$userid."')";
    $result=odbc_exec($conn,$query);

    echo $query;

    //echo $query ;

// COMMENT DATABASE WORK....

	//$comment=$_POST['comment'];
	//$comdate = $_POST['comdate'];
	//$user_id=$_SESSION['user_id'];
	//$post_id=$_SESSION['post_id'];




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