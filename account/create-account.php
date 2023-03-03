<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include '../includes/links.php'
    ?>
    <title>Document</title>
</head>

<body class="bg-slate-100">
    <?php
    include '../includes/navbar.php'
    ?>
    <section class="h-[90vh] grid place-items-center ">

        <form action="./includes/signup.inc.php" class="grid w-1/3 bg-white p-3 mx-auto shadow-lg  rounded" method="post">
            <h1 class="font-bold text-3xl text-center">Create Account </h1>
<?php
if(isset($_GET['firstname'])){
    echo '      <input type="text" placeholder="First Name" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2" name="firstname" value="'.$_GET['firstname'].'">';
}else{
    echo '      <input type="text" placeholder="First Name" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2" name="firstname">';
}
if(isset($_GET['lastname'])){
    echo '      <input type="text" placeholder="Last Name" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2" name="lastname" value="'.$_GET['lastname'].'">';
}else{
    echo '     <input type="text" placeholder="Last Name" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2" name="lastname">';
}




?>
      
            
            <input type="text" placeholder="Email" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2" name="email">
            <input type="text" placeholder="Username" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2" name="username">
            <input type="password" placeholder="Password" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2" name="password">
            <input type="password" placeholder="Confirm Password" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2" name="confirm-password">
            <button class="bg-rose-500 text-white text-lg h-12" name="sign-up">Sign Up</button>

            <p class="my-4">Already have an account? <a href="./login.php" class="font-semibold text-rose-500">Sign in</a></p>

            <?php
           if(isset($_GET['signup'])){
if($_GET['signup'] === 'empty-input'){
    echo '<p class="text-red-600">Please fill in all fields</p>';
    die();
}
if($_GET['signup'] === 'invalid-email'){
    echo '<p class="text-red-600">Please enter a valid email address</p>';
    die();
}
           }
            ?>
        </form>

      
    </section>
</body>

</html>