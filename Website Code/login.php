<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login : MovieRental</title>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="login_style.css" />
    <script type="text/javascript" src="notification_html.js"></script>
    <link rel="stylesheet" type="text/css" href="buttons.css"/>
    <link rel="stylesheet" type="text/css" href="animate.css"/>
    <script type="text/javascript" src="jquery.noty.packaged.min.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function() {		
        // Attach a submit handler to the form
        $( "#form1" ).submit(function( event ) {
         
          // Stop form from submitting normally
          event.preventDefault();
         
          // Get some values from elements on the page:
          var $form = $( this ),
            garble1 = $form.find( "input[name='username']" ).val(),
            garble2 = $form.find( "input[name='pass']" ).val(),
            url = $form.attr( "action" );
         
          // Send the data using post
          var posting = $.post( url, { username: garble1, pass: garble2 } );
         
          // Show a notification if there is an error .. otherwise just redirect to main page.
          posting.done(function( data ) {
            if (data.indexOf("success") >= 0)
            {
                if(data == "successadmin")
                    window.location = "admin.php";
                else
                    window.location = "movies_main.php";
            }
            else
            {
                generateAll();
            }
          });
        });
        
        function generate(type, text) {

            var n = noty({
                text        : text,
                type        : type,
                dismissQueue: true,
                layout      : 'topCenter',
                closeWith   : ['click'],
                theme       : 'relax',
                maxVisible  : 1,
                timeout: 5000,
                animation   : {
                    open  : 'animated fadeInDown',
                    close : 'animated fadeOutUp',
                    easing: 'swing',
                    speed : 500
                }
            });
        }
	    
	    function generateAll() {
            generate('error', notification_html[2]);
        }
        $("#signup").on('click',function(){
            window.location= 'signup.php';
        });
        
        $('.site_title').click(function(){
            window.location = "home.php";
        });
    });
    </script>
</head>

<body>
    <div class="login_container">
        <div class="mid_container">

                <div class="login_div">  
                <div id="login_title_div" style="display: table-cell;vertical-align: middle;">
                <img class="site_image" src="images/siteicon.png" style="margin-left:46px;" height="48px" />
                <h1 class="site_title" style="margin-left:16px;"> FAKEFLIX</h1>
                </div>
                
                <form class="form" action="logincheck.php" method="post" style="margin-top:-30px;" id="form1"> 
                <p class="username"> 
                    <label for="username">WE ARE AS FAKE AS FAKE CAN GET </label> 
                  </p> 
                  <p class="username"> 
                    <label for="username">USERNAME </label> 
                      <br/>
                    <input class="style-4" name="username" type="text" id="username" />             
                  </p> 
                  <p class="pass"> 
                    <label for="pass">PASSWORD</label> 
                      <br/>
                    <input name="pass" type="password" id="pass" />             
                  </p> 
                  <p class="submit"> 
                    <input type="submit" value="LOG IN" />               
                  </p> 
               </form>      
                <p>NEW USER?</p> 
                <button id="signup" style="margin-left:50px;margin-top:-5px;">SIGN UP</button>
              </div>   
          </div>
      </div>
</body>
</html>