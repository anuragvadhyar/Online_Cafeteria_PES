<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'test';

$conn = new mysqli($host, $username, $password, $database, 3308);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    if (isset($_POST['feedback'])) {
        $feedback = $_POST['feedback'];
        $insert_feedback_query = "INSERT INTO feedback (order_id, rating) VALUES ('$order_id', '$feedback')";

        if ($conn->query($insert_feedback_query) === TRUE) {
            echo "Feedback recorded successfully!";
            // Redirect to home.php after feedback submission
            header("Location: home.php");
            exit();
        } else {
            echo "Error: " . $insert_feedback_query . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback</title>
</head>
<body>
    <h1>Feedback</h1>
    <form method="post" action="">
        <input type="text" name="feedback" placeholder="Enter your feedback" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
