<?php

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'project';

    $conn = mysqli_connect($servername, $username, $password, $dbname);
       
    function uplode($roll_no){
   
      if(!empty($_FILES["image"]["name"])) { 
          // Get file info 
          $fileName = basename($_FILES["image"]["name"]); 
          $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
           
          // Allow certain file formats 
          $allowTypes = array('jpg','png','jpeg','gif'); 
          if(in_array($fileType, $allowTypes)){ 
              $image = $_FILES['image']['tmp_name']; 
              $imgContent = addslashes(file_get_contents($image)); 
           
              // Insert image content into database 
              global $conn;
              $db=$conn;
    
              $qury="update studata set image='$imgContent' where(roll_no='$roll_no');";
              $insert = mysqli_query($db,$qury); 
               
              if($insert){ 
                  $status = 'success'; 
                  $statusMsg = "File uploaded successfully."; 
              }else{ 
                  die("File upload failed, please try again."); 
              }  
          }else{ 
              die('Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'); 
          } 
      }else{ 
          die('Please select an image file to upload.'); 
      } 
    
    }

    if(isset($_POST['submit'])){
      

      if($conn)
      {
      
          $name = $_POST['name'];
          $email_id = $_POST['email_id'];        
          $roll_no = $_POST['roll_no'];  
          $course = $_POST['course'];
          $address = $_POST['address'];
          $mobile_no = $_POST['mobile_no'];
          $dob = $_POST['dob'];
          $blood_group = $_POST['blood_group'];
          $image_name = $_FILES['image']['name'];
          $image_tmp = $_FILES['image']['tmp_name'];
          $page_id=$_GET['page_id'];
         
          // Insert data into the database
          $sql = "update  studata set name='$name', email_id='$email_id', course='$course', address='$address', mobile_no='$mobile_no', dob='$dob', blood_group='$blood_group' where  roll_no='$roll_no';";
          $result=mysqli_query($conn,$sql);    

      
          if($image_name)
          {
            uplode( $roll_no) ;
          }


          if ($result) {
             
       if($page_id=='admin') {
        header("location:data.php");
       }
       else{
        header("location:stu_data_update.php?roll_no=".$roll_no."&page_id=".$page_id);
       }
       
              
          } else {
              die( "Error: " . $sql . "<br>" . $conn->error);
          }
               

    }
 

}

$conn->close();


