<?php
$conn = new mysqli('localhost', 'root', 'root', 'test', 3308);
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
}

if (isset($_POST['firstName']) && isset($_POST['pw'])) {
    $srn = $_POST['firstName'];
    $pass = $_POST['pw'];

    // Database connection
    $insert_cart_query = "INSERT INTO user (SRN, pass) VALUES ('$srn', '$pass')";
        
    if ($conn->query($insert_cart_query) === TRUE) {
        echo "Items added to the cart successfully!";
    } else {
        echo "Error: " . $insert_cart_query . "<br>" . $conn->error;
    }
}

$conn->close();



?>