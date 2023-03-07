<!DOCTYPE html>
<?php
session_start()
?>
<html lang="en">
<head>
   <?php
   include './includes/links.php'
   ?>
    <title>Document</title>
</head>
<body>
  <?php
  include './includes/navbar.php';

  ?>

  <h1><?php   echo $_SESSION['username'] ?></h1>
    

</body>
</html>
