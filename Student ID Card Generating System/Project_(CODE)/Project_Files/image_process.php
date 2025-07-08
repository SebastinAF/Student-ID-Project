<?php

function connection(){
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'project';
    
    $db = mysqli_connect($servername, $username, $password, $dbname);
    return $db;
}

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
            $db=connection();

            $qury="update studata set image='$imgContent' where(roll_no='$roll_no');";
            $insert = mysqli_query($db,$qury); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                echo "<script>alert ('File upload failed, please try again.') </script>" ; 
            }  
        }else{ 
            echo "<script>alert ('Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.') </script>" ; 
        } 
    }else{ 
        echo "<script>alert ('Please select an image file to upload.') </script>" ; 
    } 

}


function  retriveImage($roll_no)
{

// Get image data from database
$db=connection(); 
$query= "SELECT image FROM studata  where roll_no='$roll_no'";          
$result = mysqli_query($db,$query); 
?>

<!-- Display images with BLOB data from database -->
<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,
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
