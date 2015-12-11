<?php
    require 'dbaccess.php';
    require 'sessionaccess.php';
    $uid = $_SESSION['uid'];
    $orderresult = $conn->query("SELECT DISTINCT m.movie_id,m.title, m.image_link FROM movie m INNER JOIN orders o ON o.movie_id = m.movie_id WHERE o.customer_id ='$uid' and o.date_ordered > NOW() - INTERVAL 1 MINUTE ORDER BY o.date_ordered DESC");
    ?>
<html>
    <head>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="stylesheet" href="owl/owl.carousel.css" type="text/css" />
        <link rel="stylesheet" href="owl/owl.theme.css" type="text/css" />
        <!-- Include js plugin -->
        <script type="text/javascript" src="owl/owl.carousel.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {	
                $(".form-div").click(function(){
            var $form = $(this).find('form');
            $form.submit();
        });
                $("#returnbtn").click(function() { 
                    window.location = "movies_main.php";
                });
                $('.site_title').click(function(){
                window.location = "movies_main.php";
        });
        $("#owl-example").owlCarousel(
            { items : 9, //10 items above 1000px browser width              
              itemsDesktop : [1400,7], //7 items between 1000px and 901px
              itemsDesktopSmall : [1100,5], // betweem 900px and 601px
              itemsTablet: [700,3], //2 items between 600 and 400
              itemsMobile : [400,1], // 1 item between 400 and 0
              navigation : true,
             scrollPerPage : true
            }
        );
         $("#owl-example1").owlCarousel(
            { items : 9, //10 items above 1000px browser width              
              itemsDesktop : [1400,7], //7 items between 1000px and 901px
              itemsDesktopSmall : [1100,5], // betweem 900px and 601px
              itemsTablet: [700,3], //2 items between 600 and 400
              itemsMobile : [400,1], // 1 item between 400 and 0
              navigation : true,
             scrollPerPage : true
            }
        );
            });
        </script>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <p>Thank you for you purchase. The movies listed below have been added into your account. Have a good time.</p>
        <button id="returnbtn">Return to home</button>
        <hr/>
        <div id="owl-example1" class="owl-carousel" style="margin-left:50px;">
        <?php
        if ($orderresult->num_rows > 0) {
            // output data of each row
            while($row = $orderresult->fetch_assoc()) {
        ?>
            <div class="form-div">
                <form class="proform" action="movie_details.php" method="get">
                    <input type="hidden" name="movieid" value="<?php echo $row['movie_id'] ?>" />                    
                </form>
                <img style="height:200px;width:auto;" src="<?php echo $row['image_link']; ?>" /> 
            </div>
        <?php
            }
        } 
        else {
            echo "";
        }
        ?>
</div>
    </body>
</html>