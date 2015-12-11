<?php
require 'sessionaccess.php';
if (isset($_SESSION['uid'])) {
session_destroy();
}
?>
<script type="text/javascript">
			location.href = 'home.php';
</script>