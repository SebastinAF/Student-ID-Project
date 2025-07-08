<style>
    body {
      font-family: Arial, sans-serif;
      background: #ffffff url(/im/form_backgroud.jpg) center center/cover no-repeat;
      
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
      background: #ffffff url(/im/blue_button.jpg) center center/cover no-repeat;
      color: #fff;
      border-radius: 5px;
    }

    .action-button:hover {
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
    left: 150px; 
    top: 20px; 
    z-index: 999; 
}

.back:hover{
    background-color:#00ff4c;
    
}

  </style>

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
<a href="/php/Staff/staff_page.php" ><button class="back"></button></a>
        <h1> ROLL NUMBER GENERATOR</h1>
      
  </header>

      <div class="stu_data">
      <form action="/php/Staff/roll_no_generator.php" method="post" >

      
      <div class="input1">
        <!-- Roll Number -->
        <label for="roll_number">Academic Year :</label>
        <input type="text" name="year"  id="roll_number" required placeholder="Batch_Year"/>
        </div>

      <div class="input1">
        <!-- Roll Number -->
        <label for="roll_number">Prefix Number :</label>
        <input type="text" name="defult"  id="roll_number" required placeholder="Default"/>
        </div>

        <div class="input1">
        <!-- Roll Number -->
        <label for="roll_number">Starting Roll Number :</label>
        <input type="text" name="start"  id="roll_number" required placeholder="starting Number"/>
        </div>

        <div class="input1">
        <!-- Roll Number -->
        <label for="roll_number">Ending Roll Number :</label>
        <input type="text" name="end"  id="roll_number" required placeholder="End Number"/>
        </div>
        
        
        
      <!-- Submit Button -->
      <input type="submit" name="submit" value="Submit" />

      </form> 
      
    </div>
</body>
</html>

<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'project';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $defult = $_POST['defult'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $year=$_POST['year'];
    session_start();
      
    $course=$_SESSION['dep'];
    

    while ($start <= $end) {
      //finding $start number lenthgh
      if($end>=100)
      {
        if($start<10)
        {
          $start_number="00".$start;
        }
        else if($start<100){
          $start_number="0".$start;
        }
        else{
          $start_number=$start;
        }
      }
      else{
        if($start<10)
        {
          $start_number="0".$start;
        }
        else{
          $start_number=$start;
        }

      }

      //
      $roll_number = $defult . $start_number;
        $query = "INSERT INTO studata(roll_no,batch_year,course) VALUES ('$roll_number','$year','$course');";
        $result = mysqli_query($conn, $query);
        $start++;
    }

    if ($result) {
        echo "<script>alert('Successfully Added')</script>";
    } else {
        echo "<script>alert('Error: Unable to insert data')</script>";
    }
}

// Close connection
mysqli_close($conn);
?>

