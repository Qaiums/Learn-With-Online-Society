<?php
$conn= odbc_connect('lwosdb','lwos','qaium29');

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
		
		echo "<p>email address is not available. please use another email.</p>";
		return false;

	}

	else 
		{
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
			echo "<p>UniqInvalidalid</p>";
			return false;

			} else {
			echo "Valid";
			return true;
			}

			
		}
		
	  odbc_close($conn);

?>







