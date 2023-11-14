<!DOCTYPE html>
<html>
<head>
    <title>Total Revenue</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            background-color: pink;
        }

        .total-revenue {
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

    // Call the stored function to get total revenue
    $totalRevenueQuery = "SELECT CalculateTotalRevenue() AS total";
    $result = $conn->query($totalRevenueQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalRevenue = $row['total'];
    } else {
        $totalRevenue = 0;
    }

    // Display total revenue
    echo "<div class='total-revenue'>TOTAL REVENUE: Rs. $totalRevenue</div>";

    $conn->close();
    ?>
</body>
</html>
