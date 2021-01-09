<!DOCTYPE html>
<!--
Shopping Cart Application
CIS327: PHP II

G. Micah Garrison

File: Home
-->
<?php
    session_start();    
    $page = 'home';
    include_once '../view/head.php';
?>

<!----- Header, Navbar (Fixed) ----->
<?php include_once '../view/header.php';?>


<!----- Main Page Content ----->
<div id="home" class="h-100 container-lg">


    <div class="row justify-content-md-center">
        <div class="col-md-6 text-responsive text-center">
        <h1>Welcome to the online<br>Stuffed Animal Shop</h1>
        <br>
        <h4>View our products here:</h4>
        <a class="btn btn-lg btn-outline-light" href="../products/" role="button"><b>Products</b></a>
        </div>
    </div>   
</div>


<!----- Footer ----->
<?php include_once '../view/footer.php';?>
