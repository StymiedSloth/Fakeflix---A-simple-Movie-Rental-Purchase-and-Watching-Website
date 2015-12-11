<?php
    require 'dbaccess.php';
    require 'sessionaccess.php';
    $movieid = $_GET['movieid'];
    $isRent = $_GET['isRent'];

    $movieresult = $conn->query("select * from movie where movie_id='$movieid'");
    $row = $movieresult->fetch_assoc();
?>

<html>
    <head>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript" src="notification_html.js"></script>
    <link rel="stylesheet" type="text/css" href="buttons.css"/>
    <link rel="stylesheet" type="text/css" href="animate.css"/>
    <script type="text/javascript" src="jquery.noty.packaged.min.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {		                    
        //Load data when submit is clicked on the text field
		$("#addtocartbtn").click(function() {  
				//Load data from database using ajax method in JQuery
		        $.ajax({
		       	type:"get",
		        url: "confirm_addtocart.php?movieid=" + <?php echo $movieid; ?> + "&isRent=" + <?php echo $isRent; ?>,       
                type: "html",     
		        success: function(data){                        
	        		 $("#cartcount").html("<img src='images/cart.png' style='margin-top:15px;' height='36px' /><h2 class='cart_title'>"+data+"</h2>");
	        		 generateAll();
		         }
		      	});	      	 
		});
		
		function generate(type, text) {

            var n = noty({
                text        : text,
                type        : type,
                dismissQueue: true,
                layout      : 'bottomRight',
                closeWith   : ['click'],
                theme       : 'relax',
                maxVisible  : 1,
                timeout: 3000,
                animation   : {
                    open  : 'animated fadeInUp',
                    close : 'animated fadeOutDown',
                    easing: 'swing',
                    speed : 500
                }
            });
        }
	    
	    function generateAll() {
            generate('error', notification_html[1]);
        }
	    
        function update_result_div()
        {
            $("#result_div").html("<img style='margin-left:50px;' src='images/notify.png' height='24px' /> "+
                 "<h2>Movie has been added to your cart</h2> <span> " +        
                 "<img src='images/cart.png' height='36px' /> " +
                 "<h2><?php echo $_SESSION['cartcount'];?> " +                    
                 "</h2></span>");
        };
        
        $('#continueshoppingbtn').click(function(){
        parent.history.back();
        return false;
        });
        
        $('#cartcount').click(function(){
                window.location = "payment_page.php";
            });
        
        $('#removelink').click(function(){
        parent.history.back();
        return false;
        });
        
        $('.site_title').click(function(){
                window.location = "movies_main.php";
        });
        
	});
	</script>

    </head>
    <body>
        <?php include 'header.php' ?>
        <h1 id="movies_main_h1" style="margin-left:50px;">ADD ITEM TO CART</h1>
        <table class="carttable">
            <tr>
                <th colspan="2">
                    Movie
                </th>                    
                <th>
                    Duration
                </th>
                <th>
                    Type of purchase
                </th>
                <th>
                    Price
                </th>
                <th>
                    &nbsp;
                </th>
            </tr>
            <tr>
                <td colspan="2" style="width:30%;">
                    <img style="float:left;display:inline-block;height:100px;width:auto;" src="<?php echo $row['image_link']; ?>" />
                    <p class="cart_movie_title"><?php echo $row['title']; ?></p>                    
                </td>
                <td>
                    <?php
                        echo $row['duration'];
                    ?>
                </td>
                <td  style="width:20%;">
                    <?php
                    if($isRent == "true")
                            echo 'Rent';
                        else
                            echo 'Purchase';
                    ?>
                </td>
                <td style="width:10%;">
                    <?php 
                        if($isRent == "true")
                            echo '$'.$row['price'];
                        else
                            echo '$'.$row['purchase_price'];
                    ?>
                </td>
                <td>
                    <a id="removelink">cancel</a>
                </td>
            </tr>
        </table>
        
        <button id="addtocartbtn">Add to Cart</button>                                     
        <button id="continueshoppingbtn">Continue Shopping</button>
        <div id="result_div"></div>
    </body>
</html>