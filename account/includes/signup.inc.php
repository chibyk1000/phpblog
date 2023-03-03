  <?php

    if (!isset($_POST['sign-up'])) {
        header('location: ../create-account.php?page=notfound');
        die();
    }
  include './db.php';
  include './functions.php';
    $firstname = $_POST['firstname'];
    $lastname = $_POST["lastname"];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if(empty($firstname) || empty($lastname) || empty($username) || empty($password) ||empty($confirm_password)){
        header('location: ../create-account.php?signup=empty-input');
        die();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('location: ../create-account.php?signup=invalid-email&firstname='.$firstname.'&lastname='.$lastname.'&username='.$username.'');
        die();
    }

    if(!preg_match("/^([a-zA-Z' ]+)$/", $firstname) ||
    !preg_match("/^([a-zA-Z' ]+)$/", $lastname)
       ){
        header('location: ../create-account.php?signup=invalid-character&email='.$email);
        die();
       }

       if(strlen($password)< 8){
        header('location: ../create-account.php?signup=short-password&firstname=' . $firstname . '&lastname=' . $lastname . '&username=' . $username . '');
        die();
       }

       if($password !== $confirm_password){
        header('location: ../create-account.php?signup=password-do-not-match&firstname=' . $firstname . '&lastname=' . $lastname . '&username=' . $username . '');
        die();

       }


       if (userExists($conn, $username, $email) !== false){
        header('location: ../create-account.php?signup=userexist&firstname=' . $firstname . '&lastname=' . $lastname . '&username=' . $username . '');
        die();
       }

    //    sign in a user

    $hasshedpassword = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (firstname, lastname, username, email, password) VALUES('$firstname', '$lastname', '$username', '$email', '$hasshedpassword')";

    mysqli_query($conn, $sql);
    header('location:../login.php?signup=success');

       
    ?>

    

