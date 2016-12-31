<?php 
session_start();
$post_id=$_GET['deletePost'];

require("oracle_to_json.php");

$conn= odbc_connect('lwosdb','lwos','qaium29');

			if (!$conn)
			{
				die ('Error connection !!!');
			}


			$delete= "DELETE from POST_TAB where POST_ID='".$post_id."'";

    $result=odbc_exec($conn,$delete);

		 odbc_close($conn);
			      
								 ?>






