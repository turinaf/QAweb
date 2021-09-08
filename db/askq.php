<?php
session_start();
if (isset($_POST['submit'])) {
        include 'database.php';
        $qtitle = mysqli_real_escape_string($conn,$_POST['title']);
        $qeust = mysqli_real_escape_string($conn, $_POST['question']);
        $tags = mysqli_real_escape_string($conn, $_POST['tags']);
        $askedby = mysqli_real_escape_string($conn, $_SESSION['id']);
        $lang = mysqli_real_escape_string($conn, $_POST['lang']);
         //Chzeck for error

         if (empty($qtitle) || empty($qeust) || empty($tags)) {
            header("Location: ../user.php?ask=empty");
            exit();
         }else {
             //insert question into database.
             $query = "INSERT INTO questions(title, questoin, tags, asked_date, asked_by, lang )VALUES ('$qtitle', '$qeust', '$tags', NOW(), '$askedby', '$lang');";
             mysqli_query($conn, $query);
             header("Location: ../user.php?ask=success");
             exit();
         }

    }else {
        header("Location: ../user.php");
        exit();
    }

