<?php 
session_start();
$post_id=$_GET['deleteUp'];
$PDeluser_id= $_SESSION ['user_id'] ;

require("oracle_to_json.php");

$conn= odbc_connect('lwosdb','lwos','qaium29');

		if (!$conn)
			{
				die ('Error connection !!!');
			}

$stmt = odbc_prepare($conn,'CALL DELETE_POST(?)');
$success=odbc_execute($stmt,array($post_id));

odbc_close($conn);
			      
								 ?>




