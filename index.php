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
            <li><a href="" >Profile</a></li>
            <li><a href="" >Follower</a></li>            
            <li><a href="" >Following</a></li>  
            <li><a href="" >About Us</a></li> 
            <li><a href="" >Contact Us</a></li>
            <li><a href="login.php" >Login</a></li>  
            <li><a href="registration.php" >Register</a></li>                       
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
			<h1>Pin Post</h1>
			<p>amar name qaium. ami ai website ta develope korar try korci. In sha allah very soon I will complete it.</p>
               
        </div>
    


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
                                              //  echo"<br>";
                                               echo"<p>...................................................................................................................</p>";
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

<script type="text/javascript">
	function login()
	{
		document.getElementById("posts").innerHTML=
	}
</script>


</body>
</html>
