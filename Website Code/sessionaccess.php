<?php
session_start();
if(!isset($_SESSION['uid']))
{
?>
   <script type="text/javascript">
		location.href = 'login.php';
	</script>
   <?php
   exit;
}
?>