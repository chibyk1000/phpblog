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

        <form action="" class="grid w-1/3 bg-white p-3 mx-auto shadow-lg  rounded loginfrm">
            <h1 class="font-bold text-3xl text-center">Sign In </h1>
            <input type="text" placeholder="Username or Email" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2" name="userid">
            <input type="password" placeholder="Password" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2" name="password">
            <button class="bg-rose-500 text-white text-lg h-12" name="login">Sign In</button>

            <p class="my-4">Don't have an account yet? <a href="./create-account.php" class="font-semibold text-rose-500">create account</a></p>
            <p class="my-3 text-red-500 err"></p>
        </form>

    </section>
    <script src="./assets/js/auth.js">    </script>
</body>

</html>