<?php

session_start();
require("oracle_to_json.php");	
$post_id=$_GET['edit'];


	$jsonDataEdit= getJSONFromDB("SELECT * FROM POST_TAB WHERE POST_ID='".$post_id."'");
											//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
											//echo $jsonData;
			$jsnEdit=json_decode($jsonDataEdit,true);

			  	for($j =sizeof($jsnEdit)-1;$j>=0;$j--) { 




?>
 						<div class="post_writing">
						    <form action="post_edit_update.php" method="post" name="postform">


						    		<input type="hidden"  name="post_id" value="<?php echo $post_id ; ?>" >
									<input class="post_headline" type="text" value="<?php echo $jsnEdit[$j]['POST_HEADLINE']; ?>" name="headline">
										
									  <textarea name="ppost"><?php echo $jsnEdit[$j]['POST'] ;?></textarea> 

										<pre><input name="photoup" class="fileupload" type="file" value="photo"> <select value="  <?php echo  $jsnEdit[$j]['CATEGORIES']; ?>" class="button" name="categories"  >
				                        <option value='' >Category</option><option value='Oracle' >Oracle</option><option value='PHP' >PHP</option><option value='Java' >Java</option><option value='C#' >C#</option><option value='C++' >C++</option><option value='Other' >Other</option></select> <input class="button" type="submit" value="Post"></pre>	
				                        
				                       
							</form>
						</div>

						<?php
						 }
						?>

						<!-- Retrive all post at the time of editing -->

						 <?php 

						    				//require("oracle_to_json.php");
						    				$jsonData= getJSONFromDB("SELECT * FROM post_tab WHERE POST_TYPE='public'");
											//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
											//echo $jsonData;
											$jsn=json_decode($jsonData,true);

											//echo sizeof($jsn);

													for($i=sizeof($jsn)-1;$i>0;$i--) {

											    $pid=$jsn[$i]['POST_ID'];

											   // echo $pid ;

												?>
												 <div class="column_two_section">

												 
												 <p class="p"> <?php echo $jsn[$i]['POST_HEADLINE']; ?>  </p>
												 <?php
												
												
												//echo "<p> {$jsn[$i]['POST_HEADLINE']}  </p>"; 
												echo"<br>";
												echo "<p>Posted at: &nbsp</P>";
												echo "<p> {$jsn[$i]['DATE_TIME']} 
												</p>"; ?>



												 <button type="button" name="edit" class="button" onclick="edit(this.value)" value="<?php echo $pid ?>" >Edit</button> 
												<script type="text/javascript">
																    	function edit(edit) {
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

												<button class="button">Delete</button> 



												<?php 
												echo"<br>";
												//echo"<p>=================================================</p>";
												echo "<p> {$jsn[$i]['POST']}</p>";
												 ?> 
												 <form name="commentform" action="comment.php"  method="post" >
												 	<input type="text" name="comment" value="Comment">
												 	<input type="hidden" name="postid" value="<?php echo $pid ?> ">

												 	<input type="hidden" name="user_name_post" value="<?php echo $row['USER_NAME'];?>">
												 	<input type="submit" name="submit_comment" value="post">
				                                 <!-- TIME DATE TAKE BY TRIGGER FROM SYSDATE-->
												 </form>

												 <?php

//  commment , commentor, comment date database theek fech kore ante hobe. ebong dkehatee hobe . 

	$JsonCommData= getJSONFromDB("SELECT * FROM COMMENT_TAB COM INNER JOIN POST_TAB I ON COM.POST_ID=I.POST_ID WHERE I.POST_ID = ".$pid);
											//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
											//echo $jsonData;
			//echo $JsonCommData;
											$JsnCom=json_decode($JsonCommData,true);

										//echo $JsnCom ;

											for($j =sizeof($JsnCom)-1;$j>=0;$j--) {

												?>
												<a href="profile.php" style="color:blue;"> <?php echo $JsnCom[$j]['USER_NAME_COM'] ;?> </a>
												<?php 

												//echo "<p> {$JsnCom[$j]['USER_NAME_COM']}</p>"; 
												echo "<p> {$JsnCom[$j]['COMMENT_CONTENT']}</p>";
												
												echo "<p> {$JsnCom[$j]['TIME_DATE']}</p>";
												echo"<br>";
											} 
										//	$JsonCommData = null;
									//		$JsnCom = null;

												 ?>

												</div>
		

							     <?php
									 }
			      
								 ?>