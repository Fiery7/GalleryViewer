<!DOCTYPE html>
<html>
    <?php
    include 'DB_TABLE_CREATE.php'
    ?>
    <head>
        <link rel = 'stylesheet' href = 'MainDsn.css'>
        <style>@import url('https://fonts.googleapis.com/css2?family=Alegreya&display=swap');</style>
        <title>Gallery Viewer</title></head>
    <body>
    <?php
        $search = "";
        if(isset($_GET['_Search']))
            $search = $_GET['_Search'];
    ?>

    <div class = top_part>
        <h1>Gallery Viewer</h1>
        <form class = "Search" action="Main.php" method="GET">
                <label for="_Search" style="color: rgb(0, 0, 0);">Search Image:</label>
                <input type="text" id="_Search" name="_Search" placeholder="Search here">
                <input type="submit" value="Search">
        </form>
    <div class = "Upload"><button class="open-button" onclick="openForm()">Upload</button></div>
    </div>
    <br><br>
    <?php
    include 'DB_DISPLAY.php'
    ?>
    <div class="popup" id = "Upload_id"><br>
        <form class = "form-container" id = "U_Form" action="DB_UPLOAD.php" enctype="multipart/form-data" method="POST">
            <button class="close_btn" formnovalidate>✖</button>
            <h2 style="text-align: center;">Upload Image</h2>
            <label for="Name">Name:</label>
            <input type="text" id="Name" name="Name" placeholder="Name" required><br><br>

            <label for="Album">Album:</label>
            <input type="text" id="Album" name="Album" placeholder="Album"><br><br>

            <input type="file" id="Image" name="Image" required>

            <input class = "btn" type="submit" name="Submit">
        </form>
    </div>
        <script>
            function openForm() {
                document.getElementById("U_Form").style.display = "none";
                document.getElementById("Upload_id").style.display = "block";
                setTimeout(display_form, 500);
            }
            function display_form() {
                document.getElementById("U_Form").style.display = "block";
            }
        </script>

    <div class="hero">
        <div class="form-box">
            
        </div>
    </div>
    </body>
</html>