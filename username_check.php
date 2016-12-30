
<?php
session_start();

$_SESSION['reg_flag']=0 ; 

$username=$_GET['uname'];

if (strlen($username) < 4) {
	$_SESSION['reg_flag']=0 ;
echo "<p>Must be 3+ letters</p>";

} else {

$_SESSION['reg_flag']=1;
echo "<p>Valid</p>";
}

?>



<script type="text/javascript">


	
 function username()
    {  
       if (uname == "" && uname.length < 4) {
        alert("user name must be filled out");
        return false;
    } 
    }

</script>