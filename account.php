<?php
	session_start();
	include("duration.php");
	if(isset($_SESSION['did'])){
		if(checkLoginExpired()) {
			header("Location: logout.php?session_expired=1");
		}
	}
?>
<html>
<head>
<title>User Login</title>
</head>
</html>
<?php
session_start();
if(isset($_SESSION['did'])){
echo "<p>You are logged in.";
echo "</p>";
echo "<p> Your Username is:";
echo htmlspecialchars($_SESSION['did']);
echo "</p>";
echo "<p> Your Password is:";
echo htmlspecialchars($_SESSION['dpwd']);
echo "</p>";
echo "<p> Your E-mail is:";
echo htmlspecialchars($_SESSION['demail']);
echo "</p>";
?>
Welcome <?php echo $_SESSION['did']; ?>. Click here to <a href="logout.php" title="Logout">Logout.
<?php
} else {
	echo "You are not logged in.";
?>
	Click here to <a href="login.php" title="Logout">Login.
<?php
}
?>
