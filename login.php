<?php
  session_start();
if(isset($_POST['userid'])&&isset($_POST['pwd'])){
  $id=$_POST['userid'];
  $pwd=$_POST['pwd'];
  $dpwd;
  $did;
  $demail;
  $mysqli = new mysqli("tethys.cse.buffalo.edu:3306", "yingyinl", "50239602", "cse442_542_2020_spring_teamt_db");
  if ($conn->connect_error) {
    exit("Something is wrong. Please try again");
  }
  $arr = [];
  $stmt = $mysqli->prepare("SELECT * FROM users WHERE userid = ?");
  $stmt->bind_param("s", $id);
  $stmt->execute();
  $result = $stmt->get_result();
  while($row = $result->fetch_assoc()) {
    $arr[]=$row;
    $dpwd=$row['pwd'];
    $did=$row['userid'];
    $demail=$row['email'];
  }
  if(!$arr) echo "Username doesn't exist";
  else if ($dpwd!=$pwd) {
      echo "Username or Password incorrect";
  }
  else if($dpwd==$pwd && $did==$id){
    $_SESSION['did']=$did;
    $_SESSION['dpwd']=$dpwd;
    $_SESSION['demail']=$demail;
    header("Location: account.php");
    exit;
  }
  $stmt->close();
}else{
  echo "Nothing is submitted. Please try again";
}
?>
