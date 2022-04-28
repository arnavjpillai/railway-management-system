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
session_start();


require "db.php";

	$query = "SELECT MAX(trainno) FROM train";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $tno = $row[0] + 1;

        $query = "INSERT INTO train VALUES ({$tno},'{$_SESSION["tname"]}','{$_SESSION["sp"]}','{$_SESSION["st"]}','{$_SESSION["dp"]}','{$_SESSION["dt"]}','{$_SESSION["dd"]}','{$_SESSION["ds"]}')";

        if (mysqli_query($conn, $query)) {
            echo "New Train record created successfully";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        $query = "SELECT trainno FROM train where tname='{$_SESSION["tname"]}' AND sp='{$_SESSION["sp"]}' AND dp='{$_SESSION["dp"]}'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $trainno = $row['trainno'];

        $query = "SELECT MAX(sch_id) FROM schedule";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $sch_id = $row[0] + 1;

        for ($i = 1; $i <= $_SESSION["stops"]; $i++) {
            $query = "INSERT INTO schedule VALUES ({$sch_id},'{$trainno}','{$_POST["stn{$i}"]}','{$_POST["st{$i}"]}','{$_POST["dt{$i}"]}','{$_POST["ds{$i}"]}')";
            $flag = ($conn->query($query));
            $sch_id++;	
        }

        if ($flag === TRUE) {
            echo "New schedule added successfully";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

echo "<br> <a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";

?>
</div>
</body>
</html>
