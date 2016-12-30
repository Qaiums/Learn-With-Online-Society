   <?php
session_start();

	$conn= odbc_connect('lwosdb','lwos','qaium29');

	if (!$conn)
	{
		die ('Error connection !!!');
	}


    $comment=$_POST['comment'];
	//$comdate = $_POST['comdate'];
	$user_id=$_SESSION['user_id'];
	$post_id=$_POST['postid'];
	$user_name_com=$_POST['user_name_post'];

	//echo $post_id ;

	//echo $post_id ;
//
// ok . thick ase.. pore dakbanii..
	//ok
	// ok acca ja ekta sigaret kheyee ay.amio kheye asi. :P :P


	$comquery="insert into COMMENT_TAB (COMMENT_ID,COMMENT_CONTENT,COMMENT_POST_TYPE,COM_USER_ID,POST_ID,USER_NAME_COM)
	values (comment_id.nextval,'".$comment."','public','".$user_id."','".$post_id."','".$user_name_com."')";

	echo $comquery ;

    $comresult=odbc_exec($conn,$comquery);




// DATABAS CLOSE AND  BACK TO PAGE LOCATION
	odbc_close($conn);
	
  
	if($_SESSION['adminEmail']==$_SESSION['email'])
	{
		header("location:adminhome.php");
	}
	else
	{
		header("location:home.php");
	}
	
	?>