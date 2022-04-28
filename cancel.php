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

</div>	
</body>

</html>
