<?php
require 'sessionaccess.php';
require 'dbaccess.php';

$itemid = $_GET['itemid'];
$action = $_GET['action'];

if($action == "movie")
{   
    $result = $conn->query("DELETE FROM movie WHERE movie_id = '$itemid'");
    if($result)
        echo "<p>success</p>";
    else{
        echo "<p>error</p>";
    }
}
else{
    $result = $conn->query("DELETE FROM user WHERE customer_id = '$itemid'");
    if($result)
        echo "<p>success</p>";
    else{
        echo "<p>error</p>";
    }
}

?>