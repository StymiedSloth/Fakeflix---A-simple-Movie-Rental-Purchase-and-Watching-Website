<?php
require 'dbaccess.php';

$searchterm = $_GET['searchterm'];
$searchtype = $_GET['searchtype'];
if($searchtype == "moviename")
    $sql = "SELECT * FROM movie where title like '%$searchterm%'";
elseif($searchtype == "genre")
    $sql = "SELECT * FROM movie where genre like '%$searchterm%'";
else
    $sql = "SELECT * FROM movie where rating = '$searchterm'";
$movieresult = $conn->query($sql);
$rows = array();
$returnstring = "<table class='carttable' id='tableofmovies' style='margin-left:20px;'>".
            "<tr><th colspan='2'>Movie</th>".                    
                "<th>Duration</th>".
                "<th>Genre</th>".
                "<th>Rating</th>".
                "<th>&nbsp;</th>".
                "</tr>";

if ($movieresult->num_rows > 0) {
    // output data of each row
    while($row = $movieresult->fetch_assoc()) {
            //$rows[] = $row;
            $returnstring .= "<tr>".
                "<td colspan='2' style='width:30%;'>" .
                "<img style='float:left;display:inline-block;height:100px;width:auto;' src='".$row['image_link'] ."' />".
                "<p class='cart_movie_title'>" . $row['title'] . "</p></td>".
                "<td>".$row['duration']."</td>".
                "<td>".$row['genre']."</td>".
                "<td>".$row['rating']." / 5</td>".
                "<td><form class='proform' action='movie_details.php' method='get'>".
                "<input type='hidden' name='movieid' value=". $row['movie_id'] ." />".                    
                "<input class='moredetails' type='submit' value='more details' />".
                "</form></td>".
                "</tr>";
    }
}
else {
    $returnstring.= "<tr><td colspan='2' style='width:30%;'><p class='cart_movie_title'>NO RESULTS</p></td>&nbsp;<td>&nbsp;</td>&nbsp;<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
}

echo $returnstring."</table>";
//print json_encode($rows);
$conn->close();
?>