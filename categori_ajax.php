 <?php
session_start();

	require("oracle_to_json.php");	

	$category=$_GET['category'];							
		$jsonDataCata= getJSONFromDB("SELECT POST FROM POST_TAB WHERE CATEGORIES='".$category."'");
											//$jsonData= getJSONFromDB("SELECT * FROM userinfo WHERE EMAIL = 'qaium69@yahoo.com' AND PASS = '123'");
											//echo $jsonData;
			$jsnCata=json_decode($jsonDataCata,true);

											//echo sizeof($jsn);

				for($i=sizeof($jsnCata)-1;$i>=0;$i--)
						 {

					echo $jsnCata[$i]['POST']."<br>";

											   
						}



          
  ?>