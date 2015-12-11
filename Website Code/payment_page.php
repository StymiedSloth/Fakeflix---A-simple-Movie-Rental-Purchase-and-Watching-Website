<?php
    require 'dbaccess.php';
    require 'sessionaccess.php';
    $total=0;
    $cart = $_SESSION['cart'];
    $count=0;
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
            <?php
            if($_SESSION['cartcount'] <= 0)
                {
                ?>
                    $("#confirmpaymentbtn").hide();
            <?php
                }
            ?>
            $("#confirmpaymentbtn").click(function() {  
                    $.ajax({
                    type:"get",
                    url: "finishpayment.php",       
                    type: "html",     
                    success: function(data){  
                        if (data.indexOf("success") >= 0)
                        {
                             window.location = "thank_payment.php";
                        }
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
                generate('error', notification_html[0]);
            }
            
            $('.removelink').click(function(){  
                var split = $(this).prev().text().split("|");
                var price_item = parseInt(split[1], 10);
                
                $(this).closest('tr').remove();
                $.ajax({
                type:"get",
                url: "remove_item_cart.php?movieid=" + split[0].trim() + "",       
                type: "html",     
                success: function(data){ 
                    if (data.indexOf("success") >= 0)
                        {
                            generateAll();
                            var total_current = $("#total").text();
                            total_current = total_current.replace('$','');
                            
                            total_current = parseInt(total_current, 10);
                            
                            $("#total").text("$"+ (total_current - price_item));
                            $("#cartcount").html("<img src='images/cart.png' style='margin-top:15px;' height='36px' /><h2 class='cart_title'>"+<?php echo $_SESSION['cartcount'] ?>+"</h2>");
                        }

                }	      	             
            });
        
        });
        
        $('.site_title').click(function(){
                window.location = "movies_main.php";
        });
            
        });
        </script>
    </head>
    <body>
    <?php 
        include 'header.php';
    ?>
        <h1 id="movies_main_h1" style="margin-left:50px;">ITEMS IN CART</h1>
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
            <?php
            if($_SESSION['cartcount'] > 0)
            {
            foreach($cart as $movie)
            {
                $movieid = $movie[0];
                $movieresult = $conn->query("select * from movie where movie_id='$movieid'");
                $row = $movieresult->fetch_assoc();?>
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
                        if($movie[1] == "true")
                                echo 'Rent';
                            else
                                echo 'Purchase';
                        ?>
                    </td>
                    <td style="width:10%;">
                        <?php 
                            if($movie[1] == "true"){
                                echo '$'.$row['price'];
                                $total=$total+$row['price'];}
                            else{
                                echo '$'.$row['purchase_price'];
                                $total=$total+$row['purchase_price'];}

                        ?>
                    </td>
                    <td>
                        <p style="display:none;">
                        <?php 
                        if($movie[1] == "true"){
                            echo $movie[0]."|".$row['price'] ;
                        }
                        else{
                            echo $movie[0]."|".$row['purchase_price'];
                        }
                        ?></p>
                        <a class="removelink">remove</a>
                    </td>
                </tr>
                <?php }}?>
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Total</b></td>
            <td><b id="total"><?php echo '$'. $total;?></b></td>
            </tr>
        </table>
    
        <br><button id="confirmpaymentbtn">Confirm Payment</button>
            
    </body>
</html>