<?php 
 session_start();


	

		require("oracle_to_json.php");
		 $v=$_SESSION['email'];
		 $v1=$_SESSION['pass'];
	     $updateCommnet=$_POST['comment_cnotent'];
		 $comment_id =$_POST['comment_id'];


		 $conn= odbc_connect('lwosdb','lwos','qaium29');

			if (!$conn)
			{
				die ('Error connection !!!');
			}


		 $update= "update COMMENT_TAB  set COMMENT_CONTENT ='".$updateCommnet."'  where COMMENT_ID='".$comment_id."'";

		 $result=odbc_exec($conn,$update);

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







?>