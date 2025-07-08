<style>


body {
 
 background: #ffffff url(/im/stu_login_background.jpg) center center/cover no-repeat;
}

.or{
  width: 260px;
  text-align: center;
}
</style>
<?php 
include ("../phpmailer/otpcode.php");


session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css" />
    <title>STUDEN PORTAL</title>
</head>
<body>

<div class="all">
      <div class="container">
        <h1>STUDENT LOGIN</h1>
        <form method="post" action="#">
          <label for="rollnumber">Roll Number</label>
          <input type="text" id="rollnumber"  name="rollnumber" placeholder="Roll_No" />
          <p class="or">OR</p>
          <label for="email">Email ID</label>
          <input type="text" id="email" name="email_id"  placeholder="Email_ID" />

            <button type="submit" name="submit">Send OTP</button>
        </form>
      
      </div>
    </div>

    
      
</body>
</html>

<?php
     
     $db_host = 'localhost';
     $db_user = 'root';
     $db_password = '';
     $db_name = 'project';
     
     $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);


if($conn)
{


  if(isset($_POST["submit"])){

    $roll_no=$_POST['rollnumber'];
    $email_id=$_POST['email_id'];


    if ($roll_no == "") {
      $query = "SELECT * FROM studata WHERE email_id='$email_id'";
      $result = mysqli_query($conn, $query); 
  
      if ($result) {
          $row = mysqli_fetch_array($result);
          if ($row) {
              $roll_no = $row['roll_no'];
              sendotp($email_id);
              header("Location: /php/login_verfication.php?roll_no=$roll_no");
              exit; // Ensure script execution stops after redirection
          } else {
              echo "<script>alert('Invalid Email')</script>";
          }
      } else {
          // Log the error or provide a more informative message
          echo "<script>alert('Database error: " . mysqli_error($conn) . "')</script>";
      }
  } 
  
    else{


      $query="select * from studata where roll_no='$roll_no' ;";
      $result=mysqli_query($conn,$query); 
      if(mysqli_num_rows($result))
      {
   
              if($row=mysqli_fetch_array($result))
              {
                $roll_no=$row['roll_no'];
                $email_id=$row['email_id'];
                sendotp($email_id);
                header("Location:/php/login_verfication.php?roll_no=$roll_no");
            }
      }
       else
      {
        echo "<script>alert('!! Invalid roll NO')</script>";
      }


    }
      
  }

}
else{
  
    die('Database Connection Error');
}
?>