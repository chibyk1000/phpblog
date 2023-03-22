<?php

if (!isset($_POST['title']) || !isset($_POST['content'])|| !isset($_FILES['image'])) {
  http_response_code(404);
 json_encode(['message'=> 'not found']);
}

include './db.php';
$title = $_POST['title'];
$content = $_POST['content'];
$image = $_FILES['image'];

$name = $image['name'];
$error = $image['error'];
$file_size = $image['size'];
$tmp_name =    $image['tmp_name'];
$type = $image['type'];
$splitted_filename = explode('.', $name);
$ext  = end($splitted_filename);

$mime_types = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp'];

if ($error > 0) {
  http_response_code(400);
  die('error while uploading images');
}



if (!in_array($type, $mime_types)) {
http_response_code(400);
  die('invalid file type');
}



if ($file_size > 500000) {
  http_response_code(400);
  die('file is too large');
}

$newfilename = 'product-'. uniqid() . '.' . $ext;
$dest = '../media/products/' . $newfilename;
move_uploaded_file($tmp_name, $dest);

$sql = "INSERT INTO posts(content, title, images) VALUES(?, ?, ?)";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  http_response_code(500);
  die('error in connection');
}

mysqli_stmt_bind_param($stmt, 'sss', $content, $title,  $newfilename);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

http_response_code(200);
die('success');







