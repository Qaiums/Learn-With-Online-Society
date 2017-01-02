<?php 
session_start();
echo $edit_id=$_POST['edit_pro'];
require("oracle_to_json.php");
            $v=$_SESSION['email'];
            $v1=$_SESSION['pass'];


            $jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE USER_ID = '".$edit_id."' ");
            
            $jsn=json_decode($jsonData,true);
            

            for($i=0;$i<sizeof($jsn);$i++) {


?>

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
            <li><a href="home.php" >Home</a></li>
            <li><a href="" >Profile</a></li>
            <li><a href="" >Follower</a></li>            
            <li><a href="" >Following</a></li>  
             <li><a href="aboutus.php" >About Us</a></li> 
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


    <!-- end of column one    -->


 

    
<div id="content_column_two">
    
        <div class="column_two_section">
            <center>
                <script type="text/javascript" src="javascript.js"></script>  <!-- javascript source link   -->

                

            <form name="myForm" action="update_profile.php" onsubmit="return validateForm()" method="post">
                      
                    <h2>EDIT YOUR INFORMATION</h2>
                    <table>
                    <tr>
                    <td><p>Full Name :</p></td>
                    <td><input  type="text"  name="name" placeholder="Name"  value ="<?php echo $jsn[$i]['FULL_NAME']; ?>"/>

                        <input  type="" hidden="user_id" name="user_id" value ="<?php echo $edit_id ; ?>"/>
                    </td>
                    </tr>
                   <tr>
                    <td><p>User Name  :</p></td>
                    <td><input type="text" name="uname" onfocusout="username(this.value)" placeholder="UserName" value =" <?php echo $jsn[$i]['USER_NAME'];  ?>"/><div id="demo"></div>

                    </td>
                    </tr>

                              <script type="text/javascript">
                            
                                function username(str)
                                {
                                    //alert("test");
                                    var xhttp;
                                    if(str.length==0)
                                    {
                                        document.getElementById('demo').innerHTML=" ";
                                        return ;
                                    }
                                    xhttp= new XMLHttpRequest();
                                    xhttp.onreadystatechange=function()
                                    {   
                                        if (xhttp.readyState== 4 && xhttp.status==200)
                                        {
                                            document.getElementById("demo").innerHTML=this.responseText;
                                        }
                                    };
                                    xhttp.open("GET","username_check.php?uname="+str,true);
                                    xhttp.send();
                                    
                                }
                              </script>


                    <tr>
                    <td><p>DOB :</p></td>
                    <td>
                   
                    <input type="date" name="dob" placeholder="Date of Birth" value=" <?php echo $jsn[$i]['DOB'];  ?>">
                    
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
                    <input type="text" name="phone"  placeholder="Phone Number" value =" <?php echo $jsn[$i]['MOBILE'];  ?>"/>

                   

                    </td>
                    </tr>

                    <tr>
                    <td><p>Email ID :</p></td>
                    <td>
                    <input type="email" name="email" value="  <?php echo $jsn[$i]['EMAIL'];  ?>" placeholder="Email" onblur="return checkmail(this.value)"/> <div id="txtHint"></div>
                    </td>
                    </tr>


                             
                    <tr>
                    <td><p>Address :</p></td>
                    <td>
                    <input type="text" name="address" placeholder="Address" value =" <?php echo $jsn[$i]['ADDRESS'];  ?>"/>

                    </td>
                    </tr>
                     


                   <tr>
                    <td>
                    <p class="p">Please Input your Password</p>
                    <p>Password : </p></td>
        <td><input type="password" placeholder="Password" onfocusout="password(this.value)" name="pass"/></td> 
          <div id="demo1"></div>
                    </tr>

                   
                            <script type="text/javascript">
                            
                                function password(str)
                                {
                                    //alert("test");
                                    var xhttp;
                                    if(str.length==0)
                                    {
                                        document.getElementById('demo1').innerHTML=" ";
                                        return ;
                                    }
                                    xhttp= new XMLHttpRequest();
                                    xhttp.onreadystatechange=function()
                                    {   
                                        if (xhttp.readyState== 4 && xhttp.status==200)
                                        {
                                            document.getElementById("demo1").innerHTML=this.responseText;
                                        }
                                    };
                                    xhttp.open("GET","passwordcheck.php?pass="+str,true);
                                    xhttp.send();
                                    
                                }
                                </script>



                    <tr>
                    <td><p>Confirm Password :</p></td>
                    <td><input type="password" placeholder="Confirm Password" name="confirmPass"/>

                    </td>
                    </tr> 
<!--
                    <tr>
                    <td><p>Profile Picture :</p>
                    <td>          
                    <input type="file" name="fileToUpload" id="fileToUpload">
                           
                    </td>
             
                    </td>  -->

                    </table>

        
                    <br>

                    <input type="submit" value="Update"/>
                    </form>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>





</center>
               
        </div>
        
</div> 


<!-- end of column two -->

        <div id="content_column_three">

             <div class="column_three_section">
            <h2>About This Blog</h2>
            <p>Hallo All </p>
            </div>  
          
         </div> <!-- end of column three -->  
    
            
</div> <!-- end of content -->

        <div id="bottom_panel">
         <center>
            <div class="bottom_panel_section">
                <a href="#">Home</a> | <a href="#">Profile</a> | <a href="#"> Follower</a> | <a href="#">Following </a>| <a href="#">About Us</a> | <a href="#">Contact Us</a><br /><br />
                <p> Copyright © 2016 </p> <a href="#"><strong>Muhammad Abdul Qaium</strong></a></div>
                </center>
    
        </div>
         <!-- end of bottom panel -->


</body>

 <?php 

}
   ?>

   
