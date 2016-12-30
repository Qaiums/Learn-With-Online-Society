<br/><br/><br/><br/>

<?php /*
$target_dir = "uploads/";
$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
echo $_FILES["fileToUpload"]["name"]."<br>";
$uploadOk = 1;
// Check if image file is a actual image or fake image
if (file_exists($target_file)) {
    echo "Sorry, file already exists<br>";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "File size exceeded<br>";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded<br>";
}
else{
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$sql="insert into test values(null,".$target_file."')";
		echo $sql."<br>"; //your file is uploaded into server,now execute the sql to keep record in db
        echo "The file ".  $_FILES["fileToUpload"]["name"]. " has been uploaded<br>";
    }else {
        echo "Sorry, there was an error uploading your file<br>";
    }
}

*/
?>



 <center>
 <br/><br/>
 <input type="button" onclick="location.href='login.php';" value=" Goto Login "/></center>

<?php 
session_start();
	
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

	//echo $_SESSION['reg_flag'] ; 


   //echo  $_SESSION['pass_flag'] ; 

   

	if($_SESSION['reg_flag']==1 && $_SESSION['pass_flag']==1 )
	{

   
	
	$delivDate = date('d-M-Y', strtotime($_POST['dob']));


	$conn= odbc_connect('lwosdb','lwos','qaium29');

	if (!$conn)
	{
		die ('Error connection !!!');
	}


$plsql= "insert into userinfo (user_id,user_role,full_name,user_name,dob,gender,mobile,email,address,country,city,pass)
		     values(user_id.nextval,'user','".$_POST['name']."','".$_POST['uname']."','".$delivDate."','".$_POST['gender']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['address']."','".$_POST['country']."','".$_POST['state']."','".$_POST['pass']."')";

  																												//,'".$target_file."')
    $regresult=odbc_exec($conn, $plsql);
 ?>  <h2> Successfully Registred...</h2> <?php 

	odbc_close($conn);
	}

	else 
	{

		 ?>  <h2>Your registration is not completed. Please Register Properly. Please go back and make parfect your registration. </h2> <?php 
	
	}

	 
	



?>

