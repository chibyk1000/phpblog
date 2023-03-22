<?php
session_start()

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include './includes/links.php'
    ?>
    <title>Dashboard</title>
</head>

<body>
    <div class="flex min-h-screen">
        <?php include './includes/sidenav.php' ?>
        <div class="bg-slate-200 w-full min-h-full grid place-items-center">
            <section class="w-full">

                <h1 class="text-rose-700 font-bold text-5xl text-center mb-10">Profile</h1>
                <?php if (isset($_GET['password'])) : ?>
                    <div class="bg-white shadow w-2/3 mx-auto p-3 rounded">
                        <form action="" class="relative" method="post">
                            <div>
                                <label for="" class="font-bold">Current Password</label>
                                <input type="password" placeholder="Current Password" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2 block w-full" name="current_password" required>
                            </div>
                            <div>
                                <label for="" clas4s="font-bold">New Password</label>
                                <input type="password" placeholder="New Password" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2 block w-full" name="new_password" required>
                            </div>
                            <div>
                                <label for="" class="font-bold">Confirm Password</label>
                                <input type="password" placeholder="Confirm Password" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2 block w-full" name="confirm_password" required>
                            </div>
                            <button class="bg-lime-600 text-white px-5 py-2 " name='update_password'>update password</button>
                        </form>
                        <?php

                        if (isset($_POST['update_password'])) {

                            $password = mysqli_real_escape_string($conn, $_POST['current_password']);
                            $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
                            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
                            if (!password_verify($password, $hashedpassword)) {
                                echo '<p class="text-red-600 font-bold italic">incorrect password</p>';
                                die();
                            }
                            if (strlen($new_password) < 8) {
                                echo '<p class="text-red-600 font-bold italic">password is too short</p>';
                                die();
                            }
                            if ($new_password !== $confirm_password) {
                                echo '<p class="text-red-600 font-bold italic">passwords do not match</p>';
                                die();
                            }

                            $newhashedpassword = password_hash($new_password, PASSWORD_BCRYPT);

                            $sql = "UPDATE users SET password = ? WHERE username=?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare(
                                $stmt,
                                $sql
                            )) {
                                echo '<p class="text-red-600 font-bold italic">server error</p>';
                                die();
                            }

                            mysqli_stmt_bind_param(
                                $stmt,
                                'ss',
                                $hashedpassword,
                                $username,
                            );
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_close($stmt);

                            echo '<p class="text-lime-600 font-bold italic">password updated</p>';
                        }

                        ?>

                    </div>
                <?php else : ?>
                    <div class="bg-white shadow w-2/3 mx-auto p-3 rounded">

                        <form action="./includes/upload_file.php" class="w-28" enctype="multipart/form-data" method="post">
                            <div class="border w-28 h-28 border-black">

                                <?php

                                ?>
                                <?php if ($image) : ?>
                                    <img src="./media/<?php echo $image?>" alt="" class="w-full h-full object-cover">
                                <?php else : ?>
                                    <img src="./media/default.png" alt="" class="w-full h-full object-cover">
                                <?php endif ?>
                            </div>
                            <input type="file" class="my-4" name="file">
                            <button class="bg-rose-700 text-white  px-4 py-1">upload</button>
                        </form>
                        <hr class="my-5 border border-red-800">
                        <form action="./includes/update.inc.php" class="grid     " method="POST">
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label for="" class="font-bold">First Name</label>
                                    <input type="text" placeholder="First Name" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2 block w-full" name="firstname" value="<?php echo $firstname ?>">
                                </div>

                                <div>
                                    <label for="" class="font-bold">Last Name</label>
                                    <input type="text" placeholder="Last Name" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2 block w-full" name="lastname" value="<?php echo $lastname ?>">
                                </div>


                            </div>
                            <div>

                                <label for="" class="font-bold">Username</label>
                                <input type="text" placeholder="Username" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2 w-full" name="username" value="<?php echo $username ?>">
                            </div>
                            <div>

                                <label for="" class="font-bold">Email Address:</label>

                                <input type="text" placeholder="Email Address" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2 w-full" name="email" value="<?php echo $email ?>">
                            </div>
                            <div class=" ">
                                <label for="" class="font-bold">DOB:</label>
                                <input type="date" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2 w-full" value="<?php echo $dob ?>" name="dob">
                            </div>
                            <div class=" ">
                                <label for="" class="font-bold">Gender:</label>
                                <select name="gender" id="" class="border my-3 ch-12 focus:outline-none focus:border-rose-200 pl-2 w-full">
                                    <?php
                                    echo '<option value="' . $gender . '" selected>' . $gender . '</option>';
                                    ?>

                                    <option value="male">male</option>
                                    <option value="female">Female</option>
                                </select>

                            </div>

                            <div class="flex justify-end">
                                <button class="capitalize bg-rose-700 text-white text-semi-bold text-lg px-4 py-2 rounded" name='update'>update profile</button>
                            </div>
                        </form>
                    </div>


                <?php endif ?>

            </section>
        </div>
    </div>



</body>

</html>