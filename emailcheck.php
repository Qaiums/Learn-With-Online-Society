<?php
$conn= odbc_connect('lwosdb','lwos','qaium29');
session_start();

$_SESSION['email_flag']=0 ; 

$email=$_GET['email'];
// var_dump($email);

	if (!$conn)
	{
		die ('Error connection !!!');
	}
    

   $sql = "SELECT EMAIL FROM USERINFO WHERE  email = '".$_GET['email']."'";
	$result=odbc_exec($conn, $sql);
	$row =odbc_fetch_array($result);


	if ($row['EMAIL'] != "")
		
	{
		
		echo "email address is not available.";
			return false;


	}

	else 
		{
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
			echo "Unique But Invalidalid";
			return false;

			} else {
			echo "Valid";
			//$_SESSION['email_flag']=1 ; 

			return true;
			}

			
		}
		
	  odbc_close($conn);

?>







