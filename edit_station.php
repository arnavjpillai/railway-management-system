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
		error_reporting(0);
		ini_set('display_errors', 0);

		if ($_POST["station"] == "") {
			echo "
<form action=\"edit_station.php?id={$_GET["id"]}\" method=\"post\">
Edit Station : <br><br>
<input type=\"text\" name=\"station\" required>
<input type=\"submit\">
</form>
";
		} else {
			$query = "UPDATE `station` SET `sname`='" . $_POST["station"] . "' where st_id= ('" . $_GET["id"] . "')";

			if (mysqli_query($conn, $query)) {
				echo "Station updated successfully";
			} else {
				echo "Error: " . mysqli_error($conn);
			}
		}

		echo "<br> <a href=\"http://localhost/railway/admin_login_1.php\">Go Back to Admin Menu!!!</a> ";

		$conn->close();
		?>
	</div>
</body>

</html>
