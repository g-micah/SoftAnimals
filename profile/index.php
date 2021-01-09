<!DOCTYPE html>
<!--
Shopping Cart Application
CIS327: PHP II

G. Micah Garrison

File: Profileindex
-->

<?php
session_start();    
$page = 'profile';
include_once '../view/head.php';

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'profile';
    }
}


    
if (!isset($_SESSION['user'])) {
    $action = 'not_signed_in';
}
else
{
    require('../model/database.php');
    require('../model/user_db.php');
    $_SESSION['user'] = get_user_by_username($_SESSION['user']['username']);
    $user_id = $_SESSION['user']['user_id'];
    $username = $_SESSION['user']['username'];
    $password = $_SESSION['user']['password'];
    $firstName = $_SESSION['user']['fname'];
    $lastName = $_SESSION['user']['lname'];
    $email = $_SESSION['user']['email'];
    $phone = $_SESSION['user']['phone'];
    $age = $_SESSION['user']['age'];
    $gender = $_SESSION['user']['gender'];
    $address = $_SESSION['user']['address'];
    $address2 = $_SESSION['user']['address2'];
    $country = $_SESSION['user']['country'];
    $state = $_SESSION['user']['state'];
    $zip = $_SESSION['user']['zip'];
}

switch ($action) {
    case 'profile':
        include_once 'profile.php';
        break;
    
    case 'update_form':
        $signup = false;
        include_once '../model/form.php';
        break;
    
    case 'update':
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
            
            update_user($username, $password, $firstName, $lastName, $email, $phone, $age, $gender, $address, $address2, $country, $state, $zip);
            $_SESSION['message'] = 'Profile Updated!';
            include_once 'profile.php';
        break;
    
    case 'view_history':
        $cart_items = get_cart_items_history($user_id);
        include_once 'history.php';
        break; 
    
    case 'not_signed_in':
        $_SESSION['message'] = '<b>ERROR:</b> You must be signed in to view that page.';
        header("Location: ../sign-in/" );
        break;
}
?>