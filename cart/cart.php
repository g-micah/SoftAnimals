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
            <h2><b>Your Cart:</b></h2>
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
            <p>Your cart is currently empty.</p>
            <?php else: ?>
            <div class="table-responsive">
            <table>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">&nbsp;</th>
                </tr>
                <?php foreach ($cart_items as $item) :?>
                <tr>
                    <td><?php echo htmlspecialchars($item['title']);?></td>
                    <td><?php echo htmlspecialchars($item['description']);?></td>
                    <td><?php echo htmlspecialchars($item['price']);?></td>
                    <form action="." method="post">
                        <td><input type="number" class="form-control" name="quantity" value="<?php echo htmlspecialchars($item['quantity']);?>" required />
                        <td>
                            <input type="hidden" name="action" value="update_quantity" />
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($item['product_id']);?>" />
                            <input type="submit" value="Update"/>
                        </td>
                    </form>
                </tr>
                <?php endforeach; ?>
            </table>
            <p><form action="../cart/" method="post">
                <input type="hidden" name="action" value="checkout" />
                <input style="font-weight: bold;" class="btn btn-outline-dark" role="button" type="submit" value="Checkout"/>
            </form></p>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>


<!----- Footer ----->
<?php include_once '../view/footer.php';?>
