<?php

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//echo $target_file;

// Check if image file is a actual image or fake image
//if (isset($_POST["submit"])) {
//    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//    if ($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//    } else {
//        echo "File is not an image.";
//        $uploadOk = 0;
//    }
//}
// Check if file already exists
//if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//}
// Check file size
//if ($_FILES["fileToUpload"]["size"] > 500000) {
//    echo "Sorry, your file is too large.";
//    $uploadOk = 0;
//}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    echo '<script>alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
    $url = "editor.php?id=" . $_GET['id'] . "&image=" . $_GET['image'];

    if (isset($_GET['image2'])) {
        $url = $url . "&image2=" . $_GET['image2'];
    }
    if (isset($_GET['image3'])) {
        $url = $url . "&image3=" . $_GET['image3'];
    }
    if (isset($_GET['image4'])) {
        $url = $url . "&image4=" . $_GET['image4'];
    }
    if (isset($_GET['image5'])) {
        $url = $url . "&image5=" . $_GET['image5'];
    }
    echo '<script>window.location="' . $url . '"</script>';
    $uploadOk = 0;
//    echo $url;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk != 0) {
//    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
//} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        $url = "editor.php?id=" . $_GET['id'] . "&image=" . $_GET['image'];
        if (isset($_GET['image2'])) {
            $url = $url . "&image2=" . $_GET['image2'];
        } else {
            $url = $url . "&image2=http://localhost/eshopper/picture_editor/uploads/" . $_FILES["image"]["name"];
            echo '<script>window.location="' . $url . '"</script>';
        }
        if (isset($_GET['image3'])) {
            $url = $url . "&image3=" . $_GET['image3'];
        } else {
            $url = $url . "&image3=http://localhost/eshopper/picture_editor/uploads/" . $_FILES["image"]["name"];
            echo '<script>window.location="' . $url . '"</script>';
        }
        if (isset($_GET['image4'])) {
            $url = $url . "&image4=" . $_GET['image4'];
            $url = $url . "&image5=http://localhost/eshopper/picture_editor/uploads/" . $_FILES["image"]["name"];
            echo '<script>window.location="' . $url . '"</script>';
        } else {
            $url = $url . "&image4=http://localhost/eshopper/picture_editor/uploads/" . $_FILES["image"]["name"];
            echo '<script>window.location="' . $url . '"</script>';
        }
//        echo $url;
        
    } else {
        echo "Sorry, there was an error uploading your file.";
        $url = "editor.php?id=" . $_GET['id'] . "&image=" . $_GET['image'];
        if (isset($_GET['image2'])) {
            $url = $url . "&image2=" . $_GET['image2'];
        }
        if (isset($_GET['image3'])) {
            $url = $url . "&image3=" . $_GET['image3'];
        }
        if (isset($_GET['image4'])) {
            $url = $url . "&image4=" . $_GET['image4'];
        }
        if (isset($_GET['image5'])) {
            $url = $url . "&image5=" . $_GET['image5'];
        }
//        echo $url;
        echo '<script>window.location="' . $url . '"</script>';
    }
}
