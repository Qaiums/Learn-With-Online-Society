<?php 
session_start();

$headline=$_POST['headline'];
$post=$_POST['ppost'];
$categori=$_POST['categories'];
$photo=$_POST['photoup'];
$post_id=$_POST['post_id'];

		$conn= odbc_connect('lwosdb','lwos','qaium29');

			if (!$conn)
			{
				die ('Error connection !!!');
			}


$stmt = odbc_prepare($conn,'CALL POST_UPDATE(?,?,?,?)');
$success=odbc_execute($stmt,array($post_id, $post, $headline, $categori ));
   
  // $update="update  POST_TAB set POST='".$_POST['ppost']."',POST_HEADLINE='".$_POST['headline']."',CATEGORIES='".$_POST['categories']."' where post_id='".$_POST['post_id']."'";

  // echo $update ;

  //$result=odbc_exec($conn,$update);

   	odbc_close($conn);

	
		header("location:adminhome.php");

	

?>