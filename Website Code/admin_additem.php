<?php
require 'dbaccess.php';
require 'sessionaccess.php';

$movieresult = $conn->query("select movie_id,title from movie");

$userresult = $conn->query("select customer_id,email from user");
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
        $('.removelink').click(function(){ 
            var answer=confirm('CONFIRM DELETION?');
                if(answer)
                {
                    var split = $(this).prev().text().split("|");
                    $(this).closest('tr').remove();
                    $.ajax({
                    type:"get",
                    url: "remove_item_db.php?itemid=" + split[0].trim() + "&action=" + split[1].trim(),       
                    type: "html",     
                    success: function(data){ 
                        if (data.indexOf("success") >= 0)
                            {
                                generateAll();
                            }
    
                    }	      	             
                    });
                }
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
                generate('error', notification_html[5]);
            }
            
            $('.site_title').click(function(){
                window.location = "admin.php";
            });
    });
    </script>
    
</head>
<body>
    <?php include 'header.php' ?>
    <h1 id="movies_main_h1">ADMIN PANEL</h1>
    
    <form class="form" action="admin_confirmadduser.php" method="post" id="form1" novalidate= "novalidate"> 
           <div class="item">
				<label>
					<span>First Name</span>
					<input type="text" name="firstname" required="required" />
				</label>
			</div>
                <div class="item">
					<label>
						<span>Last Name</span>
						<input type="text" name="lastname" required="required" />
					</label>
				</div>
				
				<div class="item">
					<label>
						<span>email</span>
						<input name="email" id="email" required="required" type="email" />
					</label>
				</div>
				<div class="item">
					<label>
						<span>Date of Birth</span>
						<input class='date' type="text" name="date" required='required'>
					</label>
				</div>
				<div class="item">
					<label>
						<span>Password</span>
						<input type="password" name="password" required='required'>
					</label>
				</div>
				<div class="item">
					<label>
						<span>Telephone</span>
						<input type="text" class='phone' name="phone" required='required'>
					</label>
				</div>
                <div class="item">
					<label>
						<span>Address</span>
						<input class='address' type="text" name="address" required='required'>
					</label>
				</div>
					<div class="item">
                    <label>
						<input type='submit' id="senduser" value="INSERT USER" /></label>
			</div>
			</form>
			
        <form class="form" action="admin_confirmaddmovie.php" method="post" id="form1" novalidate= "novalidate" > 
           <div class="item">
				<label>
					<span>Movie Name</span>
					<input type="text" name="title" required="required" />
				</label>
			</div>
                <div class="item">
					<label>
						<span>description</span>
						<input type="text" name="description" required="required" />
					</label>
				</div>
				
				<div class="item">
					<label>
						<span>duration</span>
						<input name="duration" id="duration" required="required"/>
					</label>
				</div>
				<div class="item">
					<label>
						<span>Rent Price</span>
						<input class='rentprice' type="text" name="price" required='required'>
					</label>
				</div>
				<div class="item">
					<label>
						<span>Purchase Price</span>
						<input type="text" name="purchase_price" required='required'>
					</label>
				</div>
				<div class="item">
					<label>
						<span>Rating</span>
						<input type="text" class='rating' name="rating" required='required'>
					</label>
				</div>
                <div class="item">
					<label>
						<span>Image Link</span>
						<input class='imagelink' type="text" name="image_link" required='required'>
					</label>
				</div>
				<div class="item">
					<label>
						<span>Trailer Link</span>
						<input class='trailerlink' type="text" name="trailer_link" required='required'>
					</label>
				</div>
				<div class="item">
					<label>
						<span>Genre</span>
						<input class='genre' type="text" name="genre" required='required'>
					</label>
				</div>
				<div class="item">
					<label>
						<span>Wide Image Link</span>
						<input class='wideimagelink' type="text" name="wide_image" required='required'>
					</label>
				</div>
				
					<div class="item">
                    <label>
						<input type='submit' id="sendmovie" value="INSERT MOVIE" /></label>
			</div>
			</form>
</body>
</html>