<!DOCTYPE html>
<?php
    include "Connection.php";

    $img_id = $_GET['id'];
    $sql = "SET time_zone = '+05:30'";
    $conn -> query($sql);
    $sql = "SELECT * FROM Images WHERE image_id = '$img_id'";
    $stmt = $conn -> query($sql);
    
    $row = $stmt -> fetch_array();
    
?>
<html>
    <head>
        <title>Image: <?php echo $row['image_name']?></title>
    </head>
    <body style="background-color: rgb(50,50,50);">

        <h1 style="color: gold; text-align: center">Image: <?php echo $row['image_name']?></h1><br>
        <center><img src = ./<?php echo str_replace(" ", "%20", $row['file_loc'])?> 
        alt = <?php echo $row['image_name']?> 
        style = 'width:500px'/></center>
        <br>
        <h2 style="color:khaki; text-align:center"><?php echo $row['image_name']?></h2>

        <p style="color:white; text-align:center">Uploaded on <?php echo $row['date_time']?>
        <br><br><?php if(!empty($row['album_name']))
        echo "Album: ".$row['album_name']; ?><br></p>
        <p style="text-align: center;"><a href = <?php echo $row['file_loc']?> download = <?php echo $row['image_name']?> style="color:greenyellow">
        <i>Download Image</i></a></p>
        <?php $conn ->close(); ?>
    </body>
</html>