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

	session_start();

	require "db.php";

	$pname = $_POST["pname"];
	$page = $_POST["page"];
	$pgender = $_POST["pgender"];

	$id = $_SESSION["id"];
	$tno = $_SESSION["tno"];
	$doj = $_SESSION["doj"];
	$sp = $_SESSION["sp"];
	$dp = $_SESSION["dp"];
	$class = $_SESSION["class"];
	$nos = $_SESSION["nos"];

	$query = " SELECT fare, seatsLeft FROM classseats WHERE trainno='{$tno}' AND class='{$class}' AND doj='{$doj}' AND sp='{$sp}' AND dp='{$dp}'";
	$result = mysqli_query($conn, $query);

	$row = mysqli_fetch_array($result);
	$fare = $row[0];
	$seatsLeft = $row[1] - $nos;

	$totalFare = 0;
	$temp = 0;

	for ($i = 0; $i < $_SESSION["nos"]; $i++) {
		if ($page[$i] >= 18) {
			$temp++;
			$totalFare += $fare;
		} else if ($page[$i] < 18 || $page)
			$totalFare += 0.5 * $fare;
		else if ($page[$i] >= 60)
			$totalFare += 0.5 * $fare;
	}

	if ($temp == 0) {
		echo "<br><br>Atleast one adult must accompany!!!";
		echo "<br><br><a href=\"http://localhost/railway/enquiry.php\">Back to Enquiry</a> <br>";
		die();
	}

	echo "Total fare is Rs.{$totalFare}/-";

	$query = "SELECT MAX(pnr) FROM resv";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
	$pnr = $row[0] + 1;

	$query = "INSERT INTO resv VALUES ({$pnr},{$id},{$tno},'{$sp}','{$dp}','{$doj}',{$totalFare},'{$class}',{$nos},'BOOKED')";

	if (mysqli_query($conn, $query)) {
		echo "<br><br>Reservation Successful";
	} else {
		echo mysqli_error($conn);
	}

	$query = "UPDATE classseats SET seatsleft = {$seatsLeft} WHERE sp='{$sp}' AND dp='{$dp}' AND trainno={$tno} AND doj='{$doj}' AND class='{$class}";
	mysqli_query($conn, $query);

	$tid = $_SESSION["id"];
	$ttno = $_SESSION["tno"];
	$tdoj = $_SESSION["doj"];

	$query = " Select pnr from resv where id='{$tid}' AND trainno='{$ttno}' AND doj='{$tdoj}'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);

	$pnr = $row['pnr'];
	$tpname = $_POST['pname'];
	$tpage = $_POST["page"];
	$tpgender = $_POST["pgender"];

	for ($i = 0; $i < $_SESSION["nos"]; $i++) {
		$query = "INSERT INTO pd(pnr,pname,page,pgender) VALUES  ('{$pnr}','{$tpname[$i]}','{$tpage[$i]}','{$tpgender[$i]}')";

		if (mysqli_query($conn, $query)) {
			echo "<br><br>Passenger details added!!!";
		} else {
			echo mysqli_error($conn);
		}
	}
	
	echo "<br><br><a href=\"http://localhost/railway/index.htm\">Go Back!!!</a> <br>";
	session_destroy();
	$conn->close();
	?>

	</div>
</body>

</html>
