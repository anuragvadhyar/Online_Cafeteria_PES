<!DOCTYPE html>
<html>
<head>
    <title>Welcome to PES Cafeteria</title>
</head>
<body style="text-align: center; font-family: Arial, sans-serif; background-color: pink;">
    <h1 style="color: #8E44AD; font-family: 'Times New Roman', Times, serif;">WELCOME TO PES CAFETERIA!</h1>
    
    <form method="post" action="index.php">
        <button type="submit" name="login" style="padding: 10px 20px; margin: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            LOGIN
        </button>
    </form>
    
    <form method="post" action="index_up.php">
        <button type="submit" name="register" style="padding: 10px 20px; margin: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            REGISTER
        </button>
    </form>
    
    <form method="post" action="main.php">
        <button type="submit" name="menu" style="padding: 10px 20px; margin: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            MENU
        </button>
    </form>

    <form method="post" action="account.php">
        <button type="submit" name="viewAccount" style="padding: 10px 20px; margin: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            VIEW ACCOUNT
        </button>
    </form>

    <form method="post" action="update_password.php">
        <button type="submit" name="updatePassword" style="padding: 10px 20px; margin: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            UPDATE PASSWORD
        </button>
    </form>

    <form method="post" action="delete_user.php">
        <button type="submit" name="deleteUser" style="padding: 10px 20px; margin: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            DELETE USER
        </button>
    </form>

    <!-- Add VIEW FEEDBACK button -->
    <form method="post" action="joint.php">
        <button type="submit" name="viewFeedback" style="padding: 10px 20px; margin: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            VIEW FEEDBACK
        </button>
    </form>
    <form method="post" action="revenue.php">
        <button type="submit" name="viewRevenue" style="padding: 10px 20px; margin: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            VIEW TOTAL REVENUE
        </button>
    </form>
</body>
</html>
