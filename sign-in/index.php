<!DOCTYPE html>
<!--
Shopping Cart Application
CIS327: PHP II

G. Micah Garrison

File: Sign In
-->

<?php
    session_start();    
    $page = 'sign-in';
    include_once '../view/head.php';
    
    if (isset($_SESSION['user'])) {
        header("Location: ../profile/" );
    }
?>

<!----- Header, Navbar (Fixed) ----->
<?php include_once '../view/header.php';?>


<!----- Main Page Content ----->
<div id="signin" class="container-lg h-100">
    <div class="row justify-content-md-center">
        <div class="col-md-12 text-center">
            <form action="sign-in.php" method="post" class="form-signin">
                <?php if(isset($_SESSION['message']))
                {
                    echo "<p>".$_SESSION['message']."</p>";
                    unset($_SESSION['message']);
                }?>
                <h2 class="mb-3">Please sign in</h2>
                <label for="inputUser" class="sr-only">Username</label>
                <input type="text" name="username" id="inputUser" class="form-control" placeholder="Username" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="remember-me" class="mt-2"> Remember me
                  </label>
                </div>
                <button class="btn btn-lg  btn-outline-light btn-block" type="submit">Sign in</button>
                <a href="../sign-up/" class="btn  btn-outline-light btn-block">Sign up</a>
            </form>
                
            <form action="sign-in.php" method="post" class="form-signin">
                <input type="text" name="username" id="inputUser" class="form-control" value="guest" hidden>   
                <input type="password" name="password" id="inputPassword" class="form-control" value="GuestPass123" hidden>
                <button class="btn  btn-outline-light btn-block" type="submit">Sign in as guest (demo)</button>
            </form>
        </div>
    </div>
</div>


<!----- Footer ----->
<?php include_once '../view/footer.php';?>
