<?php

if (!isset($_POST['update'])){
  header('location:../profile.php?error');
;
  die();

}
include './db.php';
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email'] );
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);

$sql = "UPDATE users SET firstname = ?, lastname=?, username=?, email=?, dob=?, gender=? WHERE username=?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header('location:../profile.php?errorinupdate');
    die();
}

mysqli_stmt_bind_param($stmt, 'sssssss', $firstname, $lastname, $username, $email, $dob, $gender, $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header('location:../profile.php?upadate=success');