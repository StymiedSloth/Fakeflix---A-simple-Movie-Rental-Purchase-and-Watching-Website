<?php
require 'dbaccess.php';
$email = $_POST['email'];
$pass = md5($_POST['pass']);
$pass_check=$pass;
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$date = $_POST['date'];

$result = $conn->query("insert into user(password,address,dob,email,phone,firstname,lastname) values('".$pass."','".$address."','".$date."','".$email."','".$phone."','".$fname."','".$lname."')");
if($result)
    echo "<p>success</p>";
else{
    echo "error";
}
        
?>