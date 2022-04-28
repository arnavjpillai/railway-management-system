<html>
<style>
    a {
        text-decoration: none;
    }

    a:link {
        color: #f2ff00;
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
background-image: url(train4.jpg);
height: 100%; 
background-position: center;
background-repeat: no-repeat;
background-size: cover;">

    <div style="background-color: rgba(0, 0, 0, 0.404);backdrop-filter: blur(5px);max-width: 100%;margin: auto; padding: 5rem;margin-top: 12rem;color: whitesmoke;">
        <?php

        require "db.php";

        $query = "SELECT * FROM train";
        $result = mysqli_query($conn, $query);
        echo "
<table>
<thead><td>Train_no</td><td>Train_name</td><td>Starting_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Day</td><td>Distance</td><td></td></thead>
";

        while ($row = mysqli_fetch_array($result)) {
            echo "
<tr><td>{$row['trainno']}</td><td>{$row['tname']}</td><td>{$row['sp']}</td><td>{$row['st']}</td><td>{$row['dp']}</td><td>{$row['dt']}</td><td>{$row['dd']}</td><td>{$row['distance']}</td><td><a href=\"http://localhost/railway/schedule.php?trainno={$row['trainno']}\"><button>Schedule</button></a></td></tr>
";
        }
        echo "</table>";

        echo " <br><a href=\"http://localhost/railway/insert_into_train_3.php\"> Add New Train </a><br> ";
        echo " <br><a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";
        ?>
    </div>
</body>

</html>
