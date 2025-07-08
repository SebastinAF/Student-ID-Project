<?php 
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'project';

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
?>


<style>
    
body {
    font-family: Arial, sans-serif;
    background: #ffffff url(/im/adminpage_backgroud.jpg) center center/cover no-repeat;
    margin: 20px;
    height: 100px;
}

h1 {
    color: white;
    text-align: center;
    text-shadow: 5px 5px 10px #000000;
    font-family: Tristan ;
    margin: 40px;
    font-size: 250%;
}

h2 {
    color: darkmagenta;
    text-align: center
      
}

form {
    width: 450px;
    margin: 20px;    
}

label {
    display: block;
    margin-bottom: 5px;
    color: black;
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

.box11{
   margin-top: 80px;
    font-weight: bold;   
    display: flex;
    flex-direction: row;
    flex: 2;
    font-family: Heather ;
    border-radius:20px ;
    font-size: 20px;
}

.add{
    
 padding: 30px;
 background: #ffffff url(/im/admin_background.jpg) center center/cover no-repeat;
 border-radius: 15px;
 margin: 30px 20px;
 flex: 1;
 border: 8px solid white;
}

.remove{

    background: #ffffff url(/im/admin_background.jpg) center center/cover no-repeat;
 padding: 30px ;
 border-radius: 15px;
 margin: 30px;
 flex:1; 
 border: 8px solid white;
}

.radio{
       display: flex;
}

.radio div{
    display: flex;
    margin-right:40px ;
    margin-bottom: 10px;
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
    cursor: alias;
}

</style>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add staff</title>
</head>
<body>

<!-- navigation bar --><
<?php 
include 'navigation.php';
?>

<div class="content">
<!-- navigation bar -->
       

    <div class="box1">
  
    <div class="box11">
    
            <div class="add">
                    <h2>Add Staff Users</h2>
                    <form action="/php/Admin/staff.php" method="post" >

                    <div class='radio'>
                
                    <div >
                    <label for="ug">UG:</label>
                    <?php 
                      if(isset($_GET['action'])=="setdepartment")
                      {
                          $graduation=$_GET['gra'];
                          if($graduation=="ug")
                          {
                            echo"   <input type='radio' name='category' value='ug' onclick=getDepartments('ug') checked>
                            </div>
                       <div>
                         <label for='pg'>PG:</label>
                         <input type='radio' name='category' value='pg' onclick=getDepartments('pg')>";
                          }
                          else{
                            echo"   <input type='radio' name='category' value='ug' onclick=getDepartments('ug') >
                            </div>
                            <div>
                         <label for='pg'>PG:</label>
                         <input type='radio' name='category' value='pg' onclick=getDepartments('pg') checked>";
                          }

                      }
                      else{
                        echo"   <input type='radio' name='category' value='ug' onclick=getDepartments('ug') >
                        </div>
                   <div>
                     <label for='pg'>PG:</label>
                     <input type='radio' name='category' value='pg' onclick=getDepartments('pg') >
";

                      }
                    
                    ?>
                 
                     </div>
                    </div>

                    <label for="department">Select Department:
                        <select id="department" name="department" required> 
                            <option value="default">default</option>  
                            <?php
                            
                            if(isset($_GET['action'])=="setdepartment")
                            {
                                $graduation=$_GET['gra'];

                                $sql = "SELECT * FROM department WHERE graduation = '$graduation';";
                                $result = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($result)>=0)
                                {
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $department=$row['department'];
                                        echo "<option value='$department'>$department</option>";
                                    }
                                }
                            }


                           
                            ?>                         
                        </select>                
                    </label>

                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required><br><br>
                        
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required><br><br>
                        
                        <input type="submit" name="adduser" value="Add User">
                    </form>
            </div>
        
            <div class="remove">
                <h2>Remove Staff User</h2>
                <form id=removeuser action="/php/Admin/staff.php" method="post">
                    <label for="removeuser">Username:</label>
                    <input type="text" id="username" name="username" required><br><br>

                    <input type="submit" name="removeuser" value="Remove User">
                
                </form>
    
                <div>
                    <a href="/php/Admin/view_user.php"> <button type="submit"> VIEW STAFFS</button></a>
                    </div>
                    
            </div>   
</div>  

    </div>
</body>
</html>

<?php

global $conn;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['adduser'])) {
  
    $password = $_POST['password'];
    $username = $_POST['username'];
    $category = $_POST['category']; 
    $department = $_POST['department'];

    // Check if the username already exists
    $check_query = "SELECT * FROM staffuser WHERE username = '$username'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) { 
        echo "<script>alert('User Already Exists')</script>";
    } else {
        // Username doesn't exist, proceed with insertion
    

        $query = "INSERT INTO staffuser (username, password, category, department) VALUES ('$username', '$password', '$category', '$department')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('New USER Created Successfully')</script>";
            
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
        }
    }
}

if(isset($_POST['removeuser'])) {
    $username = $_POST['username'];
 
    $query = "DELETE FROM staffuser WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>alert('USER Removed Successfully')</script>";
        } else {
            echo "<script>alert('USER Not Available')</script>";
        }
    } else {
        echo "<script>alert('Error executing query: " . mysqli_error($conn) . "')</script>";
    }
}

// Close connection
$conn->close();

?>


<script>
    function getDepartments(category) {
        window.location.href="/php/Admin/staff.php?gra="+category+"&action=setdepartment";
    // Send AJAX request to server4
  <?php 

  //header('location:');
  ?>
}



</script>


