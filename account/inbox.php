<?php
	// check duration time (for testing it is 10 seconds)
	session_start();
	include("duration.php");
	if(isset($_SESSION['did'])&&$_SESSION['did']=='admin'){
		if(checkLoginExpired()) {
			header("Location: logout.php?session_expired=1");
		}
	}else{
    echo "<script>alert('You're not logged-in');
    window.location.href='https://www-student.cse.buffalo.edu/CSE442-542/2020-spring/cse-442t/account/login.php';
    </script>";
  }
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>My Inbox</title>
	<style>
	body {
	  margin: 0;
	  height:100%;
	  background-color: #D2E2F8;
	}

	.header {
	  background-color: #176BE2;
	  padding: 8px;
	  text-align: center;
	  position: fixed;
	  z-index: 1;
	  top: 0;
	  left: 0;
	  right: 0;
	}

	top {
	  transform:translate(0px,95px);
	  list-style-type: none;
	  overflow: show;
	  background-color: #173660;
	  position: fixed;
	  width: 100%;
	  z-index: 1;
	}

	li {
	  float: right;
	  border-left:1px solid #bbb;
	}

	li a {
	  display: block;
	  color: white;
	  text-align: center;
	  padding: 14px 16px;
	  text-decoration: none;
	}

	.buttons{
	  position:fixed;
	  top: 50%;
	  left: 50%;
	  width:30em;
	  height:20em;
	  margin-top: -9em;
	  margin-left: -15em;
	  border: 1px solid #ccc;
	  background-color: #f3f3f3;
	}

	.buttons h1{
	  text-align: center;
	}

	table, th, td {
	  border: 1px solid black;
	  border-collapse: collapse;
	}
	th, td {
	  padding: 5px;
	}
	th {
	  text-align: left;
	}
	table{
		position:absolute;
		transform: translate(-50%,-50%);
		top: 50%;
		left: 50%;
	}
	</style>
</head>
<body>
	<?php
	session_start();
		echo "<div class='header'>";
		echo "<h1 style='color: White;'>UB North Campus Navigation</h1>";
		echo "</div>";
		echo "<top id='top'>";
		echo "<li><a href="."https://www-student.cse.buffalo.edu/CSE442-542/2020-spring/cse-442t/account/logout.php".">Logout</a></li>";
		echo "<li><a href="."https://www-student.cse.buffalo.edu/CSE442-542/2020-spring/cse-442t/account/account_setting_page.php".">Settings</a></li>";
		echo "<li><a href="."https://www-student.cse.buffalo.edu/CSE442-542/2020-spring/cse-442t/account/account.php".">Account</a></li>";
		echo "<li><a href="."https://www-student.cse.buffalo.edu/CSE442-542/2020-spring/cse-442t/".">Home</a></li>";
		echo "</top>";

		echo "<table>";
		echo "<tr>";
		echo "<th>Your Username:</th><td>".htmlspecialchars($_SESSION['did'])."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Your Password:</th><td>".htmlspecialchars($_SESSION['dpwd'])."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Your Email:</th><td>".htmlspecialchars($_SESSION['demail'])."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<th>Your default route option:</th><td>".htmlspecialchars($_SESSION['route'])."</td>";
		echo "</tr>";
		echo "</table>";
	?>
</body>
</html>
