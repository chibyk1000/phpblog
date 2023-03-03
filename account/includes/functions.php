<?php

function userExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)<1){
        return false;
    }
while($row = mysqli_fetch_assoc($result)){
    return $row;
}
}