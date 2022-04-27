<html>

<body style=" background-image: url(userlogin.png);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

    <?php

    require "db.php";

    $passowrd = $_POST["password"];
    $email = $_POST["emailid"];
    $mobile = $_POST["mobileno"];
    $dob = $_POST["dob"];

    $query = "SELECT MAX(id) FROM user";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
	$id = $row[0] + 1;

    $query = "INSERT INTO user VALUES ({$id},'{$password}','{$email}','{$mobile}','{$dob}')";

    if (mysqli_query($conn, $query)) {
        echo "Hi $email, <a href=\"http://localhost/railway/index.htm\"> Click here </a> to browse through our website!!! ";
    } else {
        echo "Error:" . $conn->error . "<br> <a href=\"http://localhost/railway/new_user_form.htm\">Go Back to Login!!!</a> ";
    }

    $conn->close();
    ?>

</body>

</html>