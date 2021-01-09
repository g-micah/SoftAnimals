<!DOCTYPE html>
<!--
Shopping Cart Application
CIS327: PHP II

G. Micah Garrison

File: form
-->
<?php
    $page = 'sign-up';
    include_once '../view/head.php';
?>

<!----- Header, Navbar (Fixed) ----->
<?php include_once '../view/header.php';?>
    

<!----- Main Page Content ----->
<div id="signup" class="container-lg h-100">
        
    <div class="pt-5 pb-3 text-center">
        <h2><b>
        <?php if($signup): ?>
            Sign Up
        <?php else: ?>
            Profile for <?php echo $username?>
        <?php endif ?>
            </b></h2>
        <p class="lead">
        <?php if($signup): ?>
            Enter your information.
        <?php else: ?>
            Update your information.
        <?php endif ?>  
        </p>
    </div>

    <div class="row justify-content-md-center">
    <div class="col-md-10">
    <form action="." method="post" class="needs-validation" novalidate>
        <?php if($signup): ?>
            <input type="hidden" name="action" value="sign-up">
        <?php else: ?>
            <input type="hidden" name="action" value="update">
        <?php endif ?>
        
        
        <?php if(isset($_SESSION['message']))
        {
            echo "<p>".$_SESSION['message']."</p>";
            unset($_SESSION['message']);
        }?>
        
        <?php if($signup): ?>
        <!---- Username ---->
        <div class="mb-3">
            <label for="username">Username <span class="text-dark">(Required)</span></label>
            <div class="input-group">
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $username;?>" placeholder="Create a username" required pattern="[a-zA-Z]{1}[a-zA-Z0-9-]{3,49}" >
                <div class="invalid-feedback" style="width: 100%;">
                    A valid username is required. (Between 4-50 characters. Allowed: lower-case, upper-case, numbers, and -) 
                </div>
            </div>
        </div>

        
        <!---- Password ---->
        <div class="mb-3">
            <label for="password">Password <span class="text-dark">(Required)</span></label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" value="" placeholder="Create a password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,50}">
                <div class="invalid-feedback" style="width: 100%;">
                    The password must contain at least one number, one uppercase and lowercase letter, and at least 7 or more characters.
                </div>
            </div>
        </div>
        <?php endif ?>  

        
         <!---- First Name ---->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstName">First Name <span class="text-dark">(Required)</span></label>
                <input type="text" class="form-control" id="firstName" name="first_name" value="<?php echo $firstName;?>" placeholder="Enter first name" value="" required pattern="[A-Z]{1}[a-zA-Z]{1,49}">
                <div class="invalid-feedback">
                    Valid first name is required. (First letter capital)
                </div>
            </div>
        <!---- Last Name ---->
            <div class="col-md-6 mb-3">
                <label for="lastName">Last Name <span class="text-dark">(Required)</span></label>
                <input type="text" class="form-control" id="lastName" name="last_name" value="<?php echo $lastName;?>" placeholder="Enter last name" value="" required pattern="[A-Z]{1}[a-zA-Z]{1,49}">
                <div class="invalid-feedback">
                    Valid last name is required. (First letter capital)
                </div>
            </div>
        </div>

        <!---- Email ---->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>" placeholder="you@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                <div class="invalid-feedback">
                    Please enter a valid email address.
                </div>
            </div>
         <!---- Phone ---->
            <div class="col-md-6 mb-3">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone;?>" placeholder="###-###-####" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                <div class="invalid-feedback">
                    Please enter a valid phone number. (ex: 555-555-5555)
                </div>
            </div>
        </div>
        
         <!---- Age ---->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" name="age" value="<?php if($age == 0){ echo '';} else {echo $age;}?>" placeholder="Enter age" pattern="[0-9]{1,2}">
                <div class="invalid-feedback">
                    Please enter a valid numerical age.
                </div>
            </div>
         <!---- Gender ---->
            <div class="col-md-6 mb-3">
                <label for="phone">Gender</span></label>
                <select class="custom-select d-block w-100" id="gender" name="gender">
                    <option value="<?php echo $gender;?>">
                        <?php if($gender != ''){
                            echo $gender;
                        }
                        else {
                            echo 'Not chosen...';
                        }
                        ?>
                    </option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <div class="invalid-feedback">
                    Please provide a valid state.
                </div>
            </div>
        </div>
            
        <!---- Address ---->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="address">Address</span></label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $address;?>" placeholder="1234 Main St">
                <div class="invalid-feedback">
                    Please enter your address for shipping.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="address2">Address 2</label>
                <input type="text" class="form-control" id="address2" name="address2" value="<?php echo $address2;?>" placeholder="Apartment or suite (not required)">
            </div>
        </div>

        
        <div class="row">
        <!---- Country ---->
            <div class="col-md-5 mb-3">
                <label for="country">Country</span></label>
                <select class="custom-select d-block w-100" id="country" name="country">
                    <option value="<?php echo $country;?>">
                        <?php if($country != ''){
                            echo $country;
                        }
                        else {
                            echo 'Not chosen...';
                        }
                        ?>
                    <option value="United States">United States</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid country.
                </div>
            </div>
        <!---- State ---->
            <div class="col-md-4 mb-3">
                <label for="state">State</span></label>
                <select class="custom-select d-block w-100" id="state" name="state">
                    <option value="<?php echo $state;?>">
                        <?php if($state != ''){
                            echo $state;
                        }
                        else {
                            echo 'Not chosen...';
                        }
                        ?>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
                <div class="invalid-feedback">
                    Please provide a valid state.
                </div>
            </div>
        <!---- Zip ---->
            <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" name="zip" value="<?php echo $zip;?>" placeholder="#####" pattern="[0-9]{5}">
                <div class="invalid-feedback">
                    Please provide a valid zip code.
                </div>
            </div>
        </div>
        
        <?php if($signup): ?>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="terms" required>
          <label class="custom-control-label" for="terms">Agree to the terms and conditions.  <span class="text-dark">(Required)</label>
        </div>
        <?php endif ?>
        
        <hr class="mb-4">
        <button class="btn btn-dark btn-lg btn-block" type="submit">Submit</button>
  </form>
  </div>
  </div>

<br>
</div>

<!----- Footer ----->
<?php include_once '../view/footer.php';?>
    
<script src="../model/form-validation.js"></script>