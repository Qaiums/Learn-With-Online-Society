<?php
$username=$_GET['uname'];


if (strlen($username) < 4) {
echo "<p>Must be 3+ letters</p>";
} else {
echo "<p>Valid</p>";
}

?>