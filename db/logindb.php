<?php
include 'database.php';
session_start();
if (isset($_POST['submit-lang'])) {
    $lang = mysqli_real_escape_string($conn, $_POST['lang']);

    if(empty($lang)){
        header("Location: ../index.php");
        exit();
    }elseif ($lang == "aoromo") {
        header("Location: ../oromo/index.php");
        exit();
    }
}
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pass'];
    // Checking for errors
    if (empty($email) || empty($pwd)) {
        header("Location: ../login.php?login=empty");
        exit();
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../login.php?login=invalidemail");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE email = '$email';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        if (password_verify($pwd, $row['passkey'])) {
            //login user here.
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['field'] = $row['field'];
            header("Location: ../user.php?login=success");
            exit();
           
        }else {
            header("Location: ../login.php?login=wrongpassword");
            exit();
        }
    }
}
