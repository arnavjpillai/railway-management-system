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

        echo "
<table>
<thead><td>Train_no</td><td>Starting_Point</td><td>Destination_Point</td></thead>
<tr><td>{$_GET["trainno"]}</td><td>{$_GET["sp"]}</td><td>{$_GET["dp"]}</td></tr>
</table>
";

        echo "
<table>
<thead><td>Train_Class</td><td>Seats_Left</td><td>Fare_Per_Seat</td></thead>
";

        $query = "SELECT class,seatsleft,fare FROM classseats WHERE trainno={$_GET["trainno"]} AND sp='{$_GET["sp"]}' AND dp='{$_GET["dp"]}'";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) {
            echo "
<tr><td>{$row[0]}</td><td>{$row[1]}</td><td>{$row[2]}</td></tr>
";
        }
        echo "</table>";

        echo " <br><a href=\"http://localhost/railway/schedule.php?trainno={$_GET['trainno']}\">Go Back to Schedule!!!</a><br> ";
        echo " <br><a href=\"http://localhost/railway/show_trains.php\">Go Back to Train Menu!!!</a><br> ";
        echo " <br><a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";
        ?>
    </div>
</body>

</html>
