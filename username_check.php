
<?php
session_start();

//$_SESSION['reg_flag']=0 ; 

$username=$_GET['uname'];
$flag=true ;

if (strlen($username) < 4) {
	//$_SESSION['reg_flag']=0 ;
echo "Must be 3+ letters";
 return $falg=false ;



} else {

$_SESSION['reg_flag']=1;
echo "Valid";
return $flag=true ;
}

?>

