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
background-image: url(train4.jpg);
height: 100%; 
background-position: center;
background-repeat: no-repeat;
background-size: cover;">

<div style="background-color: rgba(0, 0, 0, 0.404);backdrop-filter: blur(5px);max-width: 100%;margin: auto; padding: 5rem;margin-top: 12rem;color: whitesmoke;">



<?php
require "db.php";

if($_POST["emailid"]==""){ 

$cdquery="SELECT * FROM user WHERE id='".$_GET["id"]."'";
$cdresult=mysqli_query($conn,$cdquery);
$cdrow=mysqli_fetch_array($cdresult);

echo "
<table>
<thead><td>Id</td><td>Email_Id</td><td>Password</td><td>Mobile_no</td><td>Date_Of_Birth</td></thead>
";
echo "
<tr><td>".$cdrow["id"]."</td>
<form action=\"edit_user.php?id=".$_GET["id"]."\" method=\"post\">
<td><input type=\"text\" name=\"emailid\" value=\"".$cdrow["emailid"]."\" required></td>
<td><input type=\"text\" name=\"password\" value=\"".$cdrow["password"]."\" required></td>
<td><input type=\"text\" name=\"mobileno\" value=\"".$cdrow["mobileno"]."\" required></td>
<td><input type=\"date\" name=\"dob\" value=\"".$cdrow["dob"]."\" required></td></tr>
";
echo "</table><input value='Update Record' type=\"submit\"></form>";
}
else{
	$sql = "UPDATE `user` SET `emailid`='".$_POST["emailid"]."',`password`='".$_POST["password"]."',`mobileno`='".$_POST["mobileno"]."',`dob`='".$_POST["dob"]."' WHERE id='".$_GET["id"]."'";
	
	if ($conn->query($sql) === TRUE) {
    	echo "User details updated successfully";
	} else {
	    echo "Error:" . $conn->error;
	}
}

echo " <br><br><a href=\"http://localhost/railway/show_users.php\">Go Back to User Menu!!!</a><br> ";
echo " <br><a href=\"http://localhost/railway/admin_login_1.php\">Go Back to Admin Menu!!!</a> ";

$conn->close();
?>

</div>
</body>
</html>


