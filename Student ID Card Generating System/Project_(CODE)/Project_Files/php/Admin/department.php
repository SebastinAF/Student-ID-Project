<?php 

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'project';

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if(isset($_GET['action'])=="delete"){
 

    $id=$_GET['id'];
    global $conn;
    $query1= "delete from department where id='$id';";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
       header("Location:/php/Admin/department.php");
        
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add department</title>
</head>
<body>

<!-- navigation bar --><
<?php 
include 'navigation.php';
?>

<div class="content">
<!-- navigation bar -->


<div class="total">


<div class="add">
                    <h1>Add Department</h1>
                    <form action="/php/Admin/department.php" method="post" >
                    <div class='radio'>
                
                    <div >
                    <label for="ug">UG:</label>
                            <input type="radio" id="ug" name="graduation" value="ug">
                         </div>
                    <div>
                      <label for="pg">PG:</label>
                     <input type="radio" id="pg" name="graduation" value="pg">

  </div>
                    </div>
                               
                    
                    <div>
                        <label for="department">DEPARTMENT:</label>
                        <input type="text" id="department" name="department" required><br><br>                        
                        <input type="submit" name="adddepartment" >
                    </div>
                        
                    </form>
            </div>

<div class="view">
<table>
        <tr>
            <th>Department ID</th>
            <th>Department Name</th>
            <th>Graduation</th>
            <th>Action</th>
        </tr>


        <?php

        global $conn ;
   
        if ($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }
        $sql = "SELECT * FROM department";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>". $row["id"]. "</td>";
                echo "<td>". $row["department"]. "</td>";
                echo "<td>". $row["graduation"]. "</td>";
                echo "<td> <a href='/php/Admin/department.php?action=delete&id=". $row["id"]. "' >  <button class='delete'>Delete</button> </a></td>";
                echo "</tr>";
            }
        }
    
        
        
        ?>
        <!-- More rows can be added here -->
    </table>
</div>
</div>

</div>

</body>
</html>

<?php

global     $conn ;

if(isset($_POST['adddepartment'])) {
  
    $graduation = $_POST['graduation']; 
    $department = $_POST['department'];


    // Check if the username already exists
    $check_query = "SELECT * FROM department WHERE department = '$department'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) { 
        echo "<script>alert('Department Already Exists')</script>";
    } else {
        // Username doesn't exist, proceed with insertion
        $query = "INSERT INTO department ( graduation, department) VALUES ('$graduation', '$department')";
        $result = mysqli_query($conn, $query);

        if ($result) {
          
            header("Location:/php/Admin/department.php");
            //direc tion

            
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
        }
    }
}

if(isset($_POST['delete'])) {

    $query = "DELETE FROM department  ";
    $result = mysqli_query($conn, $query);

}

?>


<style>
body{
    background: #ffffff url(/im/adminpage_backgroud.jpg) center center/cover no-repeat;
    height: 850px;
}

    h1 {
    color: darkmagenta;
    text-align: center;    
    font-family: Tristan ;
    margin: 40px;
    font-size: 250%;
}

form {
   
    width: 450px;
    margin: 20px;    
}

label {
    display: block;
    margin-bottom: 10px;
    color: black;
}

.radio{
       display: flex;
}

.radio div{
    display: flex;
    margin-right:10px ;
    margin-bottom: 20px;
}

select,input {
    width: 80%;
    padding: 8px;
    border-radius: 5px;
    margin-bottom: 10px;
    box-sizing: border-box;
    
}

input[type="submit"] {
    background: #ffffff url(/im/grey_button.jpg) center center/cover no-repeat;
    color: #fff;   
    border-radius: 5px;
    cursor: pointer;
    font-size: 15px;
}

input[type="submit"]:hover{
    background: #ffffff url(/im/green_button.jpg) center center/cover no-repeat;
}


    .add{
    width: 400px;
    padding: 30px;
    background: #ffffff url(/im/admin_background.jpg) center center/cover no-repeat;
    border-radius: 15px;
    margin: 30px 20px;
    margin-top: 200px;
    flex: 1;
    border: 8px solid white;
   }
   
   button{
       margin: 10px auto;
       width: 40%;   
       color: #ffffff;
       background: #ffffff url(/im/blue_button.jpg) center center/cover no-repeat;
       padding: 10px;
       font-size: 16px;
       border-radius: 5px; 
       
   }
   
   button:hover {
       background: #ffffff url(/im/darkblue_button.jpg) center center/cover no-repeat;
       
       
       
   }
   /* table */
   table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            color: #ffffff;
            background-color: gray;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .update, .delete {
            padding: 6px 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            text-align: center;
        }

        .update {
            background-color: #4CAF50;
            color: white;
        }

        .delete {
            background-color: #f44336;
            color: white;
            width: auto;
        }

        .total{
            display: flex;
            flex :4;
        }
        .add{
            flex:1

        }
        .view{
            flex: 3;
        }
        </style>
