<?php
// check duration time (for testing it is 10 seconds)
session_start();
include("duration.php");
if(isset($_SESSION['did'])){
if(checkLoginExpired()) {
 header("Location: logout.php?session_expired=1");
}
}
session_start();

  $mysqli = new mysqli("tethys.cse.buffalo.edu:3306", "yingyinl", "50239602", "cse442_542_2020_spring_teamt_db");
  if ($conn->connect_error) {
    exit("Something is wrong. Please try again");
  }
  if(isset($_SESSION['did'])&&$_SESSION['dpwd']){
    //$_message="";
    //$_SESSION['message']="";
    if(isset($_POST['newpwd'])&&($_POST['newpwd']!="")){
      if(isset($_POST['confirmpwd'])&&($_POST['confirmpwd']!="")){
        // $id="did";
        $id=$_SESSION['did'];
        $npwd=$_POST['newpwd'];
        $cpwd=$_POST['confirmpwd'];
        if($npwd!=$cpwd){

           $_SESSION['message'].='Passwords entered do not match.\n';
        }
        else{
          $hash = password_hash($npwd, PASSWORD_BCRYPT);
          $stmt = $mysqli->prepare("UPDATE users SET pwd=? WHERE userid= ?");
          if ($stmt === false) {
            trigger_error($this->mysqli->error, E_USER_ERROR);
            return;
          }
          $stmt->bind_param("ss", $hash,$id);
          $stmt->execute();

          $stmt->close();
          $_SESSION['message'].='Password change succeed.\n';
            // $_message.="Password change succeed.\n";
        }
        }
    }

  if(isset($_POST['newemail'])&&($_POST['newemail']!="")){
    // $id="admin";
    $id=$_SESSION['did'];
    $nemail=$_POST['newemail'];

    $stmt = $mysqli->prepare("UPDATE users SET email=? WHERE userid= ?");
    if ($stmt === false) {
      trigger_error($this->mysqli->error, E_USER_ERROR);
      return;
    }
    $stmt->bind_param("ss", $nemail,$id);
    $stmt->execute();
    $stmt->close();
    $_SESSION['message'].='E-mail change succeed.\n';
      // $_message.="E-mail change succeed.\n";
  }

  // if(isset($_POST['routes'])){
  //   echo $_POST['routes'];
  //   // $id="admin";
  //   $id=$_SESSION['did'];
  //   $option=$_POST['routes'];
  //   //$_SESSION['option']=$option;
  //
  //   if($option==""){
  //     echo "error3";
  //   }else {
  //     echo "3";
  //     $stmt = $mysqli->prepare("UPDATE users SET option=? WHERE userid= ?");
  //     // if ($stmt === false) {
  //     //   echo "error333";
  //     //   trigger_error($this->mysqli->error, E_USER_ERROR);
  //     //   return;
  //     // }
  //     $stmt->bind_param("ss", 'shortest','admin');
  //     $stmt->execute();
  //     $stmt->close();
  //   }
  //     $_message.="Route option updated.\n";
  //
  // }
   header("Location: account_setting_page.php");
   exit();
  }
?>
