 <?php
session_start();

	require("oracle_to_json.php");	

 echo  $category=$_GET['category'];

		$jsonDataCata= getJSONFromDB("SELECT * FROM POST_TAB WHERE CATEGORIES='".$category."'and POST_TYPE='public'");
		//var_dump($jsonDataCata);	
											
			$jsnCata=json_decode($jsonDataCata,true);

											

			?>
			<div class="post_writing">
			 <form action="post.php" method="post" name="postform">

									<input class="post_headline" type="text" value="headline..." name="headline">
										
									  <textarea name="ppost">write your post...</textarea> 

										<pre>	<select class="select_button" name="categories" value="" >
				                        <option value='' >Category</option>
				                        <option value='Oracle' >Oracle</option>
				                        <option value='PHP' >PHP</option>
				                        <option value='java' >Java</option>
				                        <option value='Csharp' >C#</option>
				                        <option value='Cplus' >C++</option>
				                        <option value='Other' selected="selected" >Other</option>
				                        </select> <input class="button" type="submit" value="Post"></form> </pre>	
				                        
				                       
							</form>
							</div>
			<?php



				for($i=sizeof($jsnCata)-1;$i>=0;$i--)
						 {  
						 	$pid=$jsnCata[$i]['POST_ID'];

						 	?>

						 		<div class="column_two_section"><p>
						 	
                 					<p class="p"> <?php echo $jsnCata[$i]['POST_HEADLINE']."<br>"; ?>  </p>
             
					 
	<button type="button" name="edit" class="button" onclick="post_edit(this.value)" value="<?php echo $pid ?>" >Edit</button> 
												<script type="text/javascript">
																    	function post_edit(edit) {
																	  var xhttp = new XMLHttpRequest();
																	  xhttp.onreadystatechange = function() {
					 												   if (this.readyState == 4 && this.status == 200) {
					  												    document.getElementById("content_column_two").innerHTML = this.responseText;
					  												  }
					 												 };
																	  xhttp.open("GET", "post_edit_ajax.php?edit="+edit, true);
																	  xhttp.send();
																	}

												</script>

<!--Delete button -->												

												
  <button type="button" name="deletePost" class="button" onclick="delete_post(this.value)" value="<?php echo $pid ?>" >Delete</button>
												<script type="text/javascript">
																    	function delete_post(deletePost) {
																	  var xhttp = new XMLHttpRequest();
																	  xhttp.onreadystatechange = function() {
					 												   if (this.readyState == 4 && this.status == 200) {
					  												    document.getElementById("content_column_two").innerHTML = this.responseText;
					  												  }
					 												 };
																	  xhttp.open("GET", "delete_post.php?deletePost="+deletePost, true);
																	  xhttp.send();
																	}

												</script>

											    <p>
										        <?php	
												echo "Posted at: ";
												echo $jsnCata[$i]['DATE_TIME']."<br>";
												echo $jsnCata[$i]['POST']."<br>"; ?> </p>

						
												 <form name="commentform" action="comment.php"  method="post" >
												 	<input type="text" name="comment" value="Comment">
												 	<input type="hidden" name="postid" value="<?php echo $pid ?> ">
												 	
												 	<input type="submit" name="submit_comment" value="post">
				                                 <!-- TIME DATE TAKE BY TRIGGER FROM SYSDATE-->
												 </form>
					 <?php

//  commment , commentor, comment date database theek fech kore ante hobe. ebong dkehatee hobe . 

	$JsonCommData= getJSONFromDB("SELECT * FROM COMMENT_TAB COM INNER JOIN POST_TAB I ON COM.POST_ID=I.POST_ID WHERE I.POST_ID = ".$pid);
					
												$JsnCom=json_decode($JsonCommData,true);


												for($j =sizeof($JsnCom)-1;$j>=0;$j--) {

												?> <form action="public_profile.php" method="post" >

												 <input hidden="com_user_id" name="com_users_id" value="<?php echo $JsnCom[$j]['COM_USER_ID'] ;?>">

												 <input type="submit"  name="" value="<?php echo $JsnCom[$j]['USER_NAME_COM'] ;?>">
												 <?php 	echo "<p> {$JsnCom[$j]['COMMENT_CONTENT']}</p>";	
														echo "<p> {$JsnCom[$j]['TIME_DATE']}</p>";
														echo"<br>";?>

												 </form>
												 <?php 
													
													} 

										?>
											</p></div>
										<?php			   
						}



          
  ?>