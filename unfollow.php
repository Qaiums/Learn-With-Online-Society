<?php 

session_start();
			require("oracle_to_json.php");
		    $v=$_SESSION['email'];
			$v1=$_SESSION['pass'];
			$user_id=$_SESSION['user_id'];
		    $public_user_id= $_GET['unfollow'];





		    $conn= odbc_connect('lwosdb','lwos','1234');

	if (!$conn)
	{
		die ('Error connection !!!');
	}

 $unfollowquery="DELETE FROM FOLLOW 
  WHERE FOLLOWER_USER_ID='".$user_id."' and FOLLOWING_USER_ID= '".$public_user_id."'";

  odbc_exec($conn, $unfollowquery);

  header("location:public_profile.php");

  

		    ?>

		   
<!--
		    <script type="text/javascript">
						  			document.getElementById("unfollow").style.visibility="hidden";
						  			
		    </script>

	        	<div id=follow >
					 <button type="button" id="follow" name="follow" class="button" onclick="followF(this.value)" value="

						  <?php echo $public_user_id;?>" >follow unfollow</button> 

									<script type="text/javascript">
																    	function followF(follow) {
																	  var xhttp = new XMLHttpRequest();
																	  xhttp.onreadystatechange = function() {
					 												   if (this.readyState == 4 && this.status == 200) {
					  												    document.getElementById("unfollow").innerHTML = this.responseText;
					  												  }
					 												 };
																	  xhttp.open("GET", "follow.php?follow="+follow, true);
																	  xhttp.send();
																	}

														</script>
											</div>
		 -->