<?php
session_start();
include 'database.php';
if (isset($_SESSION['name'])) {
    $uid = $_SESSION['id'];
    if (isset($_POST['submit-update'])) {
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTempName = $_FILES['file']['tmp_name'];
        $fileType = $_FILES['file']['type'];
        $fileError = $_FILES['file']['error'];
        $filesSize = $_FILES['file']['size'];


        $fileExt = explode(".", $fileName);
        $fileActualExt = $fileExt[1];
        $allowed = array("jpg", "jpeg", "png");
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($filesSize < 1000000) {
                    $newFileName = "profile".$uid.".".$fileActualExt;
                    $destination = '../uploads/'.$newFileName;
                    move_uploaded_file($fileTempName, $destination);

                    $sql = "UPDATE profileimg SET status=1 WHERE uid='$uid';";
                    mysqli_query($conn, $sql);
                    header("Location: ../setting.php?changes=saved");
                    exit();  
                }else {
                    echo "Your file size is too large, try smaller size";
                }
                
            }
        }else {
            header("Location: ../setting.php?change=errorOccurred");
            exit();
        }
    }elseif (isset($_POST['submit-profile'])) {
        $newName = mysqli_real_escape_string($conn, $_POST['name']);
        $newEmail = mysqli_real_escape_string($conn, $_POST['email']);
        $newField = mysqli_real_escape_string($conn, $_POST['field']);
        $newPass = mysqli_real_escape_string($conn, $_POST['pass']);
        if (empty($newName) || empty($newEmail) || empty($newField) || empty($newPass) ) {
            header("Location: ../setting.php?update=empty");
            exit();
        }else {
            $sql = "UPDATE users SET name='$newName', email='$newEmail', field='$newField', passkey='$newPass' WHERE id='$uid';";
            mysqli_query($conn, $sql);
            $query = "SELECT * FROM users WHERE id='$uid';";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result)>0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    $_SESSION['id'] = $rows['id'];
                    $_SESSION['name'] = $rows['name'];
                    $_SESSION['email'] = $rows['email'];
                    $_SESSION['field'] = $rows['field'];
                }
            }
            header("Location: ../setting.php?update=success");
            exit();
        }
    }
}