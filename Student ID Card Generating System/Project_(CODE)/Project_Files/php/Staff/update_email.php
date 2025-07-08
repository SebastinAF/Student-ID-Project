<style>
body{
    background: #ffffff url(/im/data_background.jpg) center center/cover no-repeat;

        
    }

table {
    width: 70%;
    border-collapse: collapse;
    margin-top: 20px;
    border: 2px solid black;
    margin-left: auto;
    margin-right: auto;
}
input[type="email"]{
    width: 80%;
  padding: 8px ;
  margin-bottom: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  border-color: #000000;
}

h1{
    background: #ffffff url(/im/data_background.jpg) center center/cover no-repeat;
    text-align: center;
    margin: 30px auto;
    color:indigo;
    border-radius: 5px;
    width: 450px;
}

th, td {
    border: 2px solid black;
    padding: 10px;
    text-align: left;
    font-size: 20px;       
}

th {
    background-color: #007bff;
    color: #fff;      
}

.update{
    color: white;
    background-color: green;
    width: 100px;
    height: 50px;
    display: flex;
    border-radius: 5px;
    justify-content: center;
    align-items: center;
}

.update:hover{
    color:black;
    background-color:#00ff4c;
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


if(isset($_POST['updateemail']))
{

    $roll_no=$_POST['roll_no'];
    $email=$_POST['email'];
    $query="UPDATE studata SET email_id='$email' WHERE roll_no='$roll_no';";
    $result=mysqli_query($conn,$query);
    if($result){
        //set Alreat
        echo "<script>alert('Update Sucessfull')</script>";
    }
    else{
        echo "<script>alert('Update Failed')</script>";
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Students Email ID</title>
</head>
<body>

    <h1>Add Students Email ID</h1>

<table>
    <tr>
       
        <th>Roll No</th>
        <th>Email ID</th>
        <th>Update</th>
        </tr>
       

 <?php
 session_start();
   $course=$_SESSION['dep'];
    $query1 = "SELECT * FROM studata where course='$course';";
    $result1 = mysqli_query($conn, $query1); 
    while ($row = mysqli_fetch_assoc($result1)) {
        $rollno = $row['roll_no'];
        $email = $row['email_id'];
        echo "<tr>";
        echo "<form action='#' method='post' autocomplete='off'> 
        <input type='hidden' name='roll_no' value='$rollno' required>";
      
        echo "<td>".$row['roll_no']."</td>";
        echo "<td><input type='email' name='email'  autocomplete='off'   value='$email' required/></td>";
        echo "<td><button name='updateemail' class='update'>Update</button></td> </form>";  
        echo "</tr> ";
    }
?>


</table>

</body>
</html>

