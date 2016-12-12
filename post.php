<?php
session_start();
$headline=$_POST['headline'];
$post=$_POST['ppost'];
$categori=$_POST['categories'];
$photo=$_POST['photoup'];
$date_time=$_POST['date'];

//$userid=$_SESSION['user_id'];




	$conn= odbc_connect('lwosdb','lwos','qaium29');

	if (!$conn)
	{
		die ('Error connection !!!');
	}


	 $query= "insert into POST_TAB (post_id,post,post_type,categories,post_headline,date_time)
			     values(post_id.nextval,'".$_POST['ppost']."','public','".$_POST['categories']."','".$_POST['headline']."','".$date_time."')";

	


    $result=odbc_exec($conn,$query);


	$comment=$_POST['comment'];
	$cdate = $_POST['comdate'];


	$comquery="insert into COMMENT_TAB (COMMENT_ID,COMMENTTO,COMMENT_TYPE,COM_DATE)
	values (comment_id.nextval,'".$comment."','public',
	'".$date."')";

    $comresult=odbc_exec($conn,$comquery);


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