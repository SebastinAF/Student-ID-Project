<style>
  body{
    background: #ffffff url(/im/form_backgroud.jpg) center center/cover no-repeat;
    
  }
 

</style>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>STUDENT DATA</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
  </head>
  <body>

  
    <div class="stu_data">
      <div class="heading">
        <h1>STUDENT DETAILS</h1>
      </div>

      
<?php

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'project';

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['roll_no']))
{
    $roll=$_GET['roll_no'];
    $page_id=$_GET['page_id'];
    global $conn;
    $query1= "select * from studata where roll_no='$roll';";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
      
      while($row=mysqli_fetch_assoc($result1))
      {
        //$row array to get all value is 
        $name=$row['name'];       
        $course=$row['course'];
        $rollno=$row['roll_no'];
        $address=$row['address'];
        $phone=$row['mobile_no'];
        $dob=$row['dob'];
        $blood_group=$row['blood_group'];
        $email=$row['email_id'];
        $image=$row['image'];
      
      }

        
    }


  }

?>

      <form action="/php/Admin/update_module.php?page_id=".$page_id method="post" enctype="multipart/form-data">
      
      <div class="input1">
      <input type="hidden" value="<?php echo $rollno?>" name="roll_no">
      <label type="text"  name="u"  id="roll_number"><?php echo "Roll NO :" .$roll;?></label>      
      
            <img style="margin: 10px;" width="100px" src="data:image/jpg;charset=utf8;base64,
            <?php echo base64_encode($image); ?>" /> 
      </div>
        
      <div class="input1">
         <label for="image">Choose Image:</label>
         <input type="file"  name="image" id="image" accept="image/*">         
      </div>

      <div class="input1">       
        <!-- Name -->
        <label for="name">Name (*Caps):</label>
        <input type="text" value="<?php echo $name;?>" name="name" id="name"required placeholder="Enter Name in capital letters" />
      </div>

      <div class="input1">
        <!-- Course -->
        <label for="course">Course:</label>
        <input value="<?php  echo $course?>" type="text" name="course" id="course" readonly required placeholder="Enter Course"/>
      </div>

      <div class="input1">
      <!-- Address -->
      <label for="address">Address:</label>
      <textarea name="address" id="address"  required placeholder="Address" >
      <?php echo $address;?>
      </textarea>
      </div>

      <div class="input1">      
       <label for="email">Email ID:</label>
       <input value="<?php echo $email;?>"  type="email" name="email_id" id="email" readonly required placeholder="abcd098@gmail.com"/>
      </div> 


      <div class="input1">
       <label for="mobile_no">Phone Number:</label>
       <input value="<?php echo $phone;?>" type="phone" name="mobile_no" id="mobile_no" required placeholder="91+"/>
      </div>
 
      <div class="input1">
       <!-- Date of Birth -->
       <label for="dob">Date of Birth:</label>
       <input value="<?php echo $dob;?>" type="date" name="dob" id="dob" required />
      </div>
       
      <div class="input1">
        <!-- Blood Group -->
        <label for="blood_group">Blood Group:</label>
        <input value="<?php echo $blood_group;?>" type="text" name="blood_group" id="blood_group" required />
      </div>
      
        <!-- Submit Button -->
        <input type="submit" name="submit" value="Save" />
      </form>
    </div>
  </body>
</html>
