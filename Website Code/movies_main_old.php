<?php
require 'dbaccess.php';
require 'sessionaccess.php';
$movieresult = $conn->query("select * from movie");
?>
<html>
<head>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="http://darsa.in/sly/js/sly.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {		
            
        $(".form-div").click(function(){
            var $form = $(this).find('form');
            $form.submit();
        });
        
        $('#frame').sly({
            horizontal: 1,

            itemNav: 'forceCentered',
            smart: 1,
            activateOn: 'click',

            scrollBy: 1,

            mouseDragging: 1,
            swingSpeed: 0.2,

            scrollBar: $('.scrollbar'),
            dragHandle: 1,

            speed: 600,
            startAt: 2
          });
        
	});
	</script>

    
</head>
<body>

    <?php include 'header.php' ?>
    <div class="scrollbar">
        <div class="handle">
            <div class="mousearea"></div>
        </div>
    </div>
    <div id="frame">
        <ul class="slidee">
        <?php
            if ($movieresult->num_rows > 0) {
                // output data of each row
                while($row = $movieresult->fetch_assoc()) {
        ?>
            <li class="form-div">                       
                    <form class="proform" action="movie_details.php" method="get">
                        <input type="hidden" name="movieid" value="<?php echo $row['movie_id'] ?>" />                    
                    </form>
                <img style="height:200px;width:auto;" src="<?php echo $row['image_link']; ?>" /> 
                <p class="movie_title"><?php echo $row['title']; ?></p>
            </li>
        <?php
                }
            } else {
                echo "";
            }
        ?>
        </ul>
    </div>
<hr/>
    
    

</body>
</html>