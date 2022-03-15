<?php
    include 'Connection.php';
    
    if(isset($_POST['Submit']) && isset($_FILES['Image']))
    {
        $var1 = rand(1111,9999);
        $var2 = rand(1111,9999);
        $var3 = md5($var1.$var2);
        $filename = $_FILES['Image']['name'];
        $up_locate = "Images/".$var3.$filename;
        $name = $_POST['Name'];
        $album = $_POST['Album'];
        $file_tmp = $_FILES['Image']['tmp_name'];

        $fileextn = pathinfo($filename, PATHINFO_EXTENSION);
        $imgextn = array("jpg","jpeg","PNG","gif");
        if(in_array($fileextn,$imgextn) === false)
        {
            $error = "This is not an image. Please Upload an Image.";
            die($error);
        }
        
        if(empty($album))
            $sql = "INSERT INTO Images(image_name, file_loc, date_time) VALUES('$name', '$up_locate', NOW())";
        else
            $sql = "INSERT INTO Images(image_name, album_name, file_loc, date_time) VALUES('$name', '$album', '$up_locate', NOW())";
        
        if($conn->query($sql))
        {
            move_uploaded_file($_FILES['Image']['tmp_name'],"./".$up_locate);
            echo "Uploaded Successfully.";
        }
        else
        {
            echo "Upload Failed: ". $conn->error;
        }
        $conn -> close();
    }
    else
    {
        echo "Error. File beyond acceptable size.";
        $conn ->close();
    }
    header("Location: Main.php");
    ?>