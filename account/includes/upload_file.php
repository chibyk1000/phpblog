<?php
session_start();

if (!isset($_FILES['file'])){
    header('../dashboard.php');
    die();
}
include './db.php';
$username = $_SESSION['username'];
$file = $_FILES['file'];
$name = $file['name'];
$error = $file['error'];
$file_size = $file['size'];
$tmp_name =    $file['tmp_name'];
$type = $file['type'];
$splitted_filename = explode('.', $name);
$ext  = end($splitted_filename); 


$mime_types = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp'];

if($error >0){
    header('location: ../profile.php?profile=error');
    die();
}



if(!in_array($type, $mime_types)){
    header('location: ../profile.php?profile=invalidfile');
    die();
}



    if($file_size > 500000){
    header('location: ../profile.php?profile=filetoolarge');
    die();
    }
echo $ext;
    $newfilename = $username .'.' . $ext;
    $dest = '../media/'.$newfilename;
    move_uploaded_file($tmp_name, $dest);

$sql = "UPDATE users set image = ? where username = ?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('location: ../profile.php?profile=stmtnotfound');
    die();
}

mysqli_stmt_bind_param($stmt, 'ss', $newfilename, $username);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
header('location: ../profile.php?profile=success');
