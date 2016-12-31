<?php

session_start();
require("oracle_to_json.php");	
$post_id=$_GET['edit'];
$PDeluser_id= $_SESSION ['user_id'] ;


	$jsonDataEdit= getJSONFromDB("SELECT * FROM POST_TAB WHERE POST_ID='".$post_id."'");
											//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
											//echo $jsonData;
			$jsnEdit=json_decode($jsonDataEdit,true);

			  	for($j =sizeof($jsnEdit)-1;$j>=0;$j--) { 




?>
 						<div class="post_writing_three">
						    <form action="userpost_update.php" method="post" name="postform">


						    		<input type="hidden"  name="post_id" value="<?php echo $post_id ; ?>" >
									<input class="post_headline" type="text" value="<?php echo $jsnEdit[$j]['POST_HEADLINE']; ?>" name="headline">
										
									  <textarea name="ppost"><?php echo $jsnEdit[$j]['POST'] ;?></textarea> 
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
						 }
						?>

						<!-- Retrive all post at the time of editing -->

						 
						    <?php 

						    				$jsonData= getJSONFromDB("SELECT * FROM post_tab WHERE POST_TYPE='userpost'");

											$jsn=json_decode($jsonData,true);

										;

												for($i=sizeof($jsn)-1;$i>=0;$i--) {

											                 $pid=$jsn[$i]['POST_ID'];

											   

												?>

									
									

						<div class="column_three_section">

												 <form action="public_profile.php" method="post" >

												 <input hidden="com_user_id" name="com_users_id" value="<?php echo $jsn[$i]['USER_ID'] ;?>">

												 <input type="submit"  name="" value="<?php echo $jsn[$i]['USER_NAME_POST'] ;?>"> 
												 <p class="p"><?php echo $jsn[$i]['POST_HEADLINE'] ;?> </p>

												 </form>
												 
												<button type="button" name="edit" class="button" onclick="userpost_edit(this.value)" value="<?php echo $pid ?>" >Edit</button> 
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
					  												    document.getElementById("column_three_section").innerHTML = this.responseText;
					  												  }
					 												 };
														        xhttp.open("GET","delete_userpost.php?deleteUp="+deleteUp, true);
																  xhttp.send();
																	}

												</script>
												<?php 

												echo "<p>Posted at:&nbsp</P>";
												echo "<p> {$jsn[$i]['DATE_TIME']} </p>"; 
												echo "<br>";
												echo "<p> {$jsn[$i]['POST']}</p>";
												
												?>
												 

												 
	<!--Delete Button for colom three -->											

												
												<form name="commentform" action="comment.php"  method="post" >
												<input type="text" name="comment" value="Comment">
												<input type="hidden" name="postid" value="<?php echo $pid ?> ">
												<input type="hidden" name="user_name_post" value="<?php echo $row['USER_NAME'];?> ">
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

<!--
			<button type="button" name="comdelete" class="button" onclick="comment_delete(this.value)" value="<?php echo $JsnCom[$j]['COMMENT_ID']   ?>" >Delete</button> 

												<script type="text/javascript">
																    	function comment_delete(comdelete) {
																	   var xhttp = new XMLHttpRequest();
																	   xhttp.onreadystatechange = function() {
					 												   if (this.readyState == 4 && this.status == 200) {
					  												    document.getElementById("commentThree").innerHTML = this.responseText;
					  												   }
					 												  };
																	  xhttp.open("GET", "comment_delete.php?comdelete="+comdelete, true);
																	  xhttp.send();
																	  }

												</script>

		<button type="button" name="comedit" class="button" onclick="comment_edit(this.value)" value="<?php echo $JsnCom[$j]['COMMENT_ID']   ?>" >Edit</button> 

												<script type="text/javascript">
																    	function comment_edit(comedit) {
																	   var xhttp = new XMLHttpRequest();
																	   xhttp.onreadystatechange = function() {
					 												   if (this.readyState == 4 && this.status == 200) {
					  												    document.getElementById("commentThree").innerHTML = this.responseText;
					  												   }
					 												  };
																	  xhttp.open("GET", "comment_edit.php?comedit="+comedit, true);
																	  xhttp.send();
																	  }

												</script>  -->

									    </form>

												<?php
												
											} 
														?>

							</div>
														 <?php
											}
												 ?> 

						    
						    
						               
						         <div class="cleaner_with_divider">&nbsp;</div>
						        
						            
						          
						   </div>


						    <!-- end of column three -->   
						    
						    	<div class="cleaner">&nbsp;</div>
	           </div> <!-- end of content -->


<!-- Java script-->




</body>
</html>


	

