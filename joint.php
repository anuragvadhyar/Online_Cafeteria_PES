<!DOCTYPE html>
<html>
<head>
    <title>Joint Table</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            background-color: pink;
        }

        table {
            width: 50%;
            margin: auto;
            background-color: blue;
            color: white;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid white;
        }

        .no-feedback {
            color: blue;
            font-size: 48px; /* Enlarged font size */
            text-transform: uppercase; /* Convert to uppercase */
            margin-top: 50vh; /* Centered in the middle of the screen */
        }
    </style>
</head>
<body>
    <?php
    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'test';

    $conn = new mysqli($host, $username, $password, $database, 3308);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform a JOIN operation on 'payment' and 'feedback' tables
    $join_query = "SELECT * FROM payment
                   INNER JOIN feedback ON payment.order_id = feedback.order_id";

    $result = $conn->query($join_query);

    if ($result->num_rows > 0) {
        // Display the result in the form of a table
        echo "<table>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Feedback</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['order_id']}</td>
                    <td>{$row['date']}</td>
                    <td>{$row['amount']}</td>
                    <td>{$row['rating']}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "<div class='no-feedback'>NO FEEDBACK AVAILABLE</div>";
    }

    $conn->close();
    ?>
</body>
</html>
