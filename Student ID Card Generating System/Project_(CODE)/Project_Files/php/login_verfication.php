<style>


body {
 
 background: #ffffff url(/im/stu_login_background.jpg) center center/cover no-repeat;
}

.or{
  width: 260px;
  text-align: center;
}
label{
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
  font-family: 'Times New Roman', Times, serif;
  font-size: larger;
}
</style>
<?php 
include ("../phpmailer/otpcode.php");

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
          <?php 
          if(isset($_GET["roll_no"]))
          {
          $roll_no=$_GET["roll_no"];
          echo "     <label for='rollnumber'>Roll Number : $roll_no</label>
                        <input type='hidden' value='$roll_no' name='roll_no'/>";
        
          }
          ?>
     
       
          <?php 
          session_start();
          $sendOtp=$_SESSION['otp'];
          
          ?>
          <label for="email">Enter OTP</label>
          <input type="text" id="email" name="otp" placeholder="Enter Otp" />
            <button type="submit" name="verfication">Verify OTP</button>
        </form>
      
      </div>
    </div>

    
      
</body>
</html>

<?php
     
if(isset($_POST['verfication'])){
  $userotp=$_POST['otp'];
  $roll_no=$_POST['roll_no'];
  echo $userotp;
  if( otpverfiction($userotp))
  {
    session_start();
    $_SESSION['studentlogin']=true;
    $_SESSION['studentroll_no']=$roll_no;
  
    header("location:../php/Admin/stu_data_update.php?roll_no=$roll_no&page_id=student");
  }
  else{
    echo "<script>alert('Invalid OTP');</script>";
  }
}
?>