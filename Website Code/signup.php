<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Signup : MovieRental</title>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="fv.css" type="text/css" />
    
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="signup.css" />
	<script type="text/javascript" src="notification_html.js"></script>
    <link rel="stylesheet" type="text/css" href="buttons.css"/>
    <link rel="stylesheet" type="text/css" href="animate.css"/>
    <script type="text/javascript" src="jquery.noty.packaged.min.js"></script>
    <script src="multifield.js"></script>
    <script src="validator.js"></script>
	<script type="text/javascript">
    $(document).ready(function() {	
        // Attach a submit handler to the form
        $( "#form1" ).submit(function( event ) {
          // Stop form from submitting normally
          event.preventDefault();
          	if( validator.checkAll( $(this) ) ){
				
			
          // Get some values from elements on the page:
          var $form = $( this ),
            garble1 = $form.find( "input[name='email']" ).val(),
            garble2 = $form.find( "input[name='pass']" ).val(),
            garble3 = $form.find( "input[name='firstname']" ).val(),
            garble4 = $form.find( "input[name='lastname']" ).val(),
            garble5 = $form.find( "input[name='phone']" ).val(),
            garble6 = $form.find( "input[name='address']" ).val(),
            garble7 = $form.find( "input[name='date']" ).val(),
            url = $form.attr( "action" );
             // Send the data using post
             var posting = $.post( url, { email: garble1, pass: garble2, firstname: garble3, lastname: garble4, phone: garble5, address: garble6, date: garble7 } );
          // Show a notification if there is an error .. otherwise just redirect to login page.
          posting.done(function( data ) {
            if (data.indexOf("success") >= 0)
            {
                 window.location = "login.php";
            }
            else if(data.indexOf("fail")>=0)
            {
                //window.location="signup.php";
            
                generateAll();
            }
          
          });
          	}
        });   
        function generate(type, text) {

            var n = noty({
                text        : text,
                type        : type,
                dismissQueue: true,
                layout      : 'bottomCenter',
                closeWith   : ['click'],
                theme       : 'relax',
                maxVisible  : 1,
                timeout: 5000,
                animation   : {
                    open  : 'animated fadeInUp',
                    close : 'animated fadeOutDown',
                    easing: 'swing',
                    speed : 500
                }
            });
        }
	    function generateAll() {
            generate('error', notification_html[4]);
        }
        
             validator.message['date'] = 'not a real date';
		// validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
		$('form')
			.on('blur', 'input[required], input.optional, select.required', validator.checkField)
			.on('change', 'select.required', validator.checkField)
			.on('keypress', 'input[required][pattern]', validator.keypress);
		$('.multi.required')
			.on('keyup blur', 'input', function(){
				validator.checkField.apply( $(this).siblings().last()[0] );
			});
		// bind the validation to the form submit event
		//$('#send').click('submit');//.prop('disabled', true);
		

    });
</script>
</head>
<body> 
    <?php include 'header.php' ?>  
    <div class="login_container">
        <div class="mid_container">
    <div class="login_div">        
        <form class="form" action="signupcheck.php" method="post" id="form1" novalidate= "novalidate" > 
          <div class="item">
						<label>
							<span>First Name</span>
							<input type="text" data-validate-length-range="6" name="firstname" required="required" />
						</label>
					</div>
                    <div class="item">
						<label>
							<span>Last Name</span>
							<input type="text" data-validate-length-range="6" name="lastname" required="required" />
						</label>
					</div>
					
					<div class="item">
						<label>
							<span>email</span>
							<input name="email" id="email" class='email' required="required" type="email" />
						</label>
					</div>
					<div class="item">
						<label>
							<span>Confirm email address</span>
							<input type="email" class='email' name="confirm_email" data-validate-linked='email' required='required'>
						</label>
					</div>
					
					<div class="item">
						<label>
							<span>Date of Birth</span>
							<input class='date' type="text" placeholder="yyyy/mm/dd" name="date" required='required'>
						</label>
						<div class='tooltip help'>
							<span>?</span>
							<div class='content'>
								<b></b>
								<p>Enter in yyyy/mm/dd format</p>
							</div>
					</div>
					</div>
					<div class="item">
						<label>
							<span>Password</span>
							<input type="password" name="password" data-validate-length="6,8" required='required'>
						</label>
					    <div class='tooltip help'>
							<span>?</span>
							<div class='content'>
								<b></b>
								<p>Should be of length more than 6 characters</p>
							</div>
					</div>
					</div>
					<div class="item">
						<label>
							<span>Repeat password</span>
							<input type="password" name="password2" data-validate-linked='password' required='required'>
						</label>
					</div>
					<div class="item">
						<label>
							<span>Telephone</span>
							<input type="text" class='phone' name="phone" required='required' data-validate-length-range="8,10">
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
						<input type='submit' id="send" value="SIGNUP" /></label>
			</div>
			</form>
		</div>
		</div>
		</div>
            
</body>
</html>