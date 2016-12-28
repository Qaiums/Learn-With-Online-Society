

<?php
$conn= odbc_connect('lwosdb','lwos','1234');

	if (!$conn)
	{
		die ('Error connection !!!');
	}
    

   $sql = "SELECT count(*) AS C FROM USERINFO WHERE  email = '".$_GET['email']."'";
	$result=odbc_exec($conn, $sql);
	$row =odbc_fetch_array($result);
	if ($row['C'] > 0)
		
	{
		echo "<p>".$row['C']."</p>";
		echo "<p>email address is available. please use another email.<p>";
		return false; 

	}

	else 
		{
			echo "<p>Nothing</p>";
		}
		
	  odbc_close($conn);

?>