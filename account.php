<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            background-color: pink;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 50%;
            background-color: #3498db; /* Blue background for the table */
        }
        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #dddddd;
            color: white; /* Text color for contrast */
        }
        th {
            background-color: #2980b9; /* Slightly darker blue for headers */
        }
    </style>
</head>
<body>
    <h1>User Accounts</h1>
    <table>
        <tr>
            <th>SRN</th>
            <th>Password</th>
        </tr>
        <?php
        $host = 'localhost';
        $username = 'root';
        $password = 'root';
        $database = 'test';

        $conn = new mysqli($host, $username, $password, $database,3308);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT SRN, password FROM user";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["SRN"] . "</td><td>" . $row["password"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>0 results</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
