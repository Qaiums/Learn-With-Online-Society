<?php 
 session_start();
		require("oracle_to_json.php");
		 $v=$_SESSION['email'];
		 $v1=$_SESSION['pass'];
	     $comment_id =$_GET['comdelete'];


	     $conn= odbc_connect('lwosdb','lwos','1234');

			if (!$conn)
			{
				die ('Error connection !!!');
			}


		 $delete= "delete comment_tab where comment_id ='".$comment_id."'";

		 $result=odbc_exec($conn,$delete);

   	     odbc_close($conn);



?>		 