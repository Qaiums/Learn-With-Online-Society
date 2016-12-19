<?php
/*

//session_start();
require("oracle_to_json.php");
//$v=$_SESSION['email'];
//$v1=$_SESSION['pass'];


$jsonData= getJSONFromDB();
$jsn=json_decode($jsonData,true);

echo $jsn;

for($i=0;$i<sizeof($jsn);$i++)
		echo $jsn[$i]['name']."<br>";
*/

			

				//echo $jsn[$i]['FULL_NAME'];

				 /* 
}

$conn= odbc_connect('lwosdb','lwos','qaium29');

			if (!$conn)
			{
				die ('Error connection !!!');
			}
		 $v=$_SESSION['email'];
		 $v1=$_SESSION['pass'];

		$loginsql = "SELECT * FROM userinfo WHERE EMAIL = '".$v."' AND PASS = '".$v1."'";
		$loginresult=odbc_exec($conn, $loginsql);
		// $name = "";
		//$username="";
		if($row = odbc_fetch_array($loginresult))
		 {
        */
			?>


		<?php
				session_start();
			require("oracle_to_json.php");
			$v=$_SESSION['email'];
			$v1=$_SESSION['pass'];


			$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = '".$v."' AND PASS = '".$v1."'");
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
	                    <?php echo $jsn[$i]['USER_ID'];  ?>
	                     </p> </td>
	           </tr>
	           <br>
           </p>

           <br><br><br><br><br><br><br><br><br><br><br><br>
               
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

</body>
</html>


		
<!--
		
			
           -->
           
           <?php
       }
      
           ?>