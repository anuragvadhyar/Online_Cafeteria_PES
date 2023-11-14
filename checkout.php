<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="checkout.css">
</head>
<body>
    <h1>Checkout</h1>
    <form method="post" action="checkout.php">
        <input type="text" name="srn" placeholder="Enter your SRN" required>
        <button type="submit" name="checkout">Confirm</button>
    </form>

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

    if (isset($_POST['checkout'])) {
        $srn = $_POST['srn'];

        $user_query = "SELECT * FROM user WHERE srn = '$srn'";
        $result = $conn->query($user_query);

        if ($result->num_rows > 0) {
            $c_id_query = "SELECT c_id FROM cart ORDER BY c_id LIMIT 1";
            $c_id_result = $conn->query($c_id_query);

            if ($c_id_result->num_rows > 0) {
                $row = $c_id_result->fetch_assoc();
                $c_id = $row['c_id'];

                $total_amount = 0;
                $cart_items_query = "SELECT * FROM cart WHERE c_id = '$c_id'";
                $cart_items_result = $conn->query($cart_items_query);

                if ($cart_items_result->num_rows > 0) {
                    while ($cart_row = $cart_items_result->fetch_assoc()) {
                        $price = $cart_row['price'];
                        $qty = $cart_row['qty'];
                        $total_amount += $price * $qty;
                    }

                    $date = date("Y-m-d");
                    $reduce_food_qty_query = "CALL ReduceFoodQuantity($c_id)";
                    if ($conn->query($reduce_food_qty_query) === TRUE) {
                        $insert_payment_query = "INSERT INTO payment (date, c_id, srn, amount) VALUES ('$date', '$c_id', '$srn', $total_amount)";
                        if ($conn->query($insert_payment_query) === TRUE) {
                            // Fetch the last inserted order ID
                            $order_id = $conn->insert_id;
                            // Redirect to feedback.php with order_id in URL parameters
                            header("Location: feedback.php?order_id=$order_id");
                            exit();
                        } else {
                            echo "Error recording payment: " . $conn->error;
                        }
                    } else {
                        echo "Error reducing food quantities: " . $conn->error;
                    }
                }
            } else {
                echo "No items in the cart!";
            }
        } else {
            echo "User not found!";
        }
    }

    $conn->close();
    ?>
</body>
</html>
