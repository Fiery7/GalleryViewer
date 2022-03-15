<?php
    include 'Connection.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if(!empty($search))
        $sql = "SELECT * FROM Images WHERE LOCATE('$search',image_name) > 0 OR LOCATE('$search',album_name) > 0 ORDER BY date_time DESC";
    else
        $sql = "SELECT * FROM Images ORDER BY date_time DESC";
    
    $stmt = $conn -> query($sql);
    
    echo "<tr>";
    while($row = $stmt -> fetch_array())
    {
        echo "<td><a href = 'IMG_DISPLAY.php?id=".$row['image_id']."' target = '_blank'>
        <img title = '".$row['image_name']." Uploaded on:".$row['date_time']."'
        src = './".$row['file_loc']."' 
        alt = '".$row['image_name']."' 
        style = 'border-radius: 10px; height: 300px'/></a>   </td>";
    }
    echo "</tr>";
?>