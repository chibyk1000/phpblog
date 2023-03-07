<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include '../includes/links.php'
    ?>
    <title>Dashboard</title>
</head>

<body>
    <div class="flex min-h-screen">
        <?php include './includes/sidenav.php' ?>
        <div class="bg-slate-200 w-full min-h-full grid place-items-center">
            <section class="w-full">

                <h1 class="text-rose-700 font-bold text-5xl text-center mb-10">Profile</h1>
                <div class="bg-white shadow w-2/3 mx-auto p-3 rounded">
                    <form action="" class="grid     ">
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
                            <input type="date" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2 w-full" value="<?php echo $dob ?>">
                        </div>
                        <div class=" ">
                            <label for="" class="font-bold">Gender:</label>
                            <select name="" id="" class="border my-3 h-12 focus:outline-none focus:border-rose-200 pl-2 w-full">
                                <?php 
                                echo '<option value="'.$gender.'" selected>'.$gender.'</option>';
                                ?>
                               
                                <option value="male">male</option>
                                <option value="female" >Female</option>
                            </select>

                        </div>

                        <div class="flex justify-end">
                            <button class="capitalize bg-rose-700 text-white text-semi-bold text-lg px-4 py-2 rounded">update profile</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>



</body>

</html>