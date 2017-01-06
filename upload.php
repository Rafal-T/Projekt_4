<!DOCTYPE html>
<html>
    <head>
        <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <META NAME="Author" CONTENT="Rafał Teodorowski">
        <META NAME="Description" CONTENT="Logowanie, loguj">
        <META NAME="Keywords" CONTENT="Rafał, Teodorowski, informatyka, programowanie, internetowe, politechnika, warszawska">
        <link rel="stylesheet" href="../style/menu.css" type="text/css" media="all" />	
        <title>sprawdz</title>
    </head>
    <body>
        <?php
        $target_dir = "/home/stud/teodoror/WWW/Projekt_4/pliki/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        
// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

// Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        /*
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
         * 
         */
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                chmod($target_file, 0777);
                echo "Plik zostal wyslany poprawnie. </br>"; // " . basename($_FILES["fileToUpload"]["name"]) . "
            } else {
           //     echo "Wystpąpił problem podczas uploadowania pliku";
            }
        }
        ?>
        <div>

            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <p></p>
                <input type="submit" value="Upload Image" name="submit">
            </form>

        </div>


    </body>
</html>