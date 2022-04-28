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
    <div align="center" style="background-color: rgba(0, 0, 0, 0.404);backdrop-filter: blur(5px);max-width: 100%;margin: auto; padding: 5rem;margin-top: 12rem;color: whitesmoke;">
        <?php

        echo " <br><a href=\"http://localhost/railway/insert_into_stations.php\"> Show All Station </a><br> ";
        echo " <br><a href=\"http://localhost/railway/insert_into_train_1.php\"> Enter New Train </a><br> ";
        echo " <br><a href=\"http://localhost/railway/insert_into_classseats_1.php\"> Enter Train Schedule </a><br> ";
        echo " <br><a href=\"http://localhost/railway/booked.php\"> View all booked tickets </a><br> ";
        echo " <br><a href=\"http://localhost/railway/cancelled.php\"> View all cancelled tickets </a><br> ";

        ?>
        <br><a href="http://localhost/railway/index.htm">Go to Home Page!!! </a> You'll be Logged Out!!!
    </div>
</body>

</html>
