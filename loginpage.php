<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
      html{
        background-image: url("pic/background.jpg");
        width:100%;
        height:100%;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
		position:relative;
      }
      .box{
          position:absolute;
          text-align:center;
          transform: translate(-50%,-50%);
          top: 50%;
          left:50%;
      }
	  .form{
		  margin-left: 90px;
	  }
      .header {
        position:absolute;
        background-color: #3366cc;
        text-align: center;
        align-items: center;
        vertical-align: middle;
        width: 450px;
        height: 250px;
		transform: translate(-50%,-50%);
		top: 50%;
        left:50%;
		opacity:0.8;
		color: white;
      }
      .returnToHome{
        position: absolute;
        top:-25%;
        left:40.5%;
      }
      .returnToHome a{
        font-size: 50px;
        color: #3366cc;
        text-decoration: none;
        padding: 10px 10px;
        font-family: sans-seri;
        font-weight:bold;
      }
}

    </style>
  </head>
  <body>
    <div class="box">
      <div class ="header">
        <div class="returnToHome">
          <a href="https://www-student.cse.buffalo.edu/CSE442-542/2020-spring/cse-442t/">
          <ion-icon name="home"></ion-icon>
        </a>
        </div>
        <h1>Login Here</h1>
		<p> Only logged in user can save search history<br /></p>
		<div class = "form">
          <?php
			session_start();
				// provide form to log in 
				echo '<form method="post" action="login.php">';
				echo '<table>';
				echo '<tr><td>Username:</td>';
				echo '<td><input type="text" name="userid" required></td></tr>';
				echo '<tr><td>Password:</td>';
				echo '<td><input type="password" name="pwd" required></td></tr>';
				echo '<tr><td colspan="2" align="center">';
				echo '<input type="submit" name="submit" value="Log in"></td></tr>';
				echo '</table></form>';
			?>
		</div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  </body>
<html>
