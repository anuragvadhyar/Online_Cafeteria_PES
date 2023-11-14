<!DOCTYPE html>
<html>
<head>
    <title>Update Password</title>
</head>
<body style="text-align: center; font-family: Arial, sans-serif; background-color: pink;">
    <h2>Update Password</h2>
    <form method="post" action="update_password.php">
        SRN: <input type="text" name="SRN"><br><br>
        Previous Password: <input type="password" name="prevPassword"><br><br>
        New Password: <input type="password" name="newPassword"><br><br>
        <input type="submit" name="submit" value="Update Password">
    </form>

    <form method="post" action="home.php">
        <button type="submit" name="home">HOME</button>
    </form>

    <?php
    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    $database = 'test';

    $conn = new mysqli($host, $username, $password, $database, 3308);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['SRN'], $_POST['prevPassword'], $_POST['newPassword'])){
        $SRN = $_POST['SRN'];
        $prevPassword = $_POST['prevPassword'];
        $newPassword = $_POST['newPassword'];

        $sql = "SELECT password FROM user WHERE SRN = '$SRN'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $dbPassword = $row["password"];
            
            if($prevPassword === $dbPassword){
                $update_sql = "UPDATE user SET password = '$newPassword' WHERE SRN = '$SRN'";
                if ($conn->query($update_sql) === TRUE) {
                    echo "<script>alert('Password updated successfully!');</script>";
                } else {
                    echo "Error updating password: " . $conn->error;
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
</body>
</html>
