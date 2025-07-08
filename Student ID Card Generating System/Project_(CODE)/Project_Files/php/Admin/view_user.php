<style>
    body{
        background: linear-gradient(0deg, #e8a6dc 6%, #fff0fe 100%);
    }

 table {
    width: 80%;
    border-collapse: collapse;
    margin-top: 20px;
    border: 2px solid black;
}
h1{
    margin: 20px 20px 20px;
}
th, td {
    border: 2px solid black;
    padding: 10px;
    text-align: left;
    font-size: 25px;
}

th {
    background-color: #007bff;
    color: #fff;
}

button {
      padding: 10px  ;
      margin: 20px ;    
      background: #ffffff url(/im/backward_img.png) center center/cover no-repeat;
      border-radius: 5px;
      height: 50px;
      width: 50px;
      background-color: white;

}

button:hover {

    background-color: black;
    
}
</style>

<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'project';

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a table named 'admin_user'
$query = "SELECT * FROM staffuser";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
</head>
<body>
     <a href="/php/Admin/staff.php"><button></button></a>
    <h1>Existing Users</h1>

    <table>
        <tr>
            <th>Category</th>
            <th>Department</th>
            <th>Username</th>
            <th>Password</th>
            
        </tr>

        <?php
        // Loop through the result set and display data in the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>" . $row['department'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

    <?php
    // Close connection
    mysqli_close($conn);
    ?>

</body>
</html>
