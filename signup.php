<?php
if(isset($_POST['userid'])&&isset($_POST['pwd'])&&isset($_POST['email'])){
  $id=$_POST['userid'];
  $pwd=$_POST['pwd'];
  $email=$_POST['email'];
  $mysqli = new mysqli("tethys.cse.buffalo.edu:3306", "yingyinl", "50239602", "cse442_542_2020_spring_teamt_db");
  if ($conn->connect_error) {
    exit("Something is wrong");
  }
  echo "100";
//   $stmt = $mysqli->prepare("SELECT * FROM users WHERE userid = ?");
//   $stmt->bind_param("s", $id);
//   $stmt->execute();
//   $result = $stmt->get_result();
//   echo("1");
//   if($result->num_rows === 0){
//     echo("2");
//     $stmt1 = $mysqli->prepare("INSERT INTO users(userid, pwd, email) VALUES(?,?,?)");
//     $stmt1->bind_param("sss", $id, $pwd, $email);
//     $stmt1->execute();
//     $stmt1->close();
//     $stmt2=$mysqli->prepare("SELECT * FROM users WHERE userid = ?");
//     $stmt2->bind_param("s", $id);
//     $stmt2->execute();
//     $result2 = $stmt->get_result();
//     if($result2->num_rows>0){
//       echo "Account successfully created!";
//       mail($email,"Thank You from UB North Campus Navigation", "Thank you for signing up! Let us know if we can improve!");
//     }else{
//       echo "Your account is not successfully created!";
//     }
//   }
//   $stmt->close();
//   else{echo "Username already exists";}
// }else{
//   echo "Nothing is submitted. Please try again";
// }
 ?>
