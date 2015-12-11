<?php
require 'sessionaccess.php';

$movieid = $_GET['movieid'];
$isRent = $_GET['isRent'];
if (!array_key_exists($movieid,$_SESSION['cart']))
{
    $_SESSION['cart'][$movieid] = array($movieid, $isRent);
    $_SESSION['cartcount'] = $_SESSION['cartcount'] + 1;
}
else
{
    if($_SESSION['cart'][$movieid][1] != $isRent)
        $_SESSION['cart'][$movieid] = array($movieid, $isRent);
}
echo $_SESSION['cartcount'];
?>