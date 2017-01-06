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
        $valid_formats = array("jpg", "png", "gif", "zip", "bmp");
        $max_file_size = 500000; //100 kb
        $path = "/home/stud/teodoror/WWW/Projekt_4/pliki/"; // Upload directory
        $count = 0;

        if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
            // Loop $_FILES to exeicute all files
            foreach ($_FILES['files']['name'] as $f => $name) {
                if ($_FILES['files']['error'][$f] == 4) {
                    continue; // Skip file if any error found
                }
                if ($_FILES['files']['error'][$f] == 0) {
                    if ($_FILES['files']['size'][$f] > $max_file_size) {
                        $message[] = "$name is too large!.";
                        continue; // Skip large files
                    } elseif (!in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats)) {
                        $message[] = "$name is not a valid format";
                        continue; // Skip invalid file formats
                    } else { // No error found! Move uploaded files 
                        if (move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path . $name)) {
                            chmod($path . $name, 0777);
                            $count++; // Number of successfully uploaded file
                        }
                    }
                }
            }
        }
        ?>
        <div>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
                <p></p>
                <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
                <p></p>
                <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
                <p></p>
                <input type="submit" value="Upload!" />
            </form>

        </div>


    </body>
</html>