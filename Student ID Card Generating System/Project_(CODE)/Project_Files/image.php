
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form name="photo" action="image.php" method="post" >

<input type="text" name="roll_no">
<button name="search">search image</button>
</form>

<?php
if(isset($_POST["search"]))
{
    include("image_process.php");
    $roll_no=$_POST['roll'];

    echo($roll_no);
    retriveImage($roll_no);
}

?>
</body>
</html>