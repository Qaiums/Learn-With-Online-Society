
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

?>
<br/>
<br/>
<input type="button" onclick="location.href='login.php'"; name="" value=GotoLogin />

</center>