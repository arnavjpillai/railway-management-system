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

        $stations = $_SESSION["stations"];

	for ($i = 0; $i < $_SESSION["stops"]; $i++) {
		if ($_POST["s1" . $i] > 0) {
			$query = "INSERT INTO classseats VALUES ('" . $_SESSION["trainno"] . "','" . $_SESSION["st" . $i] . "','" . $_SESSION["st" . ($i + 1)] . "','" . $_SESSION["doj"] . "','AC1','" . $_POST["s1" . $i] . "','" . $_POST["f1" . $i] . "')";
			
		}
		if ($_POST["s2" . $i] > 0) {
			$query = "INSERT INTO classseats VALUES ('" . $_SESSION["trainno"] . "','" . $_SESSION["st" . $i] . "','" . $_SESSION["st" . ($i + 1)] . "','" . $_SESSION["doj"] . "','AC2','" . $_POST["s2" . $i] . "','" . $_POST["f2" . $i] . "')";
			
		}
		if ($_POST["s3" . $i] > 0) {
			$query = "INSERT INTO classseats VALUES ('" . $_SESSION["trainno"] . "','" . $_SESSION["st" . $i] . "','" . $_SESSION["st" . ($i + 1)] . "','" . $_SESSION["doj"] . "','AC3','" . $_POST["s3" . $i] . "','" . $_POST["f3" . $i] . "')";
			
		}
		if ($_POST["s4" . $i] > 0) {
			$query = "INSERT INTO classseats VALUES ('" . $_SESSION["trainno"] . "','" . $_SESSION["st" . $i] . "','" . $_SESSION["st" . ($i + 1)] . "','" . $_SESSION["doj"] . "','CC','" . $_POST["s4" . $i] . "','" . $_POST["f4" . $i] . "')";
			
		}
		if ($_POST["s5" . $i] > 0) {
			$query = "INSERT INTO classseats VALUES ('" . $_SESSION["trainno"] . "','" . $_SESSION["st" . $i] . "','" . $_SESSION["st" . ($i + 1)] . "','" . $_SESSION["doj"] . "','EC','" . $_POST["s5" . $i] . "','" . $_POST["f5" . $i] . "')";
			
		}
		if ($_POST["s6" . $i] > 0) {
			$query = "INSERT INTO classseats VALUES ('" . $_SESSION["trainno"] . "','" . $_SESSION["st" . $i] . "','" . $_SESSION["st" . ($i + 1)] . "','" . $_SESSION["doj"] . "','SL','" . $_POST["s6" . $i] . "','" . $_POST["f6" . $i] . "')";
			
		}
	}

	echo "New seat arrangement added successfully";

        echo "<br> <a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";

        ?>
    </div>
</body>

</html>
