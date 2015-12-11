<?php
    require 'dbaccess.php';
    require 'sessionaccess.php';
    $uid = $_SESSION['uid'];
    $orderresult = $conn->query("select o.order_id,m.movie_id, m.title, o.is_rented, o.date_ordered, o.due_date from orders o, movie m where m.movie_id = o.movie_id and o.customer_id ='$uid' ORDER BY o.date_ordered DESC");
    $orderrentedresult = $conn->query("select o.order_id,m.movie_id as movie_id, m.image_link,o.due_date as duedate from orders o, movie m where m.movie_id = o.movie_id and (o.due_date>= now() and o.due_date > o.date_ordered) and o.customer_id = '$uid'  and o.is_rented = 1 ORDER BY o.date_ordered DESC");
    $orderpurchasedresult = $conn->query("select o.order_id,m.movie_id, m.image_link from orders o, movie m where m.movie_id = o.movie_id  and o.due_date > o.date_ordered and o.customer_id = '$uid'  and o.is_rented = 0 ORDER BY o.date_ordered DESC");
    $orderprevrentedresult = $conn->query("select o.order_id,m.movie_id, m.image_link from orders o, movie m where m.movie_id = o.movie_id and (o.due_date < now() and o.due_date > o.date_ordered) and o.customer_id = '$uid'  and o.is_rented = 1 ORDER BY o.date_ordered DESC");
    ?>

<html>
    <head>
    <title>
		Order History | Online Movie Store
	</title>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500' rel='stylesheet' type='text/css' />
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
    
        $('#cartcount').click(function(){
            window.location = "payment_page.php";
        });
        
        $('.site_title').click(function(){
            window.location = "movies_main.php";
        });
        
        
        $("#owl-example1").owlCarousel(
            { items : 9, 
              itemsDesktop : [1400,7],
              itemsDesktopSmall : [1100,5],
              itemsTablet: [700,3], 
              itemsMobile : [400,1],
              navigation : true,
             scrollPerPage : true
        }
        );
        
        $("#owl-example2").owlCarousel(
            { items : 9, 
              itemsDesktop : [1400,7],
              itemsDesktopSmall : [1100,5],
              itemsTablet: [700,3], 
              itemsMobile : [400,1],
              navigation : true,
             scrollPerPage : true
        }
        );
        
        $("#owl-example3").owlCarousel(
            { items : 9, 
              itemsDesktop : [1400,7],
              itemsDesktopSmall : [1100,5],
              itemsTablet: [700,3], 
              itemsMobile : [400,1],
              navigation : true,
             scrollPerPage : true
        }
        );
        
    });
	</script>

    </head>
    <body>
    <?php include 'header.php' ?>
        
    <h1 id="movies_main_h1">movies rented by you right now</h1>
    <div id="owl-example1" class="owl-carousel" style="margin-left:-32px;">
        <?php
            if ($orderrentedresult->num_rows > 0) {
                // output data of each row
                while($row = $orderrentedresult->fetch_assoc()) {
        ?>
        <div class="form-div">
            <form class="proform" action="movie_details.php" method="get">
                <input type="hidden" name="movieid" value="<?php echo $row['movie_id'] ?>" />  
                <input type="hidden" name="duedate" value="<?php echo $row['due_date'] ?>" />  
            </form>
            <p><img style="height:200px;width:auto;" src="<?php echo $row['image_link']; ?>" /> </p>
        </div>
        <?php
                }
            } else {
                echo "<p>----</p>";
            }
        ?>
    </div>

    <hr/>
    
    <h1 id="movies_main_h1">movies you purchased</h1>
    <div id="owl-example2" class="owl-carousel" style="margin-left:-32px;">
        <?php
            if ($orderpurchasedresult->num_rows > 0) {
                // output data of each row
                while($row = $orderpurchasedresult->fetch_assoc()) {
        ?>
        <div class="form-div">
            <form class="proform" action="movie_details.php" method="get">
                <input type="hidden" name="movieid" value="<?php echo $row['movie_id'] ?>" />                    
            </form>
            <p><img style="height:200px;width:auto;" src="<?php echo $row['image_link']; ?>" /> </p>
        </div>
        <?php
                }
            } else {
                echo "<p>----</p>";
            }
        ?>
    </div>
    
    <hr/>
    <h1 id="movies_main_h1">movies rented previously</h1>
    <div id="owl-example3" class="owl-carousel" style="margin-left:-32px;">
        <?php
            if ($orderprevrentedresult->num_rows > 0) {
                // output data of each row
                while($row = $orderprevrentedresult->fetch_assoc()) {
        ?>
        <div class="form-div">
            <form class="proform" action="movie_details.php" method="get">
                <input type="hidden" name="movieid" value="<?php echo $row['movie_id'] ?>" />                    
            </form>
            <p><img style="height:200px;width:auto;" src="<?php echo $row['image_link']; ?>" /> </p>
        </div>
        <?php
                }
            } else {
                echo "<p>----</p>";
            }
        ?>
    </div>
    
    </body>
</html>