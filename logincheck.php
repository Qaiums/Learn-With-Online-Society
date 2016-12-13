
<?php

	session_start();

    $_SESSION['email']=$_POST['email'];
    $_SESSION['pass']=$_POST['pass'];
    $_SESSION['adminEmail']='qaiumaiub@gmail.com';

    /*
    if (isset ($_SESSION['pass']))
	{
    

    } */
  
			require("oracle_to_json.php");
			$v=$_POST['email'];
   			$v1=$_POST['pass'];

			$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = '".$v."' AND PASS = '".$v1."'");
			//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
			//echo $jsonData;
			$jsn=json_decode($jsonData,true);

			for($i=0;$i<sizeof($jsn);$i++) {

				$_SESSION['user_id']= $jsn[$i]['USER_ID'];

				if($jsn[$i]['EMAIL']==$v)
				{
					

					if($jsn[$i]['EMAIL']==$_SESSION['adminEmail'])
					{
						header("location:adminhome.php");
					}
					else
					{
						header("location:home.php");
					}
					
				}



			}
		?>	



	

