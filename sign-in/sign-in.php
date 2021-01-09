<?php
    session_start();
    require('../model/database.php');
    require('../model/user_db.php');

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    if (!empty($username) && !empty($password) && is_valid_login($username, $password)) {
        $_SESSION['user'] = get_user_by_username($username);

        header("Location: ../profile/" );
    } else {
        $_SESSION['message'] = 'Login failed. Invalid username/password.';
        header("Location: ../sign-in/" );
    }


?>