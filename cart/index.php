<!DOCTYPE html>
<!--
Shopping Cart Application
CIS327: PHP II

G. Micah Garrison

File: Cart
-->

<?php
session_start();    
$page = 'cart';
include_once '../view/head.php';

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'viewcart';
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
    
    $cart = get_cart_by_user($user_id);
    if($cart != null)
    {
       $cart_id = $cart['cart_id'];
    }
    else
    {
        $cart_id = create_emtpy_cart($user_id);
    }
    $cart_items = get_cart_items_by_user($user_id);
}

switch ($action) {
    case 'viewcart':
        include_once 'cart.php';
        break;
    
    case 'update_quantity':
        $product_id = filter_input(INPUT_POST, 'product_id');
        $quantity = filter_input(INPUT_POST, 'quantity');
        
        if($quantity < 1)
        {
            if(remove_cart_item($cart_id, $product_id) == 1)
            {
                $_SESSION['message'] = 'Item removed from cart.';
            }
        }
        else
        {
            if(update_cart_item($cart_id, $product_id, $quantity) == 1)
            {
                $_SESSION['message'] = 'Quantity updated successfully.';
            }
        }
        header("Location: .");
        break;
    
    case 'add_to_cart':
        $product_id = filter_input(INPUT_POST, 'product_id');
        $item = get_cart_item($cart_id, $product_id);
        
        if($item != null)
        {
            if(update_cart_item($cart_id, $product_id, ($item['quantity']+1)) == 1)
            {
                $_SESSION['message'] = 'Quantity updated successfully.';
            }
        }
        else {
            if(add_cart_item($cart_id, $product_id, 1) == 1)
            {
                $_SESSION['message'] = 'Item added to cart.';
            }
        }

        header("Location: .");
        break;
      
    case 'checkout':
        if ($cart_items == null)
        {
            $_SESSION['message'] = 'ERROR: There are no items to checkout.';
        }
        else
        {
            if(checkout_cart($cart_id) == 1)
            {
                $_SESSION['message'] = 'All items were successfully checked out.';
            }
        }

        header("Location: .");
        break;
    case 'not_signed_in':
        $_SESSION['message'] = '<b>ERROR:</b> You must be signed in to do that.';
        header("Location: ../sign-in/" );
        break;
}
?>