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
if(empty($email) || empty($pass_check) || empty($fname) || empty($lname) || empty($phone) || empty($address) || empty($date))
{
    echo "error";
}
else
{
    $comp=$conn->query("select * from user where email='".$email."'");
    if($comp)
    {
        if(mysqli_num_rows($comp)>0)
        {
            echo "<p>failure</p>";
        }
        else
        {
            $result = $conn->query("insert into user(password,address,dob,email,phone,firstname,lastname) values('".$pass."','".$address."','".$date."','".$email."','".$phone."','".$fname."','".$lname."')");
            if($result)
                echo "<p>success</p>";
            else{
                echo "error";
            }
        }
    }
}
?>