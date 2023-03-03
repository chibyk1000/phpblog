<?php

if (!isset($_POST['userid']) && !isset($_POST['password']) ) {
    header('location: ../login.php?page=notfound');
    die();
}

include './db.php';
include './functions.php';


$userid = $_POST['userid'];
$password = $_POST['password'];

if(empty($userid) || empty($password)){
    die('empty inputs');
}
$userexist = userExists($conn, $userid, $userid);
if($userexist === false){
    die('user not found');
}

if(!password_verify($password, $userexist['password'])){
    die('invalid password');
}

session_start();
$_SESSION['username'] = $userid;

die('success');

