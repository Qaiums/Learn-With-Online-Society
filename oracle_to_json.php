
<?php /*
function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","record");
	
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
} */
?>

<?php
function getJSONFromDB($sql)
{
$conn= odbc_connect('lwosdb','lwos','qaium29');

 $result  = oci_parse($conn,$sql) or die ('Error connection!!!');
echo $result;
oci_execute($result);

$rows = array();
while($r = oci_fetch_assoc($result)) {
$rows[] = $r;
 }
return json_encode($rows);	
}

?>	