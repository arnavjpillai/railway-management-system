<html>
<style>
a {
    text-decoration: none;
}
a:link {
    color: #ffd240;
}
a:visited {
    color: #00ddff;
}
a:hover {
    color: red;
}
a:active {
    color: blue;


}

</style>
<body style=" 
box-sizing: border-box;
margin: 0;
padding: 0;
background-image: url(train1.jpg);
height: 100%; 
background-position: center;
background-repeat: no-repeat;
background-size: cover;">

<div style="background-color: rgba(0, 0, 0, 0.404);backdrop-filter: blur(5px);max-width: 100%;margin: auto; padding: 5rem;margin-top: 12rem;color: whitesmoke;">


<?php
session_start();

require "db.php";

	if (isset($_POST["tno"])) {
		$trainno = $_POST["tno"];
		$_SESSION["trainno"] = "$trainno";
		$doj = $_POST["doj"];
		$_SESSION["doj"] = "$doj";

		$query = "SELECT * FROM train where trainno='{$trainno}'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);

		echo "<table><thead><td>Train_no</td><td>Train_name</td><td>Starting_point</td><td>Starting_time</td><td>Destination_point</td><td>Destination_time</td><td>Day_of_arrival</td><td>Distance</td><td>Date_Of_Journey</td></thead>";
		echo "<tr><td>{$row[0]}</td><td>{$row[1]}</td><td>{$row[2]}</td><td>{$row[3]}</td><td>{$row[4]}</td><td>{$row[5]}</td><td>{$row[6]}</td><td>{$row[7]}</td><td>{$doj}</td></tr></table>";

		$query = "SELECT sname FROM schedule where trainno='{$trainno}' ORDER BY distance ASC  ";
		$result = mysqli_query($conn, $query);
		$stations = array();

		$i = 0;
		while ($row = mysqli_fetch_array($result)) {
			$stations[$i] = $row["sname"];
			$i++;
		}

		$_SESSION["stops"] = $i - 1;

		$_SESSION["stations"] = $stations;

		echo " <table><thead><td>Starting Point</td><td>Destination Point</td><td>AC1 seats</td><td>AC1 Fare</td><td>AC2 seats</td><td>AC2 Fare</td><td>AC3 seats</td><td>AC3 Fare</td><td>CC seats</td><td>CC Fare</td><td>EC seats</td><td>EC Fare</td><td>SL seats</td><td>SL Fare</td></thead>";

		echo "<form action=\"insert_into_classseats_4.php\" method=\"post\">";

		for ($i = 0; $i <= $_SESSION["stops"]; $i++) {
			$_SESSION["st{$i}"] = $stations[$i];
		}

		for ($i = 0; $i < $_SESSION["stops"]; $i++) {
			echo " <tr><td>{$stations[$i]}</td>
	<td>{$stations[$i + 1]}</td>
	<td><input type=\"text\" name=\"s1{$i}\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f1{$i}\" value=\"0\" required></td>	
	<td><input type=\"text\" name=\"s2{$i}\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f2{$i}\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"s3{$i}\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f3{$i}\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"s4{$i}\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f4{$i}\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"s5{$i}\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f5{$i}\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"s6{$i}\" value=\"0\" required></td>
	<td><input type=\"text\" name=\"f6{$i}\" value=\"0\" required></td>
	</tr>";
		}

		echo "</table><input type=\"submit\"></form>";
	} else {
		echo "
<form action=\"insert_into_classseats_3.php\" method=\"post\">
<table>
<thead><td>Train</td><td>Date Of Journey</td></thead>
<tr><td><select id=\"tno\" name=\"tno\" required>";

		$query = "SELECT * FROM train";
		$result = mysqli_query($conn, $query);

		while ($row = mysqli_fetch_array($result)) {
			$tno = $row['trainno'];
			$tn = "{$row['tname']} starting at {$row['sp']}";
			echo " <option value = \"$tno\" > $tn </option> ";
		}

		echo "</select></td>
<td><input type=\"date\" name=\"doj\" required></td></tr>
</table>
<input type=\"submit\" value=\"Enter Train Details\">
";
	}

echo "<br> <a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";

?>
	</div>
</body>
</html>


