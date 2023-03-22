 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="https://cdn.tailwindcss.com"></script>
 <script>
     tailwind.config = {
         theme: {
             extend: {
                 colors: {
                     clifford: '#da373d',
                 }
             }
         }
     }
 </script>

 <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
 <?php
    include './includes/db.php';
    $username = $_SESSION['username'];
    $sql = 'SELECT * FROM users where username = ?';

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die('error in query');
    }

    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        $firstname = $row['firstname'];
        $id = $row['id'];
        $lastname = $row['lastname'];
        $username = $row['username'];
        $email = $row['email'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $hashedpassword = $row['password'];
        $image = $row['image'];

    }

    ?>