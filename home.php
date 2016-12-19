		
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
    	<div id="title_section">Learn With Online Society</div>
      <div id="tagline">Succesfully Login. Welcome <?php echo $row['USER_NAME']; ?>  </div>
    </div>
</div>
<div id="menu_panel">
    <div id="menu_section">
        <ul>
            <li><a href="adminhome.php">Home</a></li>
            <li><a href="profile.php" >Profile</a></li>
            <li><a href="" >Follower</a></li>            
            <li><a href="" >Following</a></li>  
            <li><a href="" >About Us</a></li> 
            <li><a href="" >Contact Us</a></li>
            <li><a href="logout.php" >Logout</a></li>  
            <li><a href="#" >Creat Modarator</a></li>  
                                
        </ul> 
    </div>
</div>


<!-- colum 1-->

<div id="content">

	<div id="content_column_one">
    	<div class="column_one_section">
        	<div style="font-size:20px;font-weight: bold;color:white;">Categories</div><br><br>
         <p>
         	<input id="oracle" type="radio" onchange="loadDoc(this.value)" name="category" value="<?php echo "Oracle" ?>"> Oracle <br><br>
        	<input id="php" type="radio" onchange="loadDoc(this.value)" name="category" value="<?php echo "PHP" ?> "> PHP <br><br>
        	<input id="java" type="radio" onchange="loadDoc(this.value)" name="category" value=" <?php echo "Java" ?> "> Java <br><br>
        	<input id="c#" type="radio" onchange="loadDoc(this.value)" name="category" value="<?php echo "C#" ?> "> C# <br><br>
        	<input id="c++" type="radio" onchange="loadDoc(this.value)" name="category" value="<?php echo "c++" ?> "> C++<br><br>
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

    <!-- end of column one -->
    
					<div id="content_column_two">
						    
						

						    <?php 

						    				//require("oracle_to_json.php");
						    				$jsonData= getJSONFromDB("SELECT * FROM post_tab WHERE POST_TYPE='public'");
											//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
											//echo $jsonData;
											$jsn=json_decode($jsonData,true);

											//echo sizeof($jsn);

													for($i=sizeof($jsn)-1;$i>0;$i--) {

											    $pid=$jsn[$i]['POST_ID'];

											    echo $pid ;

												?>
												 <div class="column_two_section">
												 <?php
												
												
												echo "<p> {$jsn[$i]['POST_HEADLINE']}  </p>"; 
												echo"<br>";
												echo "<p>Posted at: &nbsp</P>";
												echo "<p> {$jsn[$i]['DATE_TIME']} </p>"; 
												echo"<br>";
												//echo"<p>=================================================</p>";
												echo "<p> {$jsn[$i]['POST']}</p>";
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
						    	 <input class="button" type="button" name="userpost" value="User Post" >
						    	 <input class="button" type="button" name="userquestion" value="User Question" >
						                <form action="userpost.php" method="post" name="postform">

											<input class="post_headline" type="text" value="headline..." name="headline">
											
										 	 <textarea name="ppost">write your post...</textarea> 

											<pre><input name="photoup" class="fileupload" type="file" value="photo"> <select class="button" name="categories" >
					                        <option value='' >Select category</option><option value='Oracle' >Oracle</option><option value='PHP' >PHP</option><option value='Java' >Java</option><option value='C#' >C#</option><option value='C++' >C++</option><option value='Other' >Other</option></select>
					                        													               <input class="button" type="submit" value="Post"></pre>	
					                        

										</form>
						            
						    </div>

						    <?php 

						    				//require("oracle_to_json.php");
						    				$jsonData= getJSONFromDB("SELECT * FROM post_tab WHERE POST_TYPE='userpost'");
											//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
											//echo $jsonData;
											$jsn=json_decode($jsonData,true);

											//echo sizeof($jsn);

													for($i=sizeof($jsn)-1;$i>0;$i--) {

											    $pid=$jsn[$i]['POST_ID'];

											    echo $pid ;

												?>
												 <div class="column_three_section">
												 <?php

												echo "<p> {$jsn[$i]['POST_HEADLINE']}  </p>"; 
												echo"<br>";
												echo "<p>Posted at: &nbsp</P>";
												echo "<p> {$jsn[$i]['DATE_TIME']} </p>"; 
												echo"<br>";
												//echo"<p>=================================================</p>";
												echo "<p> {$jsn[$i]['POST']}</p>";
												?>
													 <form name="commentform" action="comment.php"  method="post" >
												 	<input type="text" name="comment" value="Comment">
												 	<input type="hidden" name="postid" value="<?php echo $pid ?> ">
												 	
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

												echo"<p>------------------</p>";
												echo "<p> {$JsnCom[$j]['COMMENT_CONTENT']}</p>";
												
												echo "<p> {$JsnCom[$j]['TIME_DATE']}</p>";
												echo"<br>";
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
						          
						   </div> <!-- end of column three -->   
						    
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


		<?php /*
		
		session_start();
		 $v=$_SESSION['email'];
		 $v1=$_SESSION['pass'];


		$conn= odbc_connect('lwosdb','lwos','qaium29');

			if (!$conn)
			{
				die ('Error connection !!!');
			}



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
      <div id="tagline">Succesfully Login. Welcome <?php echo $row['USER_NAME']; ?>  </div>
    </div>
</div>
<div id="menu_panel">
    <div id="menu_section">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="profile.php" >Profile</a></li>
            <li><a href="" >Follower</a></li>            
            <li><a href="" >Following</a></li>  
            <li><a href="" >About Us</a></li> 
            <li><a href="" >Contact Us</a></li>
            <li><a href="logout.php" >Logout</a></li>  
                                
        </ul> 
    </div>
</div>
<!-- colum 1-->
<div id="content">

	<div id="content_column_one">
    	<div class="column_one_section">
        	<div style="font-size:20px;font-weight: bold;color:white;">Categories</div><br><br>
         <p>
         	<input type="radio" name="category" value=" "> Oracle <br><br>
        	<input type="radio" name="category" value=" "> PHP <br><br>
        	<input type="radio" name="category" value=" "> Java <br><br>
        	<input type="radio" name="category" value=" "> C# <br><br>
        	<input type="radio" name="category" value=" "> C++<br><br>
        	<input type="radio" name="category" value=" "> Other </p> 
                
             
        </div>
        
        <div class="cleaner_with_divider">&nbsp;</div>
        
        
     
    </div>

    <!-- end of column one -->
    
					<div id="content_column_two">
						    
				<!--		    <div class="column_two_section">
						    <form action="post.php" method="post" name="postform">
									<input class="post_headline" type="text" value="headline..." name="headline">
										
									  <textarea name="ppost">write your post...</textarea> 

										<pre><input name="photoup" class="fileupload" type="file" value="photo"> <select class="button" name="categories" >
				                        <option value='' >Select category</option><option value='' >Oracle</option><option value='' >PHP</option><option value='' >Java</option><option value='' >C#</option><option value='' >C++</option><option value='' >Other</option></select> <input class="button" type="submit" value="Post"></pre>	
				                        <input id="date" name="date" >

<script type="text/javascript">
  document.getElementById('date').value = Date();
</script>
				                       
							</form>




						               
						    </div> -->

						    <?php 

						    				require("oracle_to_json.php");
						    				$jsonData= getJSONFromDB("SELECT post_headline,post FROM post_tab");
											//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
											//echo $jsonData;
											$jsn=json_decode($jsonData,true);

											for($i=sizeof($jsn)-1;$i>0;$i--) {

												?>
												 <div class="column_two_section">
												 <?php

												echo "<p> {$jsn[$i]['POST_HEADLINE']} </p>"; 
												echo"<br>";
												echo"<p>=================================================</p>";
												echo "<p> {$jsn[$i]['POST']}</p>";
												 ?>


											
								
												</div>
						   
						    
						    <div class="column_two_section">
								
								
						               
						    </div>

						    <?php
						      }

						      
						    ?>
						        
					</div> <!-- end of column two -->

						   <div id="content_column_three">
						    	
						        
						    	 <div class="column_three_section">
						            <h1>Popular Posts</h1>
						            
						         </div>
						               
						         <div class="cleaner_with_divider">&nbsp;</div>
						        
						         <div class="column_three_section">
						            <h1>About This Blog</h1>
						            <p>Hallo All <a href="#">read more</a></p>
						         </div>  
						          
						   </div> <!-- end of column three -->   
						    
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
		
	*/	?>

