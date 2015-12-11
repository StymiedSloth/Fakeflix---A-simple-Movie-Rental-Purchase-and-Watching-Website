<?php
require 'dbaccess.php';

if(isSet($_POST['username']))
{
$username = $_POST['username'];


$result = $conn->query("select * from user where email='$username'");
$urow = $result->fetch_assoc();
if($urow)
{
echo '<font color="red">The nickname <STRONG>'.$username.'</STRONG> is already in use.</font>';
}
else
{
echo 'OK';
}

}
?>