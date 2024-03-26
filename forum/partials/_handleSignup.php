<?php


$showError = "false";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $user_email = $_POST['signupemail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];


    //Check whether this email exists
    $existsql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $existsql);
    if ($result === false) {
        // Handle the query failure
        echo "Query failed: " . mysqli_error($conn);
        exit();
    }
    $numrows = mysqli_num_rows($result);
    if ($numrows > 0) {
        $showError = "Email already exists";
    } else {
        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showError = true;
                header("Location: /forum/index.php?signupsucess=true");
                exit();
            }
        } else {
            $showError = "Password do not match";
        }
    }
    header("Location: /forum/index.php?signupsucess=false&error=$showError");
}

?>