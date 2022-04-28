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

		require "db.php";


		$query = "SELECT * FROM train WHERE trainno='{$_GET["trainno"]}'";
		$result = mysqli_query($conn, $query);
		echo "
<table>
<thead><td>Train_no</td><td>Train_name</td><td>Starting_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Day</td><td>Distance</td></thead>
";
		while ($row = mysqli_fetch_array($result)) {
			echo "
<tr><td>{$row['trainno']}</td><td>{$row['tname']}</td><td>{$row['sp']}</td><td>{$row['st']}</td><td>{$row['dp']}</td><td>{$row['dt']}</td><td>{$row['dd']}</td><td>{$row['distance']}</td></tr>
";
		}
		echo "</table>";



		$query = "SELECT * FROM schedule where trainno='{$_GET["trainno"]}' ORDER BY distance ASC  ";
		$result = mysqli_query($conn, $query);
		$stations = array();
		$arrival = array();
		$departure = array();
		$distance = array();
		$i = 0;
		while ($row = mysqli_fetch_array($result)) {
			$stations[$i] = $row["sname"];
			$arrival[$i] = $row["arrival_time"];
			$departure[$i] = $row["departure_time"];
			$distance[$i] = $row["distance"];
			$i += 1;
		}



		echo "
<table>
<thead><td>Id</td><td>Staring_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Distance</td><td></td></thead>
";
		$temp = 0;
		while ($temp < $i - 1) {
			echo "
<tr><td>".($temp + 1)."</td><td>{$stations[$temp]}</td><td>{$departure[$temp]}</td><td>{$stations[$temp + 1]}</td><td>{$arrival[$temp + 1]}</td><td>".($distance[$temp + 1] - $distance[$temp])."</td><td><a href=\"http://localhost/railway/seat_plan.php?trainno={$_GET["trainno"]}&sp={$stations[$temp]}&dp={$stations[$temp + 1]}\"><button>Seat Plan</button></a></td></tr>
";
			$temp += 1;
		}
		echo "</table>";

		echo " <br><a href=\"http://localhost/railway/show_trains.php\">Go Back to Train Menu!!!</a><br> ";
		echo " <br><a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";
		?>
	</div>
</body>

</html>
