		
<link href="style.css" rel="stylesheet" type="text/css" />

		<?php 
		
		 session_start();
		 require("oracle_to_json.php");
		 $v=$_SESSION['email'];
		 $v1=$_SESSION['pass'];
		 $PDeluser_id= $_SESSION ['user_id'] ;

	
				 if($_SESSION['adminEmail']==$v)
			{
				header("location:adminhome.php");
			}
			


		$conn= odbc_connect('lwosdb','lwos','qaium29');

			if (!$conn)
			{
				die ('Error connection !!!');
			}




			//$count= "SELECT COUNT(*) FROM POST_TAB"
		$loginsql = "SELECT * FROM userinfo WHERE EMAIL = '".$v."' AND PASS = '".$v1."'";
		$loginresult=odbc_exec($conn, $loginsql);
		$check = "";
		if($row = odbc_fetch_array($loginresult))
			($check = $row['EMAIL']);
		if($check != "")
		{

			

			
		?>
   <!--if login success then it will show the page -->

				<!DOCTYPE html PUBLIC>
<html xmlns="">
<head>
<meta/>
<title>Learn with online society</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header_panel">
	<div id="header_section">
    	<div id="title_section">Learn With Online Society</div>

    	     <?php 
			 $stid = odbc_exec($conn, "select count(*) c from NOTIFICATION where FOLLOWER_ID='".$_SESSION ['user_id']."' and IS_NEW_FLAG=1 ");
			 $res= odbc_fetch_array($stid);

			 if ($res['C'][0] >0) {

			 ?>



            <form action="notiHeadlines.php" method="post">
            	<input  name="notification" value="<?php echo $_SESSION ['user_id'] ; ?>" hidden="notification">
            	<input class="button"  type="submit" name="submit" value="<?php echo "You have ", $res['C'][0] ," Notification" ;?>">
            </form>

            <?php } ?>
            
      <div id="tagline">Succesfully Login. Welcome <?php echo $row['USER_NAME']; ?>  </div>
    </div>
</div>
<div id="menu_panel">
    <div id="menu_section">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="profile.php" >Profile</a></li>
            <li><a href="follower.php" >Follower</a></li>            
            <li><a href="following.php" >Following</a></li>  
            <li><a href="" >About Us</a></li> 
            
            <li><a href="logout.php" >Logout</a></li>  
             <li> 

  			<input type="Search" name="search_name" onkeydown="return search_ajax(this.value)" value="" placeholder="Search..">

			     <script>
				   function search_ajax(search_name) {
					
				   	var xhttp = new XMLHttpRequest();
				  	xhttp.onreadystatechange = function() {
					    if (this.readyState == 4 && this.status == 200) {
					      document.getElementById("hell").innerHTML = this.responseText;
					    }
				  	};
				   xhttp.open("GET", "search.php?search_name="+search_name, true);
				   xhttp.send();
				   }
				  </script>

				 
			</li>
            
            
             
                                
        </ul> 
    </div>
</div>


<!-- colum 1-->

<div id="content">

	<div id="content_column_one">
    	<div class="column_one_section">
        	<div class="p">Categories</div><br><br>
         <p>
         	<input id="oracle" type="radio" onchange="loadDoc(this.value)" name="category" value="<?php echo "Oracle" ?>"> Oracle <br><br>
        	<input id="php" type="radio" onchange="loadDoc(this.value)" name="category" value="PHP"> PHP <br><br>
        	<input id="java" type="radio" onchange="loadDoc(this.value)" name="category" value="Java"> Java <br><br>
        	<input id="Csharp" type="radio" onchange="loadDoc(this.value)" name="category" value="Csharp"> C# <br><br>  
        	<input id="Csharp" type="radio" onchange="loadDoc(this.value)" name="category" value="Cplus"> C++<br><br>
        	<input id="other" type="radio" onchange="loadDoc(this.value)" name="category" value="<?php echo "Other" ?> "> Other </p> 
           
             
        </div>

      
					        <script>
					function loadDoc(category) {
						
					  var xhttp = new XMLHttpRequest();
					  xhttp.onreadystatechange = function() {
					    if (this.readyState == 4 && this.status == 200) {
					      document.getElementById("content_column_two").innerHTML = this.responseText;
					    }
					  };
					  xhttp.open("GET", "categori_ajax_home.php?category="+category, true);
					  xhttp.send();
					}
							</script>
        <div class="cleaner_with_divider">&nbsp;</div>
 
    </div>

    <!-- end of column one -->
    
					<div id="content_column_two">
						    
						
<?php 

							    				
							    				$jsonData= getJSONFromDB("SELECT * FROM post_tab WHERE POST_TYPE='public'");

							    				
												//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
												//echo $jsonData;
												$jsn=json_decode($jsonData,true);

												//echo sizeof($jsn);

										for($i=sizeof($jsn)-1;$i>=0;$i--) {

											    $pid=$jsn[$i]['POST_ID'];   // Taking POST_ID on variable $pid 


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
												<?php
		
												echo"<br>";
												echo "<p> {$jsn[$i]['POST']}</p>";
												 ?> 

												 <!-- ******************Comment option******************* -->

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
										 
										  <div id="comment">	 <form action="public_profile.php" method="post" >

										 <input hidden="com_user_id" name="com_users_id" value="<?php echo $JsnCom[$j]['COM_USER_ID'] ;?>">

										 <input type="submit"  name="" value="<?php echo $JsnCom[$j]['USER_NAME_COM'] ;?>"><?php echo "<p> {$JsnCom[$j]['COMMENT_CONTENT']}</p>";
										     echo "<p> {$JsnCom[$j]['TIME_DATE']}</p>";

									//	     $JsnCom[$j]['COMMENT_ID'] 

										     ?>




										 <?php 
										
// What is the problem I can't understand. I should see it later ..............


										 ?>
										 
										 </form>  </div>
												<?php 
												
												
								
												
												

											} 

										//	$JsonCommData = null;
									//		$JsnCom = null;

												 ?>

												</div>
		

							     <?php
									 }
			      
								 ?>
						        
					</div> <!-- end of column two -->

						   <div id="content_column_three">
						    	
						        
						   <div class="post_writing">
						    	 
						                <form action="userpost.php" method="post" name="postform">
											<input class="post_headline" type="text" value="headline..." name="headline">										
										 	 <textarea name="ppost">write your post...</textarea> 


										 	  <input type="hidden" name="user_name_post" value="<?php echo $row['USER_NAME'];?>">

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

						    				//require("oracle_to_json.php");
						    				$jsonData= getJSONFromDB("SELECT * FROM post_tab WHERE POST_TYPE='userpost'");
											//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
											//echo $jsonData;
											$jsn=json_decode($jsonData,true);

											//echo sizeof($jsn);

													for($i=sizeof($jsn)-1;$i>=0;$i--) {

											    $pid=$jsn[$i]['POST_ID'];

											    $post_user_id =$jsn[$i]['USER_ID'];

											   // echo $pid ;	


												?>

									<!--  showing privius posts   -->		
									

						 <div class="column_three_section" id='hell'>

												 <form action="public_profile.php" method="post" >

												 <input hidden="com_user_id" name="com_users_id" value="<?php echo $jsn[$i]['USER_ID'] ;?>">

												 <input type="submit"  name="" value="<?php echo $jsn[$i]['USER_NAME_POST'] ;?>"> 
												 <p class="p"><?php echo $jsn[$i]['POST_HEADLINE'] ;?> </p>

												 </form>
												 

												<!--Edit Button for colom three -->

												<?php 

												if($PDeluser_id==$post_user_id)
												{
												?>
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

												<!--delete Button for colom three -->

												<button type="button" name="deleteUp" class="button" onclick="delete_userpost(this.value)" value="<?php echo $pid ?>" >Delete</button>
												<script type="text/javascript">
																    	function delete_userpost(deleteUp) {
																	  var xhttp = new XMLHttpRequest();
																	  xhttp.onreadystatechange = function() {
					 												   if (this.readyState == 4 && this.status == 200) {
					  												    document.getElementById("content_column_three").innerHTML = this.responseText;
					  												  }
					 												 };
														        xhttp.open("GET","delete_userpost.php?deleteUp="+deleteUp, true);
																  xhttp.send();
																	}

												</script>

												<?php   } ?>
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
											//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
											//echo $jsonData;
			//echo $JsonCommData;
											$JsnCom=json_decode($JsonCommData,true);

										//echo $JsnCom ;

											for($j =sizeof($JsnCom)-1;$j>=0;$j--) {

												?>
							<div id="commentThree" >  <form action="public_profile.php" method="post" >

												 <input hidden="com_user_id" name="com_users_id" value="<?php echo $JsnCom[$j]['COM_USER_ID'] ;?>">

												 <input type="submit"  name="" value="<?php echo $JsnCom[$j]['USER_NAME_COM'] ;?>"> <?php echo "<p> {$JsnCom[$j]['COMMENT_CONTENT']}</p>";
												
														  echo "<p> {$JsnCom[$j]['TIME_DATE']}</p>";
														   ?>


	<!--	      <button type="button" name="comdelete" class="button" onclick="comment_delete(this.value)" value="<?php echo $JsnCom[$j]['COMMENT_ID']   ?>" >Delete</button> 

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



												 </form> </div>

												<?php
												
											} 
														?>

							</div>
														 <?php
											}
												 ?> 

						    
						    <div class="column_three_section">
						  

						    </div>
						               
						         <div class="cleaner_with_divider">&nbsp;</div>
						        
						         <div class="column_three_section">
						            <h1>About This Blog</h1>
						            <p>Hallo All <a href="#">read more</a></p>
						         </div>  

	</div> 



	<!-- end of content -->

						<div id="bottom_panel">
						 <center>
							<div class="bottom_panel_section">
						   	<a href="#">Home</a> | <a href="#">Profile</a> | <a href="#"> Follower</a> | <a href="#">Following </a>| <a href="#">About Us</a> | <a href="#">Contact Us</a><br /><br />
						  <p> Copyright © 2016 </p> <a href="#"><strong>Muhammad Abdul Qaium</strong></a></div>
						    </center>
    

    <div class="cleaner">&nbsp;</div>
</div> <!-- end of bottom panel -->



<!-- Java script-->




</body>
</html>


		<?php
		} 
		
		else
		{
			
			header('location:login.php');
		}
		odbc_close($conn);
		
		?>


		<?php 