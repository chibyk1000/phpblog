<nav class="flex bg-white justify-between h-20 border-b items-center pl-5">
    <a href="">Kblog</a>
    <ul class="flex w-1/3  max-lg:hidden  justify-between">
        <li><a href="">Home</a></li>
        <li><a href="">News</a></li>
        <li><a href="">Sports</a></li>
        <li><a href="">Entertaiment</a></li>
        <li><a href="">politics</a></li>
    </ul>

    <div class="flex w-[16rem] justify-evenly">
        <?php if (isset($_SESSION['username'])) : ?>
            <a href="./logout.php">Logout</a>
            <a href="./account/profile.php">profile</a>
            <a href="./account/dashboard.php">dashboard</a>
        <?php else : ?>
            <a href="./account/login.php">Login</a>
            <a href="./account/create-account.php">Sign up</a>
        <?php endif ?>


    </div>
</nav>