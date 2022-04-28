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
	error_reporting(0);
	ini_set('display_errors', 0);

	if ($_POST["emailid"] == "") {

		$query = "SELECT * FROM user WHERE id='{$_GET["id"]}'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);

		echo "
<table>
<thead><td>Id</td><td>Email_Id</td><td>Password</td><td>Mobile_no</td><td>Date_Of_Birth</td></thead>
";
		echo "
<tr><td>{$row["id"]}</td>
<form action=\"edit_user.php?id={$_GET["id"]}\" method=\"post\">
<td><input type=\"text\" name=\"emailid\" value=\"{$row["emailid"]}\" required></td>
<td><input type=\"text\" name=\"password\" value=\"{$row["password"]}\" required></td>
<td><input type=\"text\" name=\"mobileno\" value=\"{$row["mobileno"]}\" required></td>
<td><input type=\"date\" name=\"dob\" value=\"{$row["dob"]}\" required></td></tr>
";
		echo "</table><input value='Update Record' type=\"submit\"></form>";
	} else {
		$query = "UPDATE user SET emailid='{$_POST["emailid"]}',password='{$_POST["password"]}',`mobileno`='{$_POST["mobileno"]}',`dob`='{$_POST["dob"]}' WHERE id='{$_GET["id"]}'";

		if (mysqli_query($conn, $query)) {
			echo "User details updated successfully";
		} else {
			echo "Error:" . mysqli_error($conn);
		}
	}

echo " <br><br><a href=\"http://localhost/railway/show_users.php\">Go Back to User Menu!!!</a><br> ";
echo " <br><a href=\"http://localhost/railway/admin_login_1.php\">Go Back to Admin Menu!!!</a> ";

$conn->close();
?>

</div>
</body>
</html>


