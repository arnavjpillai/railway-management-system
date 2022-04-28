<html>

<style>
    a {
    text-decoration: none;
    color: #ffd240;
}
</style>
<body style="
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    background-image: url(train4.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >
<div align="center" style="background-color: rgba(0, 0, 0, 0.404);backdrop-filter: blur(5px);max-width: fit-content;margin: auto; padding: 5rem;margin-top: 12rem;color: whitesmoke;">


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
	</div>
</body>

</html>
