		<?php 
		session_start();

		$conn= odbc_connect('lwosdb','lwos','qaium29');

			if (!$conn)
			{
				die ('Error connection !!!');
			}
		 $v=$_SESSION['email'];
		 $v1=$_SESSION['pass'];

		 //echo $v;
		 //echo $v1;


		$loginsql = "SELECT * FROM userinfo WHERE EMAIL = '".$v."' AND PASS = '".$v1."'";

		 $loginresult=odbc_exec($conn, $loginsql);
		 $name = "";
		if($row = odbc_fetch_array($loginresult))($name = $row['EMAIL']);
		if($name != "")
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
							<h1>Post:</h1>
										<form >
									  <textarea>write your post...</textarea> 

									  

									  <pre><input class="fileupload" type="file" value="photo"> <input class="button" type="submit" value="Post"></pre>		
									</form>

						               
						    </div>
						    <div class="column_two_section">
									<h1>Pin Post</h1>
									<p>amar name qaium. ami ai website ta develope korar try korci. In sha allah very soon I will complete it.</p>
						               
						    </div>
						    <div class="column_two_section">
									<h1>Pin Post</h1>
									<p>amar name qaium. ami ai website ta develope korar try korci. In sha allah very soon I will complete it.</p>
						               
						    </div>
						    <div class="column_two_section">
									<h1>Pin Post</h1>
									<p>amar name qaium. ami ai website ta develope korar try korci. In sha allah very soon I will complete it.</p>
						               
						    </div>
						    <div class="column_two_section">
									<h1>Pin Post</h1>
									<p>amar name qaium. ami ai website ta develope korar try korci. In sha allah very soon I will complete it.</p>
						               
						    </div>
						    <div class="column_two_section">
									<h1>Pin Post</h1>
									<p>amar name qaium. ami ai website ta develope korar try korci. In sha allah very soon I will complete it.</p>
						               
						    </div>
						    <div class="column_two_section">
									<h1>Pin Post</h1>
									<p>amar name qaium. ami ai website ta develope korar try korci. In sha allah very soon I will complete it.</p>
						               
						    </div>
						    <div class="column_two_section">
									<h1>Pin Post</h1>
									<p>amar name qaium. ami ai website ta develope korar try korci. In sha allah very soon I will complete it.</p>
						               
						    </div>
						        
						    <div class="column_two_section">
									<h1>Pin Post</h1>
									<p>amar name qaium. ami ai website ta develope korar try korci. In sha allah very soon I will complete it.</p>
						                      
						    </div>
						        
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

<script type="text/javascript">
	function login()
	{
		document.getElementById("posts").innerHTML=
	}
</script>


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

