<?php
    // make sure the user is logged in as a valid user
    if (!isset($_SESSION['user'])) {
        $_SESSION['message'] = '<b>ERROR:</b> You must be signed in to view that page.';
        header("Location: ../sign-in/" );
    }
?>
