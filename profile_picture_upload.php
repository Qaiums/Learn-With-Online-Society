<?php 
session_start();

$target_dir = "uploads/";
echo $target_file = $target_dir.$_FILES["fileToUpload"]["name"];
echo $_FILES["fileToUpload"]["name"]."<br>";
$uploadOk = 1;
// Check if image file is a actual image or fake image
if (file_exists($target_file)) {
    echo "Sorry, file already exists<br>";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "File size exceeded<br>";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded<br>";
}
else{
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$sql="insert into test values(null,".$target_file."')";
		echo $sql."<br>"; //your file is uploaded into server,now execute the sql to keep record in db
        echo "The file ".  $_FILES["fileToUpload"]["name"]. " has been uploaded<br>";
    }else {
        echo "Sorry, there was an error uploading your file<br>";
    }
}




    $conn= odbc_connect('lwosdb','lwos','qaium29');

    if (!$conn)
    {
        die ('Error connection !!!');
    }


$plsql= "update userinfo  set PRO_PIC='".$target_file."' where user_id='".$_SESSION['user_id']."' ";

echo $plsql;
                                                                                                                //,'".$target_file."')
    $regresult=odbc_exec($conn, $plsql);

 ?>  <h2> Successfully Registred...</h2> <?php 


    odbc_close($conn);

    header("location:profile.php");

    ?>