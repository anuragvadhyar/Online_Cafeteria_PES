<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'test';

$conn = new mysqli($host, $username, $password, $database, 3308);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['SRN'], $_POST['password'])) {
    $SRN = $_POST['SRN'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM user WHERE SRN = '$SRN'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dbPassword = $row["password"];

        if ($password === $dbPassword) {
            $delete_sql = "DELETE FROM user WHERE SRN = '$SRN' AND password = '$password'";
            if ($conn->query($delete_sql) === TRUE) {
                echo "<script>alert('User deleted successfully!');</script>";
            } else {
                echo "Error deleting user: " . $conn->error;
            }
        } else {
            echo "<script>alert('Wrong Password!');</script>";
        }
    } else {
        echo "<script>alert('User not found!');</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
</head>
<body style="text-align: center; font-family: Arial, sans-serif; background-color: pink;">
    <h2>Delete User</h2>
    <form method="post">
        SRN: <input type="text" name="SRN"><br><br>
        Password: <input type="password" name="password"><br><br>
        <input type="submit" name="submit" value="Delete User">
    </form>
</body>
</html>
