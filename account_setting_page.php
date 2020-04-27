
<!DOCTYPE html>
<html lang="en">
<head>
<title>UB North Campus Navigation</title>
<meta name="description" content="UB North Campus Navigation for shortest, outdoor, and tunnel routes">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

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

/* .input-box{
  boarder-radius: 25px;
  boarder: 2px solid #609;
  padding: 18px;
  width: 200px;
  height:7px;
}
.drop-box{
  boarder-radius: 25px;
  boarder: 2px solid #609;
  padding: 18px;
  width: 200px;
  height:7px;
} */

.sbutton{
  background-color: color:#000;
}

.buttons h1{
  text-align: center;
}


</style>
</head>

<body>

  <div class="header">
    <h1 style="color: White;">UB North Campus Navigation</h1>
  </div>
  <top id="top">
    <li><a href="https://www-student.cse.buffalo.edu/CSE442-542/2020-spring/cse-442t/Contact">Contact Us</a></li>
    <li><a href="https://www-student.cse.buffalo.edu/CSE442-542/2020-spring/cse-442t/About_Us">About Us</a></li>
  </top>

  <?php

  // check duration time (for testing it is 10 seconds)
 session_start();
 $sessionid=$_SESSION['did'];
 include("duration.php");
 if(isset($_SESSION['did'])){
  if(checkLoginExpired()) {
   header("Location: logout.php?session_expired=1");
  }
 }
  if(isset($_SESSION['did'])&&$_SESSION['dpwd']){
    $message=$_SESSION['message'];
    if($message!=""){
      echo "<script>alert('$message');</script>";
    }
    $_SESSION['message']="";
  }
  else{
    header("Location: index.php");
    exit();
  }
  ?>
  <div class="buttons">
      <form method="post" action="account_setting.php">
        <table>
          <h1>Account Setting</h1>
          <tr>
            <td>New Password</td>
            <td><input type="password" class="input-box" name="newpwd"></td>
          </tr>

          <tr>
            <td>Confirm Password</td>
           <td><input type="password" class="input-box" name="confirmpwd"></td>
          </tr>

          <tr>
            <td>New E-mail</td>
            <td><input type="email" class="input-box" name="newemail"></td>
          </tr>
          <tr>
            <label >Default Route Option</label>
            <select  id="routes" class ="drop-box"name="routes">
              <option value=""></option>
              <option value="Shortest Route">shortest</option>
              <option value="Outdoor Route">outdoor</option>
              <option value="Tunnel Route">tunnel</option>
            </select>
          </tr>

          <tr>
            <td colspan="2">
            <input type="submit" class="sbutton" value="Save Changes"></td>
          </tr>
        </table>
      </form>
  </div>
<script>
    let id="<?php echo htmlspecialchars($sessionid);?>"; let a = document.createElement("a");
    a.innerHTML="Welcome! "+id;
    a.href="account.php";
    let ele=document.createElement("li");
    ele.appendChild(a);
    document.getElementById("top").appendChild(ele);

</script>



</body>

</html>
