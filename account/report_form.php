<?php
	// check duration time (for testing it is 10 seconds)
	session_start();
	include("duration.php");
	if(isset($_SESSION['did'])){
		if(checkLoginExpired()) {
			header("Location: logout.php?session_expired=1");
		}
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Construction Form</title>
	<style>
	html{
		background-image: url("../pic/ub.jpg");
		width:100%;
        height:100%;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
		position:relative;
	}
		* {
		  box-sizing: border-box;
		}

		input[type=text], select, textarea {
		  width: 100%;
		  padding: 12px;
		  border: 1px solid #ccc;
		  border-radius: 4px;
		  resize: vertical;
		}

		label {
		  padding: 12px 12px 12px 0;
		  display: inline-block;
		}

		input[type=submit] {
		  background-color: #4CAF50;
		  color: white;
		  padding: 12px 20px;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		  float: right;
		}

		input[type=submit]:hover {
		  background-color: #45a049;
		}

		.container {
			 position:absolute;
			text-align: center;
			align-items: center;
			vertical-align: middle;
			width: 500px;
			height: 600px;
			transform: translate(-50%,-50%);
			top: 50%;
			left:50%;
			opacity:0.8;
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 15px;
		}

		.col-25 {
		  float: left;
		  width: 30%;
		  margin-top: 3px;
		}

		.col-75 {
		  float: left;
		  width: 70%;
		  margin-top: 3px;
		}
		/* Clear floats after the columns */
		.row:after {
		  content: "";
		  display: table;
		  clear: both;
		}
		@media screen and (max-width: 600px) {
		  .col-25, .col-75, input[type=submit] {
			width: 100%;
			margin-top: 0;
		  }
		}

	</style>
  </head>
  <body>
<?php
session_start();
if(isset($_SESSION['did'])){
	?>
<div class="container">
<h2>Construction Report Form</h2>
  <form method = "POST" action="report_form_db.php">
  <div class="row">
    <div class="col-25">
      <label for="fname">First Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstname" placeholder="Your name.." required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Last Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="buildings">Building Name</label>
    </div>
    <div class="col-75">
		<input type="text" id = "build" list="buildings" placeholder="Choose the Building to Report..." name="building" required>
		<datalist id="buildings">
			<option value="Alfiero Center">
			<option value="Alumni Arena">
			<option value="Baird Hall">
			<option value="Baldy Hall">
			<option value="Bell Hall">
		    <option value="Bissell Hall">
			<option value="Bonner Hall">
		    <option value="Bookstore">
		    <option value="Capen Hall">
			<option value="Center for the Arts">
			<option value="Child Care Center">
			<option value="Clemens Hall">
			<option value="Commons">
			<option value="Cooke Hall">
			<option value="Davis Hall">
			<option value="Fronczak Hall">
			<option value="Hochstetter Hall">
			<option value="Jacobs Management Center">
			<option value="Jarvis Hall">
			<option value="Ketter Hall">
			<option value="Knox Lecture Hall">
			<option value="Lockwood Library">
			<option value="Mathematics Building">
			<option value="Natural Sciences Complex">
			<option value="Norton Hall">
			<option value="OBrian Hall">
			<option value="Park Hall">
			<option value="Slee Hall">
			<option value="Student Union">
			<option value="Talbert Hall">
	    </datalist>
    </div>
  </div>
  Location Not in List <input type="checkbox" id="check" onclick="loc()">
  <div class="row" id="latrow" style="display:none">
	<div class="col-25">
      <label for="subject">Latitude</label>
    </div>
    <div class="col-75">
      <input type="text" id="lat" name="latname" placeholder="Enter Latitude..">
    </div>
  </div>
  <div class="row" id="lonrow" style="display:none">
    <div class="col-25">
      <label for="subject">Longitude</label>
    </div>
    <div class="col-75">
      <input type="text" id="lon" name="lonname" placeholder="Enter Longitude..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Description</label>
    </div>
    <div class="col-75">
      <textarea id="subject" name="subject" placeholder="Write your description.." style="height:150px" required></textarea>
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
  Click here to <a href="http://www-student.cse.buffalo.edu/CSE442-542/2020-spring/cse-442t/">Back to Your Account.<a/>
</div>
<script>
	function loc(){
		var checkBox = document.getElementById("check");
		var lat = document.getElementById("latrow");
		var lon = document.getElementById("lonrow");
		var latbox = document.getElementById("lat");
		var lonbox = document.getElementById("lon");
		var loca = document.getElementById("build");
		if (checkBox.checked == true){
			lat.style.display = "block";
			lon.style.display = "block";
			loca.removeAttribute("required");
			latbox.setAttribute("required", "");
			lonbox.setAttribute("required", "");
		} else{
			lat.style.display = "none";
			lon.style.display = "none";
			loca.setAttribute("required", "");
		}
	}
</script>
</body>
</html>
<?php
} else {
	header("Location: login.php");
}
?>
