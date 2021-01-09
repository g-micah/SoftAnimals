<?php
    session_start();
    unset($_SESSION['user']);
    $_SESSION['message'] = 'You have signed out.';
    header("Location: ../sign-in/" )
?>

