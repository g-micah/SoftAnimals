<?php
function is_valid_login($username, $password) {
    global $db;
    $query = '
        SELECT * FROM users
        WHERE username = :username AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    if ($statement->rowCount() == 1) {
        $valid = true;
    } else {
        $valid = false;
    }
    $statement->closeCursor();
    return $valid;
}

function get_user_by_username($username) {
    global $db;
    $query = 'SELECT * FROM users
              WHERE username = :username';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function does_user_exist($username) {
    global $db;
    $query = '
        SELECT * FROM users
        WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    if ($statement->rowCount() == 1) {
        $valid = true;
    } else {
        $valid = false;
    }
    $statement->closeCursor();
    return $valid;
}

function create_new_user($username, $password, $firstName, $lastName, $email, $phone, $age, $gender, $address, $address2, $country, $state, $zip){
    global $db;
    $query = 'INSERT INTO users
                 (username, password, fname, lname, email, phone, age, gender, address, address2, country, state, zip)
              VALUES
                 (:username, :password, :firstName, :lastName, :email, :phone, :age, :gender, :address, :address2, :country, :state, :zip)';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':age', $age);
        $statement->bindValue(':gender', $gender);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':address2', $address2);
        $statement->bindValue(':country', $country);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':zip', $zip);
        $statement->execute();
        $statement->closeCursor();

        // Get the last customer ID that was automatically generated
        $id = $db->lastInsertId();
        return $id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_user($username, $password, $firstName, $lastName, $email, $phone, $age, $gender, $address, $address2, $country, $state, $zip){
    global $db;
    $query = 'UPDATE users
              SET password = :password,
                  fname = :firstName,
                  lname = :lastName,
                  email = :email,
                  phone = :phone,
                  age = :age,
                  gender = :gender,
                  address = :address,
                  address2 = :address2,
                  country = :country,
                  state = :state,
                  zip = :zip
              WHERE username = :username';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':age', $age);
        $statement->bindValue(':gender', $gender);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':address2', $address2);
        $statement->bindValue(':country', $country);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':zip', $zip);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_cart_items_by_user($user_id)
{
    global $db;
    $query = 'SELECT *
              FROM cart_item
              INNER JOIN products ON products.product_id = cart_item.product_id
              INNER JOIN cart ON cart.cart_id = cart_item.cart_id
              WHERE user_id = :user_id AND purchased = 0';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_cart_items_history($user_id)
{
    global $db;
    $query = 'SELECT *
              FROM cart_item
              INNER JOIN products ON products.product_id = cart_item.product_id
              INNER JOIN cart ON cart.cart_id = cart_item.cart_id
              WHERE user_id = :user_id AND purchased = 1
              ORDER BY cart.cart_id DESC, quantity DESC, price DESC';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_cart_item($cart_id, $product_id) {
    global $db;
    $query = 'SELECT * FROM cart_item
              WHERE cart_id = :cart_id AND product_id = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':cart_id', $cart_id);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function update_cart_item($cart_id, $product_id, $quantity){
    global $db;
    $query = 'UPDATE cart_item
              SET quantity = :quantity
              WHERE cart_id = :cart_id AND product_id = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':cart_id', $cart_id);
        $statement->bindValue(':product_id', $product_id);
        $statement->bindValue(':quantity', $quantity);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function remove_cart_item($cart_id, $product_id){
        global $db;
    $query = 'DELETE FROM cart_item
              WHERE cart_id = :cart_id AND product_id = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':cart_id', $cart_id);
        $statement->bindValue(':product_id', $product_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function get_cart_by_user($user_id) {
    global $db;
    $query = '
        SELECT * FROM cart
        WHERE user_id = :user_id AND purchased = 0';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        display_db_error($e->getMessage());
    }
}

function create_emtpy_cart($user_id) {
    global $db;
    $query = 'INSERT INTO cart
                 (user_id)
              VALUES
                 (:user_id)';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->execute();
        $statement->closeCursor();

        // Get the last customer ID that was automatically generated
        $id = $db->lastInsertId();
        return $id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_cart_item($cart_id, $product_id, $quantity){
    global $db;
    $query = 'INSERT INTO cart_item
                 (cart_id, product_id, quantity)
              VALUES
                 (:cart_id, :product_id, :quantity)';

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':cart_id', $cart_id);
        $statement->bindValue(':product_id', $product_id);
        $statement->bindValue(':quantity', $quantity);
        $row_count = $statement->execute();
        $statement->closeCursor();

        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function checkout_cart($cart_id) {
        global $db;
    $query = 'UPDATE cart
              SET purchased = 1
              WHERE cart_id = :cart_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':cart_id', $cart_id);
        $row_count = $statement->execute();
        $statement->closeCursor();
        return $row_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>