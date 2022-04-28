<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&family=Montserrat:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

<body style=" 
box-sizing: border-box;
margin: 0;
padding: 0;
background-image: url(train1.jpg);
height: 100%; 
background-position: center;
background-repeat: no-repeat;
background-size: cover;">
    <div align="center" style="background-color: rgba(0, 0, 0, 0.404);backdrop-filter: blur(5px);max-width: fit-content;margin: auto; padding: 5rem;margin-top: 12rem;color: whitesmoke;">
        <h3 style="font-family: 'Montserrat', sans-serif;font-size: 25px;">
            <?php
            session_start();
            if ($_POST["uid"] == 'admin' and $_POST["password"] == 'admin') {
                $_SESSION["admin"] = true;
            }

            if ($_SESSION["admin"] == true) {
                echo " <br><a href=\"http://localhost/railway/insert_into_stations.php\"> Show All Stations </a><br> ";
                echo " <br><a href=\"http://localhost/railway/show_trains.php\"> Show All Trains </a><br> ";
                echo " <br><a href=\"http://localhost/railway/show_users.php\"> Show All Users </a><br> ";
                echo " <br><a href=\"http://localhost/railway/insert_into_train_3.php\"> Enter New Train </a><br> ";
                echo " <br><a href=\"http://localhost/railway/insert_into_classseats_3.php\"> Enter Train Schedule </a><br> ";
                echo " <br><a href=\"http://localhost/railway/booked.php\"> View all booked tickets </a><br> ";
                echo " <br><a href=\"http://localhost/railway/cancelled.php\"> View all cancelled tickets </a><br> ";
                //echo " <br><a href=\"http://localhost/railway/logout.php\"> Logout </a><br> ";
            } else {

                echo "
<form action=\"admin_login.php\" method=\"post\">
User ID: <input type=\"text\" name=\"uid\" required><br>
Password: <input type=\"password\" name=\"password\" required><br>
<input type=\"submit\">
</form>
";
            }


            ?>
            <br><button type="button" class="btn btn-success"><a href="http://localhost/railway/index.htm" style="text-decoration: none; color: white;">Home Page</a></button>
        </h3>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"> </script>
</body>

</html>
