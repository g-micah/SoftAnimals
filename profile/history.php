<!DOCTYPE html>
<!--
Shopping Cart Application
CIS327: PHP II

G. Micah Garrison

File: Cart
-->

<!----- Header, Navbar (Fixed) ----->
<?php include_once '../view/header.php';?>


<!----- Main Page Content ----->
<div id="cart" class="container-lg h-100">
    <div class="row">
        <div class="col-12">
            <h2><b>Your Purchase History:</b></h2>
        </div>
    </div> 
    <div class="row">
        <div class="col-12">
            <?php if(isset($_SESSION['message']))
            {
                echo "<p>".$_SESSION['message']."</p>";
                unset($_SESSION['message']);
            }?>
            <?php if($cart_items == null): ?>
            <p>Your purchase history is currently empty.</p>
            <?php else: ?>
            <div class="table-responsive">
            <table>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
                <?php $temp = $cart_items[0]['cart_id']?>
                <?php foreach ($cart_items as $item) :?>
                <?php if($temp != $item['cart_id']) :?>
                <?php $temp = $item['cart_id'];?>
                <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
                <?php endif; ?>
                
                <tr>
                    <td><?php echo htmlspecialchars($item['title']);?></td>
                    <td><?php echo htmlspecialchars($item['description']);?></td>
                    <td><?php echo htmlspecialchars($item['price']);?></td>
                    <td><?php echo htmlspecialchars($item['quantity']);?></td>
                </tr>
                
                <?php endforeach; ?>
            </table>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>


<!----- Footer ----->
<?php include_once '../view/footer.php';?>
