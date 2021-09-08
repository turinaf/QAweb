<?php
if (isset($_POST['submit'])) {
    include 'database.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $field = $_POST['field'];
    $pass = $_POST['pass'];
    // Check for errors

    if(empty($name) || empty($email) || empty($field) || empty($pass) ) {
        header("Location: ../signup.php?signup=empty");
        exit();
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?signup=invalidEmail");
        exit();
    }else {
        //   Sign up the user here.
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
         $sql = "INSERT INTO users(name, email, field, passkey) VALUES('$name', '$email', '$field', '$hashedPass');";
         mysqli_query($conn, $sql);
         $query = "SELECT * FROM users WHERE email = '$email';";
         $result = mysqli_query($conn, $query);
         $resultCheck = mysqli_num_rows($result);
         if ($resultCheck>0) {
             while ($rows = mysqli_fetch_assoc($result)) {
                 $uid = $rows['id'];
                 $sql = "INSERT INTO profileimg (uid) VALUES('$uid');";
                 mysqli_query($conn, $sql);
             }
         }
         
        header("Location: ../login.php?signup=success");
        exit();
    }
}else {
    header("Location: ../signup.php");
    exit();
}