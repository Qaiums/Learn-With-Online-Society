<?php 
	require("oracle_to_json.php");

	$search=$_GET['search_name'];

	$jsonData= getJSONFromDB("select * from post_tab where (POST_HEADLINE like '%".$search."%') OR (POST like '%".$search."%')");

	//echo "select * from post_tab where (POST_HEADLINE like '%".$search."%') OR (POST like '%".$search."%')";
												
	 $jsn=json_decode($jsonData,true);											
	$str = "";
	for($i=sizeof($jsn)-1;$i>=0;$i--) {

		 $str.=  "Headline:";
		 $str.=  $jsn[$i]['POST_HEADLINE']; 
		 $str.  "<br>";
		 $str.=  "Post:";
		 $str.=  $jsn[$i]['POST']; 

		 $pid=$jsn[$i]['POST_ID'];
	

?>
 	                        

												 <form action="public_profile.php" method="post" >

												 <input hidden="com_user_id" name="com_users_id" value="<?php echo $jsn[$i]['USER_ID'] ;?>">

												 <input type="submit"  name="" value="<?php echo $jsn[$i]['USER_NAME_POST'] ;?>"> 
												 <p class="p"><?php echo $jsn[$i]['POST_HEADLINE'] ;?> </p>

												 </form>
												 
												<button type="button" name="edit" class="button" onclick="userpost_edit(this.value)" value="<?php echo  $pid ?>" >Edit</button> 
												<script type="text/javascript">
																    	function userpost_edit(edit) {
																	    var xhttp = new XMLHttpRequest();
																	   xhttp.onreadystatechange = function() {
					 												   if (this.readyState == 4 && this.status == 200) {
					  												    document.getElementById("content_column_three").innerHTML = this.responseText;
					  												    }
					 												   };
																	    xhttp.open("GET", "userpost_edit.php?edit="+edit, true);
																	    xhttp.send();
																	}

												</script>
<!--Edit Button for colom three -->

												<button type="button" name="deleteUp" class="button" onclick="delete_userpost(this.value)" value="<?php echo $pid ?>" >Delete</button>
												<script type="text/javascript">

																    	function delete_userpost(deleteUp) {
																	  var xhttp = new XMLHttpRequest();
																	  xhttp.onreadystatechange = function() {
					 												   if (this.readyState == 4 && this.status == 200) {
					  												    document.getElementById("column_three_section").innerHTML = location.reload(true);
					  												  }
					 												 };
														        xhttp.open("GET","delete_userpost.php?deleteUp="+deleteUp, true);
																  xhttp.send();
																	}

												</script>
												<?php 

											echo	 "<p>Posted at:&nbsp</p>";
											echo	 " <p>{$jsn[$i]['DATE_TIME']} </p> "; 
											echo	 "<br>";
											echo     " <p>{$jsn[$i]['POST']}</p>";
												
												?>
												 

												 
	<!--Delete Button for colom three -->											

												
												<form name="commentform" action="comment.php"  method="post" >
												<input type="text" name="comment" placeholder="Write your comment...">
												<input type="hidden" name="postid" value="<?php echo $pid ?> ">
												
												<input type="submit" name="submit_comment" value="post">


				                                 <!-- TIME DATE TAKE BY TRIGGER FROM SYSDATE-->
												 

												 </form>
												 <?php


									     $JsonCommData= getJSONFromDB("SELECT * FROM COMMENT_TAB COM INNER JOIN POST_TAB I ON COM.POST_ID=I.POST_ID WHERE I.POST_ID = ".$pid);
										
			//echo $JsonCommData;
											    $JsnCom=json_decode($JsonCommData,true);

										

										 for($j =sizeof($JsnCom)-1;$j>=0;$j--) {
  
												?>


										<form id="commentThree" action="public_profile.php" method="post" >

														 <input hidden="com_user_id" name="com_users_id" value="<?php echo $JsnCom[$j]['COM_USER_ID'] ;?>">

														 <input type="submit"  name="" value="<?php echo $JsnCom[$j]['USER_NAME_COM'] ;?>"> <?php echo "<p> {$JsnCom[$j]['COMMENT_CONTENT']}</p>";
															
																	  echo "<p> {$JsnCom[$j]['TIME_DATE']}</p>";
																	   ?>



									    </form>

								

												<?php
												
											} 
												
}
	//echo $str; 
 ?>

							