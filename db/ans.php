<?php
session_start();
include 'database.php';
if (isset($_POST['submit-like'])) {
    $ansid = $_POST['ansid'];
    $sql = "UPDATE answers SET likes = likes+1 WHERE id ='$ansid';";
    mysqli_query($conn, $sql);
    header("Location: ../user.php?youliked=answer");
    exit();

}
if (isset($_POST['submit-ans'])) {
    $qid = mysqli_real_escape_string($conn, $_POST['qid']) ;
    $answer = mysqli_real_escape_string($conn, $_POST['answer']);
    $ansBy = mysqli_real_escape_string($conn, $_SESSION['id']);
    // Check for errors
    if (empty($answer)) {
        header("Location: ../user.php?answer=empty");
        exit();
    }else {
        $sql = "INSERT INTO answers (qid, answer, ans_date, ans_by) VALUES('$qid', '$answer', NOW(), '$ansBy');";
        mysqli_query($conn, $sql);

        header("Location: ../user.php?ans=success");
        exit();
    }
}
