<?php 

session_start();
			require("oracle_to_json.php");
		    $v=$_SESSION['email'];
			$v1=$_SESSION['pass'];
			$user_id=$_SESSION['user_id'];
		    $public_user_id= $_GET['follow'];




 $conn= odbc_connect('lwosdb','lwos','qaium29');

	if (!$conn)
	{
		die ('Error connection !!!');
	}

 $followquery="insert into FOLLOW  (FOLLOW_ID,FOLLOWING_USER_ID,FOLLOWER_USER_ID,IS_ACTIVE)
  values  (FOLLOW_ID.nextval,'".$public_user_id."','".$user_id."',1 )";

  odbc_exec($conn, $followquery);

odbc_close($conn);
?>

	 <script type="text/javascript">
						  			document.getElementById("follow").style.visibility="hidden";
						  			
		    </script>
 

 							<div id=unfollow >
						  		   <button type="button" id="unfollow" name="unfollow" class="button" onclick="unfollowF(this.value)" value="

						  			<?php echo $public_user_id;?>" >Unfollow  from follow</button> 

												<script type="text/javascript">
																    	function unfollowF(unfollow) {
																	  var xhttp = new XMLHttpRequest();
																	  xhttp.onreadystatechange = function() {
					 												   if (this.readyState == 4 && this.status == 200) {
					  												    document.getElementById("follow").innerHTML = this.responseText;
					  												  }
					 												 };
																	  xhttp.open("GET", "unfollow.php?unfollow="+unfollow, true);
																	  xhttp.send();
																	}

														</script>
											</div>	





