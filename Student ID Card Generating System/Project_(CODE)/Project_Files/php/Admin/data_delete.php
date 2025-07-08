
<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'project';

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['deleteroll_no']))
{

    $roll=$_GET['deleteroll_no'];
    global $conn;
    $query1= "delete from studata where roll_no='$roll';";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
       header("Location:/php/Admin/student.php");
        
    }
    
}
?>