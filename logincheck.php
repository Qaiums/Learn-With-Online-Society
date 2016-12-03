<center>
<?php
	session_start();

    $_SESSION['email']=$_POST['email'];
    $_SESSION['pass']=$_POST['pass'];

    
    if (isset ($_SESSION['pass']))
	{
    header("location:home.php");

    }
   
		
	?>
	</center>
		