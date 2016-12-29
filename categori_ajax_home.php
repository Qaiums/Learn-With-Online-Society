 <?php
session_start();

	require("oracle_to_json.php");	

	$category=$_GET['category'];							
		$jsonDataCata= getJSONFromDB("SELECT * FROM POST_TAB WHERE CATEGORIES='".$category."' and POST_TYPE='public'");
											/
			$jsnCata=json_decode($jsonDataCata,true);

											


			?>
			
			<?php



				for($i=sizeof($jsnCata)-1;$i>=0;$i--)
						 {  
						 	$pid=$jsnCata[$i]['POST_ID'];

						 	?>

						 		<div class="column_two_section"><p>
						 	
                 <p class="p"> <?php echo $jsnCata[$i]['POST_HEADLINE']."<br>"; ?>  </p>
             
					 
	

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