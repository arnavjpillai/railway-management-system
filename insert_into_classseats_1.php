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


<form action="insert_into_classseats_2.php" method="post">

Trains: <select id="tno" name="tno" required>
<?php

require "db.php";

$query="SELECT * FROM train";
$result=mysqli_query($conn,$query);

echo " <option value = \"\" > </option>";

while ($row=mysqli_fetch_array($result)) 
{
 $tno=$row['trainno'];
 $tn=$row['tname']." starting at ".$row['sp'];
 echo " <option value = \"$tno\" > $tn </option> ";
}
?>
</select><br>

Date Of Journey: <input type="date" name="doj" required><br>
Class Name: <input type="text" name="class" required><br>
Fare per Seat: <input type="text" name="fps" required><br>
Total Seats: <input type="text" name="seatsleft" required><br>

<br><br><input type="submit" value="Add Train Schedule">
</div>
</body>
</html>


