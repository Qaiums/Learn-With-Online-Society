

<?php
$conn= odbc_connect('lwosdb','lwos','1234');

$email=$_GET['email'];

	if (!$conn)
	{
		die ('Error connection !!!');
	}
    

   $sql = "SELECT EMAIL FROM USERINFO WHERE  email = '".$_GET['email']."'";
	$result=odbc_exec($conn, $sql);
	$row =odbc_fetch_array($result);
	if ($row['EMAIL'] != "")
		
	{
		
		echo "<p>email address is not available. please use another email.<p>";
		//return false; 

	}

	else 
		{
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
			echo "<p>UniqInvalidalid</p>";

			} else {
			echo "<span>Valid</span>";
			}

			
		}
		
	  odbc_close($conn);

?>







