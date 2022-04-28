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
background-image: url(train2.jpeg);
height: 100%; 
background-position: center;
background-repeat: no-repeat;
background-size: cover;">

<div style="background-color: rgba(0, 0, 0, 0.404);backdrop-filter: blur(5px);max-width: 100%;margin: auto; padding: 5rem;margin-top: 12rem;color: whitesmoke;">


	<?php

	require "db.php";
	session_start();
	$mobile = $_POST["mno"];
	$password = $_POST["password"];

	$query = "SELECT * FROM user WHERE mobileno='{$mobile}' AND password='{$password}' ";
	$result = mysqli_query($conn, $query);

	if ($row = mysqli_fetch_array($result)) {
		echo "Welcome ";
		echo $row['emailid'];
		echo "<br><br>";
		$_SESSION["id"] = $row['id'];

		$query = " select * from user,resv where user.id=resv.id AND  user.mobileno={$mobile}";
		$result2 = mysqli_query($conn, $query);

		echo "<table><thead><td>PNR</td><td>Train_no</td><td>Date_Of_Journey</td><td>Total_Fare</td><td>Train_Class</td><td>Seats_Reserved</td><td>Status</td></thead>";

		while ($row = mysqli_fetch_array($result2)) {
			echo "<tr><td>" . $row["pnr"] . "</td><td>" . $row["trainno"] . "</td><td>" . $row["doj"] . "</td><td>" . $row["tfare"] . "</td><td>" . $row["class"] . "</td><td>" . $row["nos"] . "</td><td>" . $row["status"] . "</td></tr>";
		}

		echo "</table>";

		if (!$result2) {
			echo "No Reservations Yet !!! <br><br> ";
		}
	}

	?>

	<form action="cancel.php" method="post">
		Enter PNR for Cancellation: <input type="text" name="pnr" required><br><br>
		<input type="submit" value="Cancel"><br><br>
	</form>
	<?php

	echo " <a href=\"http://localhost/railway/index.htm\">Home Page</a><br>";

	$conn->close();

	?>
</div>
</body>

</html>
