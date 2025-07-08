<style>
    body {
      font-family: Arial, sans-serif;
      background: #ffffff url(/im/form_backgroud.jpg) center center/cover no-repeat;
      
    }
h1{
  margin-top: 30px;
}
    h3{
      background: white;
  background-clip: text;
 color: transparent;
    }
    
    header {
      margin: 30px;
      color: black;
      padding: 10px;
      text-align: center;
    }

    .actions{
     align-self: center;
      width: fit-content;
      margin: 15px;
      padding: 25px;
      border-radius: 5px;       
      text-align: center;     
    }

.input1{
    margin: 50px;
   }

.stu_data{
    margin: 50px;
}

.heading{
  color: #ffffff;
}



    .action-button {
     
      padding: 10px  ;
      font-size: 16px;
      margin: 10px ;
      cursor: pointer;
      background: #ffffff url(/im/red_button.jpg) center center/cover no-repeat;
      color: #fff;
      border-radius: 5px;
    }

    .action-button:hover {
      background: #ffffff url(/im/green_button.jpg) center center/cover no-repeat;
    }
  </style>
<?php
session_start();
$course=$_SESSION['dep'];
echo "<h1>Department : $course</h1>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <title>STAFF Page</title>
</head>
<body>
<header>
    <h1>STAFF Dashboard</h1>
  </header>

      <div class="stu_data ">
        <div class="center">
    

      <div class="heading">
        <h3>ADD STUDENTS EMAIL AND ROLL NUMBER</h3>
      </div>

      <div >
        <a href="/php/Staff/roll_no_generator.php"> <button class="action-button" type="submit"> Generat Roll No </button></a> </div>
                    
      <div >
       <a href="/php/Staff/update_email.php">  <button class="action-button" type="submit">Update Email_ID</button></a>
      </div>
      
      <div >
        <a href="/php/Staff/data.php"><button class="action-button" type="submit" > View Student Details</button></a>
      </div>
      
  </div>
 
    </div>
</body>
</html>

<?php

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'project';

    $conn = mysqli_connect($servername, $username, $password, $dbname);
      
    if($conn) {
      if(isset($_POST['submit'])) {
          $roll_no = $_POST['roll_no'];
          $email_id = $_POST['email_id'];
  
         
          $check_query = "SELECT * FROM studata WHERE roll_no = '$roll_no' and email_id = '$email_id'";
          $check_result = mysqli_query($conn, $check_query);
  
          if(mysqli_num_rows($check_result) > 0) {
             
              echo "<script>alert('Email_ID and Roll number already exists')</script>";
          } else {
             
              $sql = "INSERT INTO studata (email_id,roll_no) VALUES ('$email_id','$roll_no')";
              $result = mysqli_query($conn, $sql); 
  
              if($result) {
                  echo "<script>alert('Successfully submitted')</script>";
              } else {
                  echo "<script>alert('Failed to submit')</script>";
                  die( "Error: " . $sql . "<br>" . $conn->error);
              }
          }
      }
  }

$conn->close();

?>
