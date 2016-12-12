
<br/>
<br/>
<center>
<?php
session_start();

if (isset ($_SESSION['pass']))
	{
	session_destroy();
    echo"Thank You";
	}
	else
	{
    echo "You are out of session.";
	}	
header('location:login.php');
?>
<br/>
<br/>



</center>