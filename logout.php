<?php
session_start();
$old_user = $_SESSION['did'];
unset($_SESSION['did']);
unset($_SESSION['dpwd']);
session_destroy();
?>
<html>
<body>
<h1>Log Out</h1>
<?php
	if (!empty($old_user)){
		echo 'Logged Out. <br /><br />';
	} else {
		echo 'You were not logged in, and so have not been logged out. <br /> <br />';
	}
?>
<a href = "index.php">Back to Map Navigation</a>
</body>
</html>