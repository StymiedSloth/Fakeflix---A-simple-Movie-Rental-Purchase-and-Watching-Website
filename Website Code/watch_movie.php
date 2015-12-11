<html>
<head>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="style.css" />
<style>
    #widget {
        left: 5%;
        position: absolute;
        top: 5%;
        color:White;
        display: inline-block;
        z-index:100001;
        cursor: pointer; cursor: hand;
        opacity: 0.4;
        filter: alpha(opacity=40);
        }
    .myIframe {
        z-index:1;
    }
</style>
<script type="text/javascript">
$(document).ready(function() {		            
    $("#widget").click(function(){
        parent.history.back();
        return false;
    });
});
</script>
</head>
<body>
<div id="widget"> 
    <img src="images/back.png" width="90px"/> 
</div>
<iframe class="myIframe" src="//player.vimeo.com/video/9679622?autoplay=1" width="100%"
frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> <p>
<a href="http://vimeo.com/9679622">The Sandpit</a> from <a href="http://vimeo.com/samohare">
Sam O&#039;Hare</a> on <a href="https://vimeo.com">Vimeo</a>.</p>

<script type="text/javascript" language="javascript"> 
$('.myIframe').css('height', $(window).height()+'px');
</script>
</body>
</html>