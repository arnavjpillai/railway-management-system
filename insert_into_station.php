<html>
<style>
    a {
        text-decoration: none;
    }

    a:link {
        color: #ffd240;
    }

    a:visited {
        color: #0626b8;
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


    <?php

    require "db.php";

    $query = "SELECT MAX(st_id) FROM station";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $st_id = $row[0] + 1;

    $query = "INSERT INTO station VALUES ('{$_POST["sname"]}',$st_id)";

    if (mysqli_query($conn, $query)) {
        echo " New record created successfully";
    } else {
        echo "Error:" . mysqli_error($conn);
    }

    echo "<br> <a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";

    $conn->close();
    ?>

</body>

</html>
