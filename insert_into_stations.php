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

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style=" 
box-sizing: border-box;
margin: 0;
padding: 0;
background-image: url(train1.jpg);
height: 100%; 
background-position: center;
background-repeat: no-repeat;
background-size: cover;">

    <div align="center" style="background-color: rgba(0, 0, 0, 0.704);backdrop-filter: blur(5px);max-width: 100%;margin: auto; padding: 5rem;margin-top: 12rem;color: whitesmoke;">

        <?php

        require "db.php";
        
        $query = "SELECT st_id,sname FROM station";
        $result = mysqli_query($conn, $query);
        echo "
<table>
<thead><td>Id</td>\t\t<td>Station</td><td></td><td></td></thead>
";

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['st_id'];
            $title = $row['sname'];
            echo "
<tr><td>{$id}</td>\t\t<td>{$title}</td>\t\t<td><a href=\"http://localhost/railway/edit_station.php?id={$id}\"><button>Edit</button></a></td>\t\t<td><a href=\"http://localhost/railway/delete_station.php?id={$id}\"><button>Delete</button></a></td></tr>
";
        }
        echo "</table>";

        ?>

        <br>
        <span>
            <form action="insert_into_station.php" method="post">
                Add Station : <input type="text" name="sname" placeholder=" New Station" required>
                <button type="submit" class="btn btn-primary" style="width: 100px">Add</button>

        </span>
        <?php
        echo "<br><br>  <a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"> </script>
</body>

</html>
