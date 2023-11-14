<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'test';

$conn = new mysqli($host, $username, $password, $database, 3308);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['food_id'], $_POST['item'], $_POST['price'], $_POST['quantity'])) {
    do {
        $c_id = uniqid();
        $check_query = "SELECT c_id FROM cart WHERE c_id = '$c_id'";
        $result = $conn->query($check_query);
    } while ($result->num_rows > 0);

    $_SESSION['cart_id'] = $c_id;

    $foodIds = explode(',', $_POST['food_id']);
    $items = explode(',', $_POST['item']);
    $prices = explode(',', $_POST['price']);
    $quantities = explode(',', $_POST['quantity']);

    for ($i = 0; $i < count($foodIds); $i++) {
        $f_id = $foodIds[$i];
        $item = $items[$i];
        $price = $prices[$i];
        $qty = $quantities[$i];

        // Check if the selected quantity is less than or equal to the available quantity in 'food' table
        $check_quantity_query = "SELECT qty FROM food WHERE f_id = $f_id";
        $quantity_result = $conn->query($check_quantity_query);

        if ($quantity_result->num_rows > 0) {
            $row = $quantity_result->fetch_assoc();
            $available_quantity = $row['qty'];

            if ($qty <= $available_quantity) {
                // Quantity is valid, proceed to insert into 'cart' table
                $insert_cart_query = "INSERT INTO cart (c_id, f_id, item, price, qty) VALUES ('$c_id', $f_id, '$item', $price, $qty)";

                if ($conn->query($insert_cart_query) !== TRUE) {
                    echo "Error: " . $insert_cart_query . "<br>" . $conn->error;
                }
            } else {
                echo "Error: Quantity selected for item '$item' exceeds the available quantity.";

                // Redirect back to the main page
                header("Location: main.php");
                exit();
            }
        } else {
            echo "Error: Could not fetch available quantity for item '$item'.";

            // Redirect back to the main page
            header("Location: main.php");
            exit();
        }
    }

    echo "Items added to the cart successfully!";

    // Adding a button to proceed to checkout
    echo "<form method='post' action='checkout.php'>
            <button type='submit' name='checkout'>CHECKOUT</button>
          </form>";
}

$conn->close();
?>
