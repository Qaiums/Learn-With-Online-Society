<?php 
 session_start();
		require("oracle_to_json.php");
		 $v=$_SESSION['email'];
		 $v1=$_SESSION['pass'];
		 $comment_id=$_GET['comedit'];


		 $jsonDataComEdit= getJSONFromDB("SELECT * FROM COMMENT_TAB WHERE COMMENT_ID='".$comment_id."'");
											
			$jsnComEdit=json_decode($jsonDataComEdit,true);

			  	for($j =sizeof($jsnComEdit)-1;$j>=0;$j--) { 

			  //	echo	$jsnComEdit[$j]['COMMENT_CONTENT']; 
			  	//echo     $jsnComEdit[$j]['COMMENT_ID']; 
?>
		
		 <form action="update_comment.php" method="post">
		 	
		 <input type="text" name="comment_cnotent" value=" <?php echo $jsnComEdit[$j]['COMMENT_CONTENT'];  ?>">

		 <input type="" hidden="comment_id" name="comment_id" value="<?php echo $jsnComEdit[$j]['COMMENT_ID']; ?> ">

		 <input type="submit" name="comment" value="Update">

		 </form>

		 <?php 	} ?>


