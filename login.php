<?php
if(isset($_POST['userid'])&&isset($_POST['pwd'])){
  $id=$_POST['userid'];
  $pwd=$_POST['pwd'];
  $dpwd;
  $did;
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
  }
  if(!$arr) echo "Username doesn't exist";
  else if ($dpwd!=$pwd) {
      echo "Username or Password incorrect";
  }
  else if($dpwd==$pwd && $did==$id){
    echo "<p> Your Username is:";
    echo htmlspecialchars($id);
    echo "</p>";
    echo "<p> Your Password is:";
    echo htmlspecialchars($pwd);
    echo "</p>";
  }
  $stmt->close();
}else{
  echo "Nothing is submitted. Please try again";
}
?>
