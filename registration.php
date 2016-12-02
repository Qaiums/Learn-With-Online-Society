

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
            <li><a href="index.php"  class="current">Home</a></li>
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
        	<h1>Categories</h1>
            <ul>
                <li><a href="#">Oracle </a></li>
                <li><a href="#">PHP</a></li>
                <li><a href="#">Java</a></li>
                <li><a href="#">C#</a></li>
                <li><a href="#">C++</a></li>
                
            </ul>                  
        </div>
        
        <div class="cleaner_with_divider">&nbsp;</div>
        
        
     
    </div>

    <!-- end of column one

javascript code start
     -->


 

    
<div id="content_column_two">
    
    	<div class="column_two_section">
			<center>
                <script type="text/javascript" src="javascript.js"></script>

                

                      <form name="myForm" action="#" onsubmit="return validateForm()" method="post">
                      
                    <h1>Your Info To Submit</h1>
                    <table>
                    <tr>
                    <td><p>Name :</p></td>
                    <td><input  type="text"  name="name"  value =""/>
                    </td>
                    </tr>
                    <tr>
                    <td><p>User Name  :</p></td>
                    <td><input type="text" name="uname" value =""/>beng 

                    </td>
                    </tr>

                    <tr>
                    <td><p>DOB :</p></td>
                    <td><select  name="day">
                        <?php
                        if ($day == "")
                        {
                            echo "<option value=''>Select Day</option>";
                            for ($i = 1; $i<=31; $i++)
                            {
                                echo "<option value='".$i."'>".$i."</option>";
                            }
                        }
                        else
                        {
                            echo "<option value='".$day."'>".$day."</option>";
                        }
                        ?>
                        </select>
                        <select name="month">
                        <?php
                        if ($month == "")
                        {
                            echo "<option value=''>Select Month</option>";
                            for ($i = 1; $i<=12; $i++)
                            {
                                echo "<option value='".$i."'>".$i."</option>";
                            }
                        }
                        else
                        {
                            echo "<option value='".$month."'>".$month."</option>";
                        }
                        ?>
                        </select>
                        <select  name="year">
                        <?php
                        if ($year == "")
                        {
                            echo "<option value=''>Select Year</option>";
                            for ($i = 1900; $i<=2016; $i++)
                            {
                                echo "<option value='".$i."'>".$i."</option>";
                            }
                        }
                        else
                        {
                            echo "<option value='".$year."'>".$year."</option>";
                        }
                        ?>
                        </select>
                        
                        </td>
                        </tr>
                        
                    <tr>
                    <td><p>Gender:</p></td>
                    <td><input type="radio" name="gender" value="male" /> <p>Male</p>
                    <input type="radio" name="gender" value="female"/><p>Female</p>
                    </td>
                    </tr>
                    <tr>
                    <td><p>Phone :</p></td>
                    <td>
                    <input type="text" name="phone" value =""/>

                    </td>
                    </tr>

                    <tr>
                    <td><p>Email ID :</p></td>
                    <td>
                    <input type="email" name="email" value =""/>


                    </td>
                    </tr>

                    <tr>
                    <td><p>Address :</p></td>
                    <td>
                    <input type="text" name="address" value =""/>

                    </td>
                    </tr>
                     <tr>
                    <td><p>Country :</p></td>
                    <td>
                    <select type="text" value="">
                        <option value='' >Bangladesh</option>
                        <option value='' >India</option>
                        <option value='' >Japan</option>
                        <option value='' >Saudi Arabia</option>
                        <option value='' >USA</option>
                        <option value='' >UK</option>
                        <option value='' >Italy</option>
                        <option value=''>Australia</option>
                        <option value=''>Other</option>
                    </select>

                    </td>
                    </tr>

                    <tr>
                    <td><p>State :</p></td>
                    <td>
                    <select name= state>
                        <option value=''>Select State</option>
                        <option value=''>Dhaka</option>
                        <option value=''>Chitagong</option>
                        <option value=''>Sylhet</option>
                        <option value=''>Rajshahi</option>
                        <option value=''>Khulna</option>
                        <option value=''>Borishal</option>
                        <option value=''>Rongpur</option>
                        <option value=''>Other</option>
                    </select>

                    </td>
                    </tr>

                    <tr>
                    <td><p>Password :</p></td>
                    <td><input type="password" name="pass"/></td>
                    </tr>

                    <tr>
                    <td><p>Confirm Password :</p></td>
                    <td><input type="password" name="confirmPass"/>

                    </td>
                    </tr>

                    <tr>
                    <td><p>Profile Picture :</p>
                    </td>
                    <td>

                    </td>
                    </tr>
                    </table>

                    
                    <input type="submit" value="Submit"/>
                    </form>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>





</center>
               
        </div>
        
    </div> <!-- end of column two -->

    <div id="content_column_three">
    	
        
    	<div class="column_three_section">
            <h1>Popular Posts</h1>
            
        </div>
               
        <div class="cleaner_with_divider">&nbsp;</div>
        
        <div class="column_three_section">
            <h1>About This Blog</h1>
            <p>Hallo all <a href="#">read more</a></p>
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

