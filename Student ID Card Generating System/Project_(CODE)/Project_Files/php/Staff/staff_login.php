<style>
body {
 
 background: #ffffff url(/im/staff_login_background.jpg) center center/cover no-repeat;
}

</style>

<!DOCTYPE html>
<html>
  <head>
    <title>STAFF Login</title>

   <link rel="stylesheet" href="/css/login.css" />
    
    
  </head>
  <body>
    <div class="all">
        <div class="container">
            <h1>STAFF login</h1>
            <form action="/php/Staff/staff_login.php" method="post">
              <label for="username">Username</label>
              <input type="text" id="username" name="username" placeholder="Enter your username" />
      
              <label for="password">Password</label>
              <input type="password" id="password" name="password" placeholder="Enter your password" required />
      
              <button type="submit">Login</button>
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

  if(!isset($_POST["submit"])){

    $user=$_POST['username'];
    $password=$_POST['password'];
    
    if($user==null || $password==null){
    die();
    }
    $query="select * from staffuser where username='$user' and password='$password';";
    
    $result=mysqli_query($conn,$query); 
      
  if($row=mysqli_fetch_array($result))
{
  session_start();
  $department=$row['department'];
  $gra=$row['category'];
  $_SESSION['dep']=$department;

   $user1= $row["username"];
   $password1= $row["password"];
    if($user1==$user && $password1==$password)
  {
         header("Location:/php/Staff/staff_page.php");
         echo 'sucessful';

  }
}
else
{
  echo "<script>alert(' Invalid UserName And Password ')</script>";
}
  }

}
else{
  
    die('not connected');
}

?>