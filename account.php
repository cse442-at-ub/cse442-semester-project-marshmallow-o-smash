<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>My account</title>
  </head>
  <body>
    <?php
    session_start();
    if(isset($_SESSION['did'])&&$_SESSION['dpwd']){
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
    }
    ?>

  </body>
</html>
