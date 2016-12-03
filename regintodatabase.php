<br/><br/><br/><br/>
 <center><h2> Successfully Registred...</h2>
 <br/><br/>
 <input type="button" onclick="location.href='login.php';" value=" Goto Login "/></center>
<?php 

	
	$name=$_POST['name'];
	$username=$_POST['uname'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$country=$_POST['country'];
	$state=$_POST['state'];
	$pass=$_POST['pass'];
	$pp=$_POST['propic'];

	
    $delivDate = date('d-M-Y', strtotime($_POST['dob']));


    
                     

	$conn= odbc_connect('lwosdb','lwos','qaium29');

	if (!$conn)
	{
		die ('Error connection !!!');
	}


	$plsql= "insert into userinfo (user_id,user_role,full_name,user_name,dob,gender,mobile,email,address,country,city,pass,pro_pic)
             values(user_id.nextval,'user','".$_POST['name']."','".$_POST['uname']."','".$delivDate."','".$_POST['gender']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['address']."','".$_POST['country']."','".$_POST['state']."','".$_POST['pass']."','".$_POST['propic']."') ";

    //echo $plsql;
    $regresult=odbc_exec($conn, $plsql);


    //echo $result;

    //login from database

    





	odbc_close($conn);

?>