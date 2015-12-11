<?php
require 'sessionaccess.php';
?>
<html>
<head>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="style.css" />
    
<script type="text/javascript">
    $(document).ready(function() {		
        $( "#search" ).keypress(function() {
          var searchterm = $( "#search" ).val();
          var searchtype =  $("input:radio[name='searchtype']:checked").val();
          
          $.ajax({
	       	type:"get",
	        url: "search_logic.php?searchterm=" + searchterm + "&searchtype=" + searchtype ,       
            type: "html",     
	        success: function(data){                        
	            $("#moviediv").html(data);
	         }
	      	});	
        });
        
        $('.movierow').click(function(){  
            alert("dsds");
            var $form = $(this).closest('form');
            $form.submit();
        });

        $('.site_title').click(function(){
            window.location = "movies_main.php";
        });
        
    });
</script>
    
<style>
input[type=text] { 
    padding: 9px;
    border: solid 1.5px #E5E5E5; 
    outline: 0; 
    font: normal 14px/100% 'Roboto', sans-serif; 
    font-weight: 100;
    width: 300px; 
    background: #FFFFFF; 
    margin-left:20px;
    } 
    
.moredetails {
    width: auto; 
    margin-top: 10px;
    
    padding: 9px 15px; 
    background: #AA66CC; 
    font-family: 'Roboto', sans-serif;
    font-weight: 100;
    border: 0; 
    font-size: 14px; 
    color: White; 
    cursor: pointer; cursor: hand;
    }
</style>
</head>
<body>
<?php include 'header.php' ?>
<h1 id="movies_main_h1">SEARCH</h1>
<div>
<input type="text" autocomplete="off" id="search" name="moviename" style="float:left;margin-right:20px;"><br/>
<input type="radio" name="searchtype" value="moviename" checked>MOVIE NAME &nbsp;
<input type="radio" name="searchtype" value="genre">GENRE &nbsp;
<input type="radio" name="searchtype" value="rating">RATING
<div>
<div id="moviediv">
</div>
</div>
</body>
</html>