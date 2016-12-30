		<link href="style.css" rel="stylesheet" type="text/css" />
		<?php 
		
		session_start();
		require("oracle_to_json.php");
		 $v=$_SESSION['email'];
		 $v1=$_SESSION['pass'];


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

	     <div class="notification">  	 




    	<div id="title_section">Learn With Online Society</div>
      <div id="tagline">Succesfully Login. Welcome <?php echo $row['USER_NAME']; ?>  </div>
    </div>
</div>
<div id="menu_panel">
    <div id="menu_section">
        <ul>
            <li><a href="adminhome.php">Home</a></li>
            <li><a href="profile.php" >Profile</a></li>
            <li><a href="follower.php" >Follower</a></li>            
            <li><a href="following.php" >Following</a></li>  
            <li><a href="" >About Us</a></li> 
          
            <li><a href="logout.php" >Logout</a></li>  
             
                                
        </ul> 
    </div>
</div>


<!-- *************************colum One start ****************************************-->

<div id="content">

	<div id="content_column_one">
    	<div class="column_one_section">
        	<div style="font-size:20px;font-weight: bold;color:white;">Categories</div><br><br>
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
					   xhttp.open("GET", "categori_ajax.php?category="+category, true);
					   xhttp.send();
					   }
							</script>
        <div class="cleaner_with_divider">&nbsp;</div>
 
    </div>

    <!--   ********************************** end of column ONE   ***************************************** -->


    <!--   ********************************** Start of column TWO   ***************************************** -->
    
					<div id="content_column_two">
						    
						 <div class="post_writing">
						    <form action="post.php" method="post" name="postform">

									<input class="post_headline" type="text" value="headline..." name="headline">
										
									  <textarea name="ppost">write your post...</textarea> 

										<pre><input name="photoup" class="fileupload" type="file" value="photo"> <select class="button" name="categories" value="" >
				                        <option value='' >Category</option><option value='Oracle' >Oracle</option><option value='PHP' >PHP</option><option value='java' >Java</option><option value='Csharp' >C#</option><option value='Cplus' >C++</option><option value='Other' selected="selected" >Other</option></select> <input class="button" type="submit" value="Post"></pre>
				                        
				                       
							</form>
               
						    </div>

						    <?php 

						    				
						    				$jsonData= getJSONFromDB("SELECT * FROM post_tab WHERE POST_TYPE='public'");
											
											$jsn=json_decode($jsonData,true);

											

													for($i=sizeof($jsn)-1;$i>=0;$i--) {

											    $pid=$jsn[$i]['POST_ID'];   // Taking POST_ID on variable $pid 


												?>
												 <div class="column_two_section">

												 
												 <p class="p"> <?php echo $jsn[$i]['POST_HEADLINE']; ?>  </p>
												 <?php
												
												
												//echo "<p> {$jsn[$i]['POST_HEADLINE']}  </p>"; 
												echo"<br>";
												echo "<p>Posted at: &nbsp</P>";
												echo "<p> {$jsn[$i]['DATE_TIME']} 
												</p>"; ?>

<!--Edit button -->

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
											
			//echo $JsonCommData;
											$JsnCom=json_decode($JsonCommData,true);


											for($j =sizeof($JsnCom)-1;$j>=0;$j--) {

												?>
										 
								            <div id="comment">	 <form action="public_profile.php" method="post" >

										    <input hidden="com_user_id" name="com_users_id" value="<?php echo $JsnCom[$j]['COM_USER_ID'] ;?>">

									    	<input type="submit"  name="" value="<?php echo $JsnCom[$j]['USER_NAME_COM'] ;?>"><?php echo "<p> {$JsnCom[$j]['COMMENT_CONTENT']}</p>";
										             echo "<p> {$JsnCom[$j]['TIME_DATE']}</p>";?>

										 <?php 
										
// What is the problem I can't understand. I should see it later .............  ?>
										 
										 </form> </div>
										 <?php 
												
										

											} 


												 ?>

												</div>
		

							     <?php
									 }
			      
								 ?>
						        
					</div>


					 <!-- ***************************************end of column TWO ************************************ -->


					 <!-- ************************************** Start of column Three ************************************ -->




				<div id="content_column_three">
						    	
						        
						<h3 class="p">	     <?php
						              
	$jsonNoti= getJSONFromDB("SELECT * FROM NOTIFICATION n INNER JOIN userinfo u ON n.FOLLOWING_ID=u.USER_ID  WHERE FOLLOWER_ID='".$noti_user_id."' and IS_NEW_FLAG = 1");
						//echo $jsonNoti ;
						//echo $noti_user_id ;

						    				
							$jsnNoti=json_decode($jsonNoti,true);

								echo "HEAD LINES OF NEW POST";
											echo "<br>";
											echo "--------------------------";
									
									for($i=0;$i<sizeof($jsnNoti);$i++) {

											?> </h3><p class="p"> <?php
											
											
											echo  $i+1 ;
											echo " / " ;
											echo  $jsnNoti[$i]['NOTIFICATION_MES']; ?> </p> <p style="color: blue;"> <?php
											echo " by ";
											echo  $jsnNoti[$i]['USER_NAME']; 											
											echo "<br>";
											

										} 

									?>
						            </p> </div>
						            <?php
    $update="UPDATE NOTIFICATION SET IS_NEW_FLAG=0 WHERE FOLLOWER_ID='".$_SESSION ['user_id']."' and  IS_NEW_FLAG=1";

   odbc_exec($conn, $update);


?>
						          
						   </div>


						    <!-- end of column three -->   
						    
						    	<div class="cleaner">&nbsp;</div>
	           </div> <!-- end of content -->

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

