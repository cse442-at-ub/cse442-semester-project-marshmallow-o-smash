<!DOCTYPE html>
<html>
<head>
<title>Locations database</title>
</head>
<body>
<table>
	<tr>
		<th>Name</th>
		<th>Longtitude</th>
		<th>latitude</th>
	</tr>
	<?php
	$conn= mysqli_connect("tethys.cse.buffalo.edu:3306","yingyinl","50239602","yingyinl_db");
	if($conn-> connect_error){
		die("Connection failed: " . $conn-> connet_error);
	}
	$sql="SELECT * from locations";
	$output=$conn ->query($sql);
	
	while($row = $result->fetch_assoc()){
		echo "<tr><td>". $row["name"]. "</td><td>".$row["lon"]."</td><td>". $row["lat"]."</td></tr>";
		
	}
	echo "</table>";
	$conn ->close();
	?>
</table>

</body>
</html>