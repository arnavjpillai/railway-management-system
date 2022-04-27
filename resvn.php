<html>

<body style=" background-image: url(pnglogin.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">


    <form action="new_png.php" method="post">

        <?php

        session_start();

        require "db.php";

        $mobileNo = $_POST["mno"];
        $password = $_POST["password"];

        $query = "SELECT * FROM user WHERE mobileno='{$mobileNo}' AND password='{$password}'";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "Wrong mobile number or password <br> ";
            echo " <br><a href=\"http://localhost/railway/enquiry_result.php\">Go Back!!!</a> <br>";
            die();
        }

        $row = mysqli_fetch_array($result);
        $temp=$row['id'];
        $_SESSION["id"] = $temp;
        $tno = $_POST["tno"];
        $_SESSION["tno"] = $tno;
        $class = $_POST["class"];
        $_SESSION["class"] = $class;
        $nos = $_POST["nos"];
        $_SESSION["nos"] = $nos;

        echo "<table>";

        for ($i = 0; $i < $nos; $i++) {
            echo "<tr><td><input type='text' name='pname[]' placeholder=\"Passenger Name\" required></td><br> ";
            echo "<td><input type='text' name='page[]' placeholder=\"Passenger Age\" required></td><br>";
            echo "<td><input type='text' name='pgender[]' placeholder=\"Passenger Gender\" required></td></tr><br> ";
        }

        echo "</table>";

        echo "<a href=\"http://localhost/railway/enquiry.php\">Back to Enquiry</a>";

        $conn->close();

        ?>

        <br><br><input type="submit" value="Book">
</body>

</html>