<?php
require 'dbaccess.php';
$title = $_POST['title'];
$descritpion =  $_POST['description'];
$duration = $_POST['duration'];;
$price = $_POST['price'];
$purchase_price = $_POST['purchase_price'];
$rating = $_POST['rating'];
$image_link = $_POST['image_link'];
$trailer_link = $_POST['trailer_link'];
$genre = $_POST['genre'];
$wide_image = $_POST['wide_image'];

$result = $conn->query("insert into movie(title,description,duration,price,purchase_price,rating,image_link,trailer_link,genre,wide_image) values('".$title."','".$descritpion."','".$duration."','".$price."','".$purchase_price."','".$rating."','".$image_link."','".$trailer_link."','".$genre."','".$wide_image."')");
if($result)
    echo "<p>success</p>";
else{
    echo "error";
}
        
?>