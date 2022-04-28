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
background-image: url(train2.jpeg);
height: 100%; 
background-position: center;
background-repeat: no-repeat;
background-size: cover;">

<div style="background-color: rgba(0, 0, 0, 0.404);backdrop-filter: blur(5px);max-width: 100%;margin: auto; padding: 5rem;margin-top: 12rem;color: whitesmoke;">


<?php

require "db.php";
$query = "SELECT * FROM user";
    $result = mysqli_query($conn, $query);
    echo "
<table>
<thead><td>Id</td><td>Email_Id</td><td>Password</td><td>Mobile_no</td><td>Date_Of_Birth</td><td></td><td></td></thead>
";

    while ($row = mysqli_fetch_array($result)) {
        echo "
<tr><td>{$row[0]}</td><td>{$row[1]}</td><td>{$row[2]}</td><td>{$row[3]}</td><td>{$row[4]}</td><td><a href=\"http://localhost/railway/edit_user.php?id={$row[0]}\"><button>Edit</button></a></td><td><a href=\"http://localhost/railway/delete_user.php?id={$row[0]}\"><button>Delete</button></a></td></tr>
";
    }
    echo "</table>";

echo " <br><a href=\"http://localhost/railway/new_user_form.html\"> Add New User </a><br> ";
echo " <br><a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";
?>
</div>
</body>
</html>
