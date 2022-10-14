<?php
Session_Start();


if (isset($_SESSION['user_name'])) {
    if (isset($_POST['submit'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
                session_destroy();
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ", htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                $fp = fopen('data.txt', 'a');
                $line = $_SESSION["user_name"] . ";" . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . "\n";
                fwrite($fp, $line);
                fclose($fp);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
} else {
    echo "You're not logged in.";
}
