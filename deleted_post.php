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
            <li><a href="aboutus.php" >About Us</a></li>          
            <li><a href="logout.php" >Logout</a></li>  
            <li> 


			
			</li>
                                
        </ul> 
           
    </div>

</div>

<form>
	<p class="p"> Recent Deleted/Update/Alter Posts </p> <br>
	<p class="p"> --------Headlins-------------Post----------------Posted by-------------Date------------Action Type-------Action Date-----------IP Address------- </p>
<?php 

$jsonDataEdit= getJSONFromDB("SELECT * FROM POST_TAB_AUDIT ORDER BY ACTION_DATE ASC"); 
	
											
			$jsndata=json_decode($jsonDataEdit,true);

			  	for($j =sizeof($jsndata)-1;$j>=0;$j--) { 

?> 
 

<br> 
		
	  <input type="" name="" value="<?php echo $jsndata[$j]['POST_HEADLINE']  ; ?>"> 
	  <input type="" name="" value="<?php echo $jsndata[$j]['POST']  ; ?>">
  
      <input type="" name="" value="<?php echo $jsndata[$j]['USER_NAME_POST']  ; ?>"> 
      <input type="" name="" value="<?php echo $jsndata[$j]['DATE_TIME']  ; ?>"> 
      <input type="" name="" value="<?php echo $jsndata[$j]['ACTION_TYPE']  ; ?>"> 
      <input type="" name="" value="<?php echo $jsndata[$j]['ACTION_DATE']  ; ?>"> 
      <input type="" name="" value="<?php echo $jsndata[$j]['IP_ADDRESS']  ; ?>"> 
    
   
				

			  		
<?php

			  	}


?>




</form>


<!-- *************************colum One start ****************************************-->


						    <!-- end of column three -->   
						    
			<div class="cleaner">&nbsp;</div>
	           

						<div id="bottom_panel">
						   <center>
							    <div class="bottom_panel_section">
							    	<a href="#">Home</a> | <a href="#">Profile</a> | <a href="#"> Follower</a> | <a href="#">Following </a>| <a href="#">About Us</a> | <a href="#">Contact Us</a><br /><br />
							        <p> Copyright © 2016 </p> <a href="#"><strong>Muhammad Abdul Qaium</strong></a>
						        </div>
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
