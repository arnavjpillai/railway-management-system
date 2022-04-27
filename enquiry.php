<html>

<body style=" background-image: url(userlogin.png);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
    <!--
<?php

session_start();
$_SESSION = array();
session_destroy();

?>
-->
    <div align="center">
        <form action="enquiry_result.php" method="post">

            Starting Point:
            <select id="sp" name="sp" required>

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

            </select>
            <br><br>

            Destination Point: <select id="dp" name="dp" required>

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

            </select>
            <br><br>

            Date of Journey: <input type="date" name="doj" required><br>
            <input type="submit">

        </form>
        <br><br><a href="http://localhost/railway/index.htm">Go to Home Page!!!</a>
</body>

</html>