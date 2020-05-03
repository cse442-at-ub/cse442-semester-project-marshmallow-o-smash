<?php
	session_start();
	include("duration.php");
	if(isset($_SESSION['did'])){
		if(checkLoginExpired()) {
			header("Location: logout.php?session_expired=1");
		}
	}
      $message="";
     if(isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['subject']) && (isset($_POST['building']) || (isset($_POST['latname']) && isset($_POST['lonname'])) )){
       /*$first=$_POST['firstname'];
       $last=$_POST['lastname'];
	   $build = "";
	   $lat = 0;
	   $lon = 0;
	   if (isset($_POST['building'])){
		   $build = $_POST['building'];
	   }
	   if (isset($_POST['latname']) && isset($_POST['lonname']){
		   $lat = $_POST['latname'];
		   $lon = $_POST['lonname'];
	   }
       $des=$_POST['subject']; //description
	   $verify = 0;
       $mysqli = new mysqli("tethys.cse.buffalo.edu:3306", "yingyinl", "50239602", "cse442_542_2020_spring_teamt_db");
       if ($conn->connect_error) {
         exit("Failed to connect to the database.");
       }
	   if(isset($_POST['building'])){
		 $stmt = $mysqli->prepare("SELECT * FROM construction WHERE location = ?");
		 $stmt->bind_param("s", $build);
	   }
	   if (isset($_POST['latname']) && isset($_POST['lonname']){
		 $stmt = $mysqli->prepare("SELECT * FROM construction WHERE lat = ?");
		 $stmt->bind_param("d", $lat);
	   }
       $stmt->execute();
       $result = $stmt->get_result();
       if($result->num_rows === 0){
         $stmt1 = $mysqli->prepare("INSERT INTO contruction(First_name, Last_name, location, lat, lon, message, verify) VALUES(?,?,?,?,?,?,?)");
         $stmt1->bind_param("ssssss", $first, $last, $build, $lat, $lon, $des, $verify);
         $stmt1->execute();
         $stmt1->close();
         $message="Your form is sumitted to the Administrator";
       }
       else{$message= "Something is wrong";}
       $stmt->close();
       echo "<script>alert('$message');</script>";*/
     }
?>