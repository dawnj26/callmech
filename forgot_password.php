<?php
require 'utils/config.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset_password'])) {
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword === $confirmPassword) {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password in the database for the provided email using prepared statements
        $updateQuery = "UPDATE `_callmechanic`.`user` SET `password`=? WHERE `email`=?";
        $stmt = $connect->prepare($updateQuery);
        

        if ($stmt) {
            $stmt->bind_param('ss', $hashedPassword, $email);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "<div class='center'>Password updated successfully!</div>";
            } else {
                echo "<div class='center'>No rows affected. Email might not exist or password is the same.</div>";
            }
        } else {
            echo "<div class='center'>Error preparing statement: " . $connect->error . "</div>";
        }
    } else {
        echo "<div class='center'>Passwords do not match!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <style>
        body {
            font-family: 'poppins', sans-serif;
            background-color: #1F1F1F;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 300px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: calc(100% - 12px);
            height: 30px;
            border: none;
            border-radius: 4px;
            padding: 6px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100%;
            height: 40px;
            border: none;
            border-radius: 4px;
            background-color: #F86D1A;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #FFA07A;
        }

        .center {
            text-align: center;
        }

        .back-to-login {
            margin-top: 20px;
            padding: 8px 20px;
            background-color: #F86D1A;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .back-to-login:hover {
            background-color: #FFA07A;
        }
    </style>
</head>
<body>
    <div class="center">
        <h1>Reset Your Password</h1>
        <form action="" method="post">
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div>
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div>
                <input type="submit" value="Reset Password" name="reset_password">
            </div>
        </form>
        <?php if (isset($_POST['reset_password'])): ?>
            <a href="login.php" class="back-to-login">Back to Login</a>
        <?php endif; ?>
    </div>
</body>
</html>

