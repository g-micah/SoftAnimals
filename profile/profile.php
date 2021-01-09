<!DOCTYPE html>
<!--
Shopping Cart Application
CIS327: PHP II

G. Micah Garrison

File: Profile
-->

<!----- Header, Navbar (Fixed) ----->
<?php include_once '../view/header.php';?>
<style>
    h5 {
        font-style: italic;
    }
    
</style>

<!----- Main Page Content ----->
<div id="cart" class="container-lg h-100">
    <div class="row">
        <div class="col-12">
            <h2><b>
                <?php echo $firstName." ".$lastName."'s Profile"?>
                <a class="btn btn-outline-dark" style="font-weight: bold;" role="button" href="sign-out.php">Log Out</a>
            </b></h2>
            <form action="." method="post">
            <input type="hidden" name="action" value="view_history">
            <button type="submit" class="btn btn-outline-dark" style="font-weight: bold;">View Purchase History</button>
            </form>
            
            
                <?php if(isset($_SESSION['message']))
                {
                    echo "<p>".$_SESSION['message']."</p>";
                    unset($_SESSION['message']);
                }?>
        </div>
    </div> 

    <div class="row justify-content-md-center">
    <div class="col-md-10">

        <div class="row" style="border:0px;padding:4px">
            <div class="col-md-6 mb-3">
                <h4>Username:</h4>
                <h5><?php echo $username;?></i></h5>
            </div>
            <div class="col-md-6 mb-3">
                <h4>Password:</h4>
                <h5>**********</h5>
            </div>
        </div>
        <div class="row" style="border:0px; padding:4px">
            <div class="col-md-6 mb-3">
                <h4>Email:</h4>
                <h5><?php echo $email;?>&nbsp;</h5>
            </div>
            <div class="col-md-6 mb-3">
                <h4>Phone:</h4>
                <h5><?php echo $phone;?>&nbsp;</h5>
            </div>
        </div>
        <div class="row" style="border:0px; padding:4px">
            <div class="col-md-6 mb-3">
                <h4>Age:</h4>
                <h5><?php if($age != 0)
                    {
                        echo $age;
                    }?>&nbsp;</h5>
            </div>
            <div class="col-md-6 mb-3">
                <h4>Gender:</h4>
                <h5><?php echo $gender;?>&nbsp;</h5>
            </div>
        </div>
        <div class="row" style="border:0px; padding:4px">
            <div class="col-md-12 mb-3">
                <h4>Address:</h4>
                <h5>
                    <?php echo $address;?><br>
                    <?php if($address2 != null)
                    {
                        echo $address2."<br>";
                    }?>
                    <?php if($country != null)
                    {
                        echo $country.", ";
                    }?>
                    <?php echo $state;?> 
                    <?php echo $zip;?>
                </h5>
            </div>
        </div>
        <form action="." method="post">
        <input type="hidden" name="action" value="update_form">
        <button type="submit" class="btn btn-outline-dark" style="font-weight: bold;">Update Info</button>
        </form>
    </div>
    </div>
</div>


<!----- Footer ----->
<?php include_once '../view/footer.php';?>
