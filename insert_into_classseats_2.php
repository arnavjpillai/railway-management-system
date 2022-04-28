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

$sql = "INSERT INTO classseats (trainno,doj,class,seatsleft,fare) VALUES ('".$_POST["tno"]."','".$_POST["doj"]."','".$_POST["class"]."','".$_POST["seatsleft"]."','".$_POST["fps"]."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<br><br><a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";

$conn->close();
?>
    </div>
</body>
</html>
