<?php
require 'sessionaccess.php';

$movieid = $_GET['movieid'];


unset($_SESSION['cart'][$movieid]);
// var_dump($_SESSION['cart']);
$_SESSION['cartcount'] = $_SESSION['cartcount'] - 1;
echo "<p>success</p>";
?>