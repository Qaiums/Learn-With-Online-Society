
		<?php
			session_start();
			require("oracle_to_json.php");
			$v=$_SESSION['email'];
			$v1=$_SESSION['pass'];
		


			
			$com_users_id= $_POST['com_users_id'];
		


			$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE USER_ID = '".$com_users_id."'");
			//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
			//echo $jsonData;
			$jsn=json_decode($jsonData,true);

			for($i=0;$i<sizeof($jsn);$i++) {
		?>	

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
      <div id="tagline">about my website</div>
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
   <!--<li><a href="registration.php" >Register</a></li> -->                     
        </ul> 
    </div>
</div>
<!-- colum 1-->
<div id="content">

	<div id="content_column_one">
    	<div class="column_one_section">
        	<p>Categories<br><br><br>
        	<input type="radio" name="oracle" value=" "> Oracle <br><br>
        	<input type="radio" name="php" value=" "> PHP <br><br>
        	<input type="radio" name="java" value=" "> Java <br><br>
        	<input type="radio" name="c#" value=" "> C# <br><br>
        	<input type="radio" name="Cplus" value=" "> C++<br><br>
        	<input type="radio" name="other" value=" "> Other </p> 
                
         </div>
    <div class="cleaner_with_divider">&nbsp;</div>
 
    </div>

    <!-- end of column one -->
    
   	<div id="content_column_two">
    
  		 <div class="column_two_section">
  		    <br>


			<h1><center><?php echo $jsn[$i]['USER_NAME'];?>'s Profile</center></h1>
			<form>
				<input type="button" name="follow" value="" hidden="follow">
				<input class="button"  type="submit" value="Follow">

			</form>
			<p>
				<tr>
	                    <td><p> Profile Picture : &nbsp &nbsp
	                    <?php //echo $jsn[$i]['PRO_PIC'];  ?>
	                    <img width="100px" height="100px" src="<?php echo $jsn[$i]['PRO_PIC'];  ?>">
	                     </p> </td>
	           </tr>
	           <br>
				<tr>
	                    <td><p>  Name :  &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
	                    <?php echo $jsn[$i]['FULL_NAME'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>  User Name : &nbsp  &nbsp&nbsp &nbsp

	                    <?php echo $jsn[$i]['USER_NAME'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	            <tr>
	                    <td><p>  Email Address :&nbsp &nbsp
	                    <?php echo $jsn[$i]['EMAIL'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>  Mobile Number :&nbsp 
	                    <?php echo $jsn[$i]['MOBILE'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>  Date of Birth : &nbsp &nbsp
	                    <?php echo $jsn[$i]['DOB'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>Gender : &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp 
	                    <?php echo $jsn[$i]['GENDER'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>Address : &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
	                    <?php echo $jsn[$i]['ADDRESS'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>Country : &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
	                    <?php echo $jsn[$i]['COUNTRY'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>State : &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp
	                    <?php echo $jsn[$i]['CITY'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
	           <tr>
	                    <td><p>User Number : &nbsp 
	                    <?php echo $jsn[$i]['USER_ID'];  

	                    $user_id=$jsn[$i]['USER_ID'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
           </p>

           <br><br>               
       </div>

<!-- end of Profile view -->


						    <?php 

						    				//require("oracle_to_json.php");
						    				$jsonData= getJSONFromDB("SELECT * FROM post_tab WHERE USER_ID='".$user_id."'");
											//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
											//echo $jsonData;
											$jsn1=json_decode($jsonData,true);

											//echo sizeof($jsn);

													for($k=sizeof($jsn1)-1;$k>0;$k--) {

											    $pid=$jsn1[$k]['POST_ID'];

											   // echo $pid ;

												?>
												 <div class="column_two_section">

												 
												 <p class="p"> <?php echo $jsn1[$k]['POST_HEADLINE']; ?>  </p>
												 <?php
												
												
												//echo "<p> {$jsn[$i]['POST_HEADLINE']}  </p>"; 
												echo"<br>";
												echo "<p>Posted at: &nbsp</P>";
												echo "<p> {$jsn1[$k]['DATE_TIME']} 
												</p>"; ?>

<!--Edit button -->

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

<!--Delete button -->												

												
												<button type="button" name="deleteP" class="button" onclick="delete_post(this.value)" value="<?php echo $pid ?>" >Delete</button>
												<script type="text/javascript">
																    	function delete_post(deleteP) {
																	  var xhttp = new XMLHttpRequest();
																	  xhttp.onreadystatechange = function() {
					 												   if (this.readyState == 4 && this.status == 200) {
					  												    document.getElementById("content_column_two").innerHTML = this.responseText;
					  												  }
					 												 };
																	  xhttp.open("GET", "delete_post.php?deleteP="+deleteP, true);
																	  xhttp.send();
																	}

												</script>




												<?php 
												echo"<br>";
												//echo"<p>=================================================</p>";
												echo "<p> {$jsn1[$k]['POST']}</p>";
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
						        
		    </div> 

    <!-- end of column two -->

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

</body>
</html>


		
<!--
		
			
           -->
           
           <?php
       }
      
           ?>