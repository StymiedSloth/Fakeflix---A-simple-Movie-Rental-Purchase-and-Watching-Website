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
            
            $('#additems').click(function(){
                window.location = "admin_additem.php";
        });
    });
    </script>
    
</head>
<body>
    <?php include 'header.php' ?>
    <div>
    <h1 id="movies_main_h1">ADMIN PANEL</h1>
    <button style="margin-left:20px;" id="additems">Add Users/Movies</button>
    </div>
    <table style="float:left;width:50%;border-right:1px solid;">
            <tr>
                <th>
                    <p>
                    Movie Id
                    </p>
                </th>                    
                <th>
                    <p>
                    Movie Name
                    </p>
                </th>
                <th>
                    &nbsp;
                </th>
            </tr>
            <?php
                if ($movieresult->num_rows > 0) {
                // output data of each row
                while($row = $movieresult->fetch_assoc()) {
               ?>
                <tr>
                <td style="width:10%;">
                        <p><?php echo $row['movie_id']; ?></p>                    
                    </td>
                    <td style="width:30%;">
                    <p>
                        <?php
                            echo $row['title'];
                        ?>
                        </p>
                    </td>
                    <td style="width:10%;">
                        <p style="display:none;">
                        <?php 
                            echo $row['movie_id']."|movie";
                        ?></p>
                        <a class="removelink">delete</a>
                    </td>
                </tr>
                <?php }}?>
        </table>
    
        <table class="entitytable">
            <tr>
                <th>
                    <p>
                    User Id
                    </p>
                </th>                    
                <th>
                    <p>
                    User Email
                    </p>
                </th>
                <th>
                    &nbsp;
                </th>
            </tr>
            <?php
                if ($userresult->num_rows > 0) {
                // output data of each row
                while($row = $userresult->fetch_assoc()) {
               ?>
                <tr>
                <td style="width:10%;">
                        <p><?php echo $row['customer_id']; ?></p>                    
                    </td>
                    <td style="width:30%;">
                    <p>
                        <?php
                            echo $row['email'];
                        ?>
                        </p>
                    </td>
                    <td style="width:10%;">
                    <p style="display:none;">
                        <?php 
                            echo $row['customer_id']."|user";
                        ?></p>
                        <a class="removelink">delete</a>
                    </td>
                </tr>
                <?php }}?>
        </table>
</body>
</html>