<?php

if (isset($_POST['submit'])){
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileNameNew = 'image';


    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    for($i=0; $i<count($fileName); $i++) {

        $fileExt = explode('.', $fileName[$i]);
        $fileActualExt = strtolower(end($fileExt));

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError[$i] === 0) {
                if ($fileSize[$i] < 1000000) {
                    $fileNameNew .= uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = 'uploads/' . $fileNameNew;
                    move_uploaded_file($fileTmpName[$i], $fileDestination);
                    header("location: index.php?uploadsucces");
                } else {
                    echo ' votres de document est trop lourd';
                }
            } else {
                echo 'il y a une erreur';
            }
        } else {
            echo 'Vous ne pouvez pas upload un document autre que des image';
        }
    }

}

