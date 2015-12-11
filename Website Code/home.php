<?php
require 'dbaccess.php';
$movieresult = $conn->query("select * from movie");

$pickresult = $conn->query("select * from movie where movie_id='7'");
$pickedrow = $pickresult->fetch_assoc();

?>
<html>
<head>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="owl/owl.carousel.css" type="text/css" />
    <!-- Default Theme -->
    <link rel="stylesheet" href="owl/owl.theme.css" type="text/css" />
    <!-- Include js plugin -->
    <script type="text/javascript" src="owl/owl.carousel.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {		
        $(".form-div").click(function(){
            var $form = $(this).find('form');
            $form.submit();
        });
        
        $(".banner_movie").click(function(){
            window.location = "login.php";
        });
        
        $("#owl-example").owlCarousel(
            { items : 9, 
              itemsDesktop : [1400,7], 
              itemsDesktopSmall : [1100,5], 
              itemsTablet: [700,3], 
              itemsMobile : [400,1],
              navigation : true,
             scrollPerPage : true,
             navigationText : false
            }
        );
    });
	</script>

    
</head>
<body>

    <?php include 'header.php' ?>
    <h1 id="movies_main_h1">WATCH THESE MOVIES</h1>
    <div id="owl-example" class="owl-carousel" style="margin-left:20px;margin-top:-20px;">
        <?php
            if ($movieresult->num_rows > 0) {
                // output data of each row
                while($row = $movieresult->fetch_assoc()) {
        ?>
            <div class="form-div">
                <form class="proform" action="movie_details.php" method="get">
                    <input type="hidden" name="movieid" value="<?php echo $row['movie_id'] ?>" />                    
                </form>
                <img style="height:200px;width:auto;" src="<?php echo $row['image_link']; ?>" /> 
            </div>
        <?php
                }
            } else {
                echo "";
            }
        ?>
    </div>
    
    <div class="banner_movie" style="cursor: pointer; cursor: hand;">
        <img class="banner_image" width="100%" src="<?php echo $pickedrow['wide_image']; ?>" />
        <h1> <span> pick of the week: <br/>
        <?php echo $pickedrow['title']; ?> <br/>
        <?php echo $pickedrow['duration']; ?> <br/>
        <?php 
                $val = $pickedrow['rating'];
                for ($x=0; $x<$val; $x++) {
                echo "<img width='48px' height='48px' src='images/star.png' </img>"; 
                }
            ?></span></h1>
    </div> 
</body>
</html>