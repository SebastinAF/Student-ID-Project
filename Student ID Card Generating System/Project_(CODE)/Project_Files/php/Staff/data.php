<style>
body{
    background: #ffffff url(/im/data_background.jpg) center center/cover no-repeat;
        
    }

table {
    width: 80%;
    border-collapse: collapse;
    margin-top: 20px;
    border: 2px solid black;
}
h1{
   
    text-align: center;
    margin: 30px 30px;
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

button{
    color: #fff;
    background-color: green;
    border-radius: 5px;
    padding: 20px;
    width: 100px;
    height: 50px;
    text-align: center;
    font-weight: bold;
    font-style: italic;
}
.update{
    color: white;
    padding-top: 10px;  
    background-color: green;

}
.delete{
    color:white;
    padding-top: 10px;  
    background-color: red;
}

.id{
    color:white;
    text-align: center;
    padding-top: 15px;   
    background: #ffffff url(/im/green_button.jpg) center center/cover no-repeat;
}

.delete:hover{
    color:black;
    background-color: #ce2727;
}

.update:hover{
    color:black;
    background-color:#00ff4c;
}

.id:hover{
    color:black;
    
    background: #ffffff url(/im/darkblue_button.jpg) center center/cover no-repeat;
}

.back{
      padding: 10px;
    margin: 20px;
    background: #ffffff url(/im/backward_img.png) center center/cover no-repeat;
    border-radius: 5px;
    height: 50px;
    width: 50px;
    background-color: white;
    position: fixed;
    left: 50px; 
    top: 20px; 
    z-index: 999; 
}

.back:hover{
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


function  retriveImage($roll_no)
{

// Get image data from database
global $conn;
$db=$conn; 
$query= "SELECT image FROM studata  where roll_no='$roll_no'";          
$result = mysqli_query($db,$query); 
?>

<!-- Display images with BLOB data from database -->
<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img width="60px" src="data:image/jpg;charset=utf8;base64,
            <?php echo base64_encode($row['image']); ?>" /> 
        <?php } ?> 
    </div> 
<?php 
}
else{ 
    ?> 
    <p class="status error">Image(s) not found...</p> 
<?php }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Data</title>
</head>
<body>
<a href="/php/Staff/staff_page.php" ><button class="back"></button></a>
    <h1>Student Details</h1>

    <table>
 
            <th>Image</th>  
            <th>Name</th>
            <th>Roll No</th>
            <th>Course</th>
            <th>Address</th>
            <th>Mobile No</th>
            <th>DOB</th>
            <th>Blood Group</th>
            <th>Email ID</th>
            <th>Update</th>
            <th>Delete</th>
            <th>Generate ID</th>
    
        <tr>

        

        <?php
        // Loop through the result set and display data in the table
        session_start();
        $course=$_SESSION['dep'];
        $query1="select * from studata where course='$course';";
        $result1=mysqli_query($conn,$query1); 
        
        while ($row = mysqli_fetch_assoc($result1)) {
            echo "<tr>";
            echo "<td>";
            $rollno=$row['roll_no'];
            retriveImage($row['roll_no']);
            echo"</td>";
                        
            //echo "<td><img src='{$row['image']}' alt='Student Image' width='50' height='50'></td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['roll_no']."</td>";
            echo "<td>".$row['course']."</td>";
            $rollno=$row['roll_no'];
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['mobile_no']."</td>";
            echo "<td>".$row['dob']."</td>";
            echo "<td>".$row['blood_group']."</td>";
            echo "<td>".$row['email_id']."</td>";
            echo" <th><a href='/php/Admin/stu_data_update.php?roll_no=$rollno&page_id=admin' ><button class=
            'update' >Update</button></a></th>";
            echo" <th><a href='/php/Staff/delete_stu_details.php?deleteroll_no=$rollno' ><button  class=
            'delete' >Delete</button></a></th>";
            echo" <th><a href='/php/Admin/idcard/idcard2.php?roll_no=$rollno' ><button  class=
            'id' >Print ID</button></a></th>";
            "</tr>";
        }

        
        ?>
</tr>
    </table>

</body>
</html>

