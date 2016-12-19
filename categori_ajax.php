 <?php
session_start();

	require("oracle_to_json.php");	

	$category=$_GET['category'];							
		$jsonDataCata= getJSONFromDB("SELECT * FROM POST_TAB WHERE CATEGORIES='".$category."'");
											//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
											//echo $jsonData;
			$jsnCata=json_decode($jsonDataCata,true);

											//echo sizeof($jsn);


			?>
			<div class="post_writing">
			 <form action="post.php" method="post" name="postform">

									<input class="post_headline" type="text" value="headline..." name="headline">
										
									  <textarea name="ppost">write your post...</textarea> 

										<pre><input name="photoup" class="fileupload" type="file" value="photo"> <select class="button" name="categories" >
				                        <option value='' >Select category</option><option value='Oracle' >Oracle</option><option value='PHP' >PHP</option><option value='Java' >Java</option><option value='C#' >C#</option><option value='C++' >C++</option><option value='Other' >Other</option></select> <input class="button" type="submit" value="Post"></pre>	
				                        
				                       
							</form>
							</div>
			<?php



				for($i=sizeof($jsnCata)-1;$i>=0;$i--)
						 {  
						 	$pid=$jsnCata[$i]['POST_ID'];

						 	?>

						 		<div class="column_two_section"><p>
						 	<?php

					echo $jsnCata[$i]['POST_HEADLINE']."<br>";
					echo "DATE :";
					echo $jsnCata[$i]['DATE_TIME']."<br>"; 
					echo $jsnCata[$i]['POST']."<br>";
					 ?> 
												 <form name="commentform" action="comment.php"  method="post" >
												 	<input type="text" name="comment" value="Comment">
												 	<input type="hidden" name="postid" value="<?php echo $pid ?> ">
												 	
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

												echo"<p>------------------</p>";
												echo "<p> {$JsnCom[$j]['COMMENT_CONTENT']}</p>";
												
												echo "<p> {$JsnCom[$j]['TIME_DATE']}</p>";
												echo"<br>";
											} 

								?>
									</p></div>
								<?php			   
						}



          
  ?>