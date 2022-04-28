<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<body style=" background-image: url(station.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >
    <!--
<?php

session_start();
$_SESSION = array();
session_destroy();

?>
-->

        <div align="center" style="background-color: rgba(0, 0, 0, 0.404);backdrop-filter: blur(5px);max-width: fit-content;margin: auto; padding: 5rem;margin-top: 12rem;color: whitesmoke;"> 
<h1 style="color: rgba(255, 255, 255, 0.808);font-family: 'Roboto', sans-serif;font-size: 50">Please enter details of your journey</h1><br><br>

<form action="enquiry_result.php" method="post">
<div class="container">
<div class="row">
    <div class="col-4"><h3 style="font-family: 'Montserrat', sans-serif;font-size: 20px;">Starting Point: </h3></div><div class="col-8"><select id="sp" name="sp" required>

                <?php

                require "db.php";

                $query = "SELECT sname FROM station";
                $result = mysqli_query($conn, $query);
                
                echo " <option value = \"\" > </option>";

                while ($row = mysqli_fetch_array($result)) {
                    $title = $row['sname'];
                    echo " <option value = \"$title\" >
                    $title
                    </option>";
                }
                ?>

            </select></div></div>
            <br>

           <div class="row">
    <div class="col-4"><h3 style="font-family: 'Montserrat', sans-serif;font-size: 20px;">Destination Point: </h3></div><div class="col-8"><select id="dp" name="dp" required>

                <?php

                require "db.php";

                $query = "SELECT sname FROM station";
                $result = mysqli_query($conn, $query);

                echo " <option value = \"\" > </option>";

                while ($row = mysqli_fetch_array($result)) {
                    $title = $row['sname'];
                    echo " <option value = \"$title\" >
                    $title
                </option>";
                }
                ?>

            </select></div></div>
            <br>

            <div class="row">
    <div class="col-4"><h3 style="font-family: 'Montserrat', sans-serif;font-size: 20px;">Date of Journey: </h3></div><div class="col-8"><input type="date" name="doj" required></div>
        </div><br>

<button type="submit" class="btn btn-primary" style="width: 150px">Submit</button></div>
<br><button type="button" class="btn btn-success"><a href="http://localhost/railway/index.htm" style="text-decoration: none; color: white;">Home Page</a></button>
</form>

</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"> </script>
</body>

</html>
