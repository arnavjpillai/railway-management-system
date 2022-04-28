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
		error_reporting(0);
		ini_set('display_errors', 0);

		if (isset($_POST["stops"])) {
			$tname = $_POST["tname"];
			$_SESSION["tname"] = "$tname";
			$sp = $_POST["sp"];
			$_SESSION["sp"] = "$sp";
			$st = $_POST["st"];
			$_SESSION["st"] = "$st";
			$dp = $_POST["dp"];
			$_SESSION["dp"] = "$dp";
			$dt = $_POST["dt"];
			$_SESSION["dt"] = "$dt";
			$dd = $_POST["dd"];
			$_SESSION["dd"] = "$dd";
			$stops = $_POST["stops"];
			$_SESSION["stops"] = "$stops";
			$ds = $_POST["ds"];
			$_SESSION["ds"] = "$ds";

			echo "<table><thead><td>Train_name</td><td>Starting_point</td><td>Starting_time</td><td>Destination_point</td><td>Destination_time</td><td>Day_of_arrival</td><td>No_of_stations</td><td>Distance</td></thead>";
			echo "<tr><td>{$tname}</td><td>{$sp}</td><td>{$st}</td><td>{$dp}</td><td>{$dt}</td><td>{$dd}</td><td>{$stops}</td><td>{$ds}</td></tr></table>";

			echo " <table><thead><td>Station</td><td>Arrival_Time</td><td>Departure_Time</td><td>Distance</td></thead>";
			echo " <tr><td>{$sp}</td><td>{$st}</td><td>{$st}</td><td>0</td></tr>";

			echo "<form action=\"insert_into_train_4.php\" method=\"post\">";

			for ($i = 1; $i <= $stops; $i++) {
				echo " <tr><td><select id=\"stn{$i}\" name=\"stn{$i}\"required> ";

				$query = "SELECT sname FROM station";
				$result = mysqli_query($conn, $query);

				echo " <option value = \"\" > </option>";

				while ($row = mysqli_fetch_array($result)) {
					$Title = $row['sname'];
					echo " <option value = \"$Title\" > $Title </option>";
				}

				echo "
	</select></td>
	<td><input type=\"text\" name=\"st{$i}\" required></td>
	<td><input type=\"text\" name=\"dt{$i}\" required></td>
	<td><input type=\"text\" name=\"ds{$i}\" required></td>	
	</tr>";
			}

			echo " <tr><td>{$dp}</td><td>{$dt}</td><td>{$dt}</td><td>{$ds}</td></tr></table>";
			echo "<input type=\"submit\">";
		} else {
			echo "
<form action=\"insert_into_train_3.php\" method=\"post\">
<table>
<tr><td>Train Name </td><td> <input type=\"text\" name=\"tname\" required></td></tr>
<tr><td>Starting Point </td><td> <select id=\"sp\" name=\"sp\" required>
";

			$query = "SELECT sname FROM station";
			$result = mysqli_query($conn, $query);

			while ($row = mysqli_fetch_array($result)) {
				$title = $row['sname'];
				echo " <option value = \"$title\" > $title </option>";
			}

			echo "

</select></td></tr>

<tr><td>Starting Time </td><td> <input type=\"time\" name=\"st\" required></td></tr>

<tr><td>Destination Point </td><td> <select id=\"dp\" name=\"dp\" required>

";

			$query = "SELECT sname FROM station";
			$result = mysqli_query($conn, $query);

			while ($row = mysqli_fetch_array($result)) {
				$title = $row['sname'];
				echo " <option value = \"$title\" > $title </option>";
			}

			echo "
</select></td></tr>

<tr><td>Destination Time </td><td> <input type=\"time\" name=\"dt\" required></td></tr>

<tr><td>Distance </td><td> <input type=\"text\" name=\"ds\" required></td></tr>

<tr><td>No Of Intermediate stations</td><td><input type=\"text\" name=\"stops\" required></td></tr>

<tr><td>Day of Arrival </td><td> <input type=\"text\" name=\"dd\" required></td></tr>
</table>
<input type=\"submit\" value=\"Enter Train Details\"><br><br>
";
		}

		echo "<br> <a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";

		?>
	</div>
</body>

</html>
