<?php
require 'dbaccess.php';
$username = $_POST['username'];
$password = md5($_POST['pass']);
$result = $conn->query("select * from user where email='$username'");
$urow = $result->fetch_assoc();
if($urow)
{
	if($password == $urow['password'])
	{
			session_start();
			$_SESSION['uid'] = $urow['customer_id'];
            $_SESSION['cart'] = array(); 
            $_SESSION['cartcount'] = 0;
		
		echo "success".$username;
//         <script type="text/javascript">
// 			location.href = 'movies_main.php';
// 		</script>
        		
	}
	else
		echo "invalid password";
}
else
	echo "invalid user";
?>