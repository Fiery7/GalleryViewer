<!-- Define the slideshow container -->
<!DOCTYPE html>
<html>
<head>
        <link rel = 'stylesheet' href = 'slideshow.css'>
        
</head>
<body>
<div id="slideshow">
        <div class="slide-wrapper">
             
        <!-- Define each of the slides
         and write the content -->
         <!-- <div class="slide">
                <h1 class="slide-number">
                    GeeksforGeeks
                </h1>
            </div> -->
           <?php 
           include 'Connection.php';

           if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
           }
           $sql = "SELECT * FROM Images ORDER BY date_time DESC LIMIT 4";
           $stmt = $conn -> query($sql);
           echo "<tr>";
            while($row = $stmt -> fetch_array())
            {
                echo "<td><div class='slide' href = 'IMG_DISPLAY.php?id=".$row['image_id']."' target = '_blank'>
                <img title = '".$row['image_name']." Uploaded on:".$row['date_time']."'
                src = './".$row['file_loc']."' 
                alt = '".$row['image_name']."' 
                style = 'border-radius: 10px; height:630px '/></div>   </td>";
            }
            echo "</tr>";
            ?>
        </div>
    </div>
        helooooooooooooooooooooooooooo
</body>
</html>
