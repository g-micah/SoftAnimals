<?php

session_start();
require('../model/database.php');
require('../model/user_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'signup_form';
    }
}

if (isset($_SESSION['user'])) {
    $action = 'returning_user';
}

$username = '';
$password = '';
$firstName = '';
$lastName = '';
$email = '';
$phone = '';
$age = '';
$gender = '';
$address = '';
$address2 = '';
$country = '';
$state = '';
$zip = '';


switch ($action) {
    case 'signup_form':
        $signup = true;
        include_once '../model/form.php';
        break;
    case 'sign-up':
        $signup = true;
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $firstName = filter_input(INPUT_POST, 'first_name');
        $lastName = filter_input(INPUT_POST, 'last_name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        $age = filter_input(INPUT_POST, 'age');
        $gender = filter_input(INPUT_POST, 'gender');
        $address = filter_input(INPUT_POST, 'address');
        $address2 = filter_input(INPUT_POST, 'address2');
        $country = filter_input(INPUT_POST, 'country');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');

        if (does_user_exist($username))
        {
            $_SESSION['message'] = '<b>The username "'.$username.'" already exists! Please try a different one.</b>';
            include_once '../model/form.php';
        }
        else
        {
            create_new_user($username, $password, $firstName, $lastName, $email, $phone, $age, $gender, $address, $address2, $country, $state, $zip);
            $_SESSION['message'] = 'New user created! Please sign in.';
            header("Location: ../sign-in/" );
        }
        break;
    case 'returning_user':
        header("Location: ../profile/");
        break;
}
?>