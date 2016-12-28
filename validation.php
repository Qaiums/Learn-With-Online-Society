<?php
$value = $_GET['query'];
$formfield = $_GET['field'];
// Check Valid or Invalid user name when user enters user name in username input field.
if ($formfield == "fullname") {
if (strlen($value) < 7 ) {
echo "Must be 7+ letters";
} else {
echo "<span>Valid</span>";
}
}

if ($formfield == "username") {
if (strlen($value) < 4) {
echo "Must be 3+ letters";
} else {
echo "<span>Valid</span>";
}
}



// Check Valid or Invalid password when user enters password in password input field.
if ($formfield == "password") {
if (strlen($value) < 6) {
echo "Password short";
} else {
echo "<span>Strong</span>";
}
}

if ($formfield == "conpass") {
if ("password"== "conpass") {
echo "Password not match";
} else {
echo "<span>matched</span>";
}
}

//var phoneno = /^\d{10}$/; 




if ($formfield == "phone") {

if (!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $value)) {
echo "Invalid phone";
} else {
echo "<span>Valid</span>";
}
}

// Check Valid or Invalid email when user enters email in email input field.
if ($formfield == "email") {
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) {
echo "Invalid email";
} else {
echo "<span>Valid</span>";
}
}
// Check Valid or Invalid website address when user enters website address in website input field.

?>