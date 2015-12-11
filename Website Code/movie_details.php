<?php
    require 'dbaccess.php';
    require 'sessionaccess.php';
    $movieid = $_GET['movieid'];
    $uid = $_SESSION['uid'];
    $movieresult = $conn->query("select * from movie where movie_id='$movieid'");
    $row = $movieresult->fetch_assoc();
    $curdate = date('Y-m-d H:i:s');
    
    $ordercount = $conn->query("select count(*) as count from orders where customer_id='$uid' and movie_id='$movieid' and due_date > '$curdate' ORDER BY due_date DESC 
LIMIT 1");
    $ordercountrow = $ordercount->fetch_assoc();
    
    $orderresult = $conn->query("select * from orders where customer_id='$uid' and movie_id='$movieid' and due_date > '$curdate' ORDER BY due_date DESC 
LIMIT 1");
    $orderrow = $orderresult->fetch_assoc();
    
    $movieactors = $conn->query("SELECT actor_name FROM actors a, movie_actors ma WHERE ma.movie_id='$movieid' and a.actor_id=ma.actor_id");
    // $actorsrow = $movieactors->fetch_assoc();

    $moviedirectors = $conn->query("SELECT director_name FROM directors a, movie_directors ma WHERE ma.movie_id='$movieid' and a.director_id=ma.director_id");
    // $directorsrow = $moviedirectors->fetch_assoc();

    $movieproducers = $conn->query("SELECT producer_name FROM producers a, movie_producers ma WHERE ma.movie_id='$movieid' and a.producer_id=ma.producer_id");
    // $producersrow = $movieproducers->fetch_assoc();
?>

<html>
    <head>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type="text/javascript" src="jquery.countdown.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {		            
            $(".form-div").click(function(){
                var $form = $(this).find('form');
                $form.submit();
            });
            
      
            $('#cartcount').click(function(){
                window.location = "payment_page.php";
            });
            
            $('.site_title').click(function(){
                window.location = "movies_main.php";
            });
        });
        </script>
        
    </head>
    <body>
        <?php include 'header.php' ?>
        <div>
            <div class="banner_movie">
                <img class="banner_image" width="100%" src="<?php echo $row['wide_image']; ?>" />
                <h1> <span><?php echo $row['title']; ?> <br/>
                <?php echo $row['duration']; ?> <br/>
                <?php 
                        $val = $row['rating'];
                        for ($x=0; $x<$val; $x++) {
                        echo "<img width='48px' height='48px' src='images/star.png' </img>"; 
                        }
                    ?></span></h1>
            </div>            
            <?php include 'rentorpurchase_logic.php' ?>
            
            <p> <b>Synopsis</b> <br/> <?php echo $row['description']; ?></p>
            
            <p> <b>Genre</b> <br/> <?php echo $row['genre']; ?></p>  
            
            <p><b>Trailer</b> <br/><?php echo $row['trailer_link']; ?></p>
            
            <p><b>Actors</b> <br/>
            <?php
                $actorsinmovie = "";
                while($row = $movieactors->fetch_assoc()) {
                    $actorsinmovie = $actorsinmovie . $row['actor_name']." ,"; 
                }
                echo rtrim($actorsinmovie, ",");
            ?>
            </p>
            
            <p><b>Directors</b> <br/>
            <?php
                $directorsinmovie = "";
                while($row = $moviedirectors->fetch_assoc()) {
                    $directorsinmovie = $directorsinmovie . $row['director_name']." ,"; 
                }
                echo rtrim($directorsinmovie, ",");
            ?>
            </p>
            
            <p><b>Producers</b> <br/>
            <?php
                $producersinmovie = "";
                while($row = $movieproducers->fetch_assoc()) {
                    $producersinmovie = $producersinmovie . $row['producer_name']." ,"; 
                }
                echo rtrim($producersinmovie, ",");
            ?>
            </p>
        </div>
    </body>
</html>