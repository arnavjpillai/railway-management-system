<html>

<body style=" background-image: url(pnglogin.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

	<?php

	session_start();

	require "db.php";

	$pnr = $_POST["pnr"];
	$id = $_SESSION["id"];

	$query = "UPDATE resv SET status ='CANCELLED' WHERE resv.pnr={$pnr}";

	if (mysqli_query($conn, $query)) {
		echo "Cancellation Successful!!!";
	} else {
		echo "<br><br>Error:" . mysqli_error($conn);
	}

	$query = "SELECT trainno,sp,dp,doj,class,nos FROM resv WHERE pnr={$pnr}";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
	$tno = $row[0];
	$sp = $row[1];
	$dp = $row[2];
	$doj = $row[3];
	$class = $row[4];
	$nos = $row[5];

	$query = "UPDATE classseats SET seatsleft=seatsleft+{$nos} WHERE trainno={$tno},sp='{$sp}',dp='{$sp}',doj='{$doj},class='{$class}'";
	mysqli_query($conn, $query);

	$query = "DELETE FROM pd WHERE pnr={$pnr}";
	mysqli_query($conn, $query);

	echo " <br><br><a href=\"http://localhost/railway/index.htm\">Home Page</a><br>";

	$conn->close();
	?>

</body>

</html>