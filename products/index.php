<!DOCTYPE html>
<!--
Shopping Cart Application
CIS327: PHP II

G. Micah Garrison

File: Products
-->
<?php
    session_start();    
    $page = 'products';
    include_once '../view/head.php';
?>
<!----- Header, Navbar (Fixed) ----->
<?php include_once '../view/header.php';?>


<!----- Main Page Content ----->
<div id="products" class="container-lg h-100">
    <div class="row">
        <div class="col-12">
            <h2><b>All of our products in stock are listed here:</b></h2>
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <img src="../img/sea-turtle.jpg" alt="Eat Turtle">
        </div>
        <div class="col-9">
            <h3>Stuffed Turtle</h3>
            <p>$19.99</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
            <form action="../cart/" method="post">
                <input type="hidden" name="action" value="add_to_cart" />
                <input type="hidden" name="product_id" value="1" />
                <input style="font-weight: bold;" class="btn btn-outline-dark" role="button" type="submit" value="Add to Cart"/>
            </form> 
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <img src="../img/elephant.jpg" alt="Elephant">
        </div>
        <div class="col-9">
            <h3>Stuffed Elephant</h3>
            <p>9.99</p>
            <p>eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <form action="../cart/" method="post">
                <input type="hidden" name="action" value="add_to_cart" />
                <input type="hidden" name="product_id" value="2" />
                <input style="font-weight: bold;" class="btn btn-outline-dark" role="button" type="submit" value="Add to Cart"/>
            </form> 
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <img src="../img/penguin.jpg" alt="Penguin">
        </div>
        <div class="col-9">
            <h3>Stuffed Penguin</h3>
            <p>7.99</p>
            <p>Ut enim ad minim veniam, quis nostrud exercitation</p>
            <form action="../cart/" method="post">
                <input type="hidden" name="action" value="add_to_cart" />
                <input type="hidden" name="product_id" value="3" />
                <input style="font-weight: bold;" class="btn btn-outline-dark" role="button" type="submit" value="Add to Cart"/>
            </form> 
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <img src="../img/frog.jpg" alt="Frog">
        </div>
        <div class="col-9">
            <h3>Stuffed Frog</h3>
            <p>4.99</p>
            <p>ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <form action="../cart/" method="post">
                <input type="hidden" name="action" value="add_to_cart" />
                <input type="hidden" name="product_id" value="4" />
                <input style="font-weight: bold;" class="btn btn-outline-dark" role="button" type="submit" value="Add to Cart"/>
            </form> 
        </div>
    </div>
</div>


<!----- Footer ----->
<?php include_once '../view/footer.php';?>
