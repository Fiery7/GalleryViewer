<?php
    $servername = "localhost";
    $username = "root";
    $password = "fiery123";
    $dbname = "image_DB";
    
    $conn = new mysqli($servername, $username, $password);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    echo "<br><br>";

    $sql = "CREATE DATABASE " . $dbname;
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } 
    else {
        echo "Error creating database: " . $conn->error;
    }
    $conn->close();
    echo "<br><br>";

    $conn = new mysqli($servername,$username,$password,$dbname);
    
    // $sql = "DROP TABLE Images";
    // $conn->query($sql);

    $sql="CREATE TABLE Images (
        image_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        image_name VARCHAR(30) NOT NULL,
        album_name VARCHAR(30),
        userid INT NOT NULL,
        file_loc VARCHAR(100) NOT NULL,
        date_time TIMESTAMP)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully";
    } 
    else {
        echo "Error creating table: " . $conn->error;
    }
    echo "<br><br>";

    $sql = "DROP TABLE Users";
    $conn->query($sql);

    $sql="CREATE TABLE Users (
        userid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email_id VARCHAR(40) UNIQUE NOT NULL,
        pass_word VARCHAR(40) NOT NULL)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table created successfully";
    } 
    else {
        echo "Error creating table: " . $conn->error;
    }
    echo "<br><br>";

    $sql = "SET time_zone = '+05:30'";
    if ($conn->query($sql) === TRUE) {
        echo "Time zone changed successfully.";
    } 
    else {
        echo "Error changing timezone: " . $conn->error;
    }
    $conn->close();
    ob_end_clean();
?>