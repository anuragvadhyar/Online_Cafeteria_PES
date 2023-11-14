<!DOCTYPE html>
<html>
<head>
    <title>Total Revenue</title>
    <link rel="stylesheet" href="revenue.css">
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
