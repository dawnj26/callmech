<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Notifications</title>
    <!-- Add your CSS links and other meta tags here -->
</head>

<body>
    <!-- Your HTML structure for notifications display -->
    <h1>Notifications</h1>
    <!-- PHP code to fetch and display notifications -->
    <?php
    // Include your database connection file
    require 'config.php'; // Adjust the filename as per your configuration

    // Retrieve notifications for the current user (assuming user ID is stored in session)
    $userId = $_SESSION['user_id']; // Adjust this line based on your session structure

    // Fetch notifications from the database for the current user
    $notificationQuery = "SELECT * FROM notifications WHERE user_id = $userId";
    $notificationsResult = $connect->query($notificationQuery);

    if ($notificationsResult && $notificationsResult->num_rows > 0) {
        while ($notification = $notificationsResult->fetch_assoc()) {
            // Display each notification
            echo '<div>';
            echo '<p>' . $notification['notification_text'] . '</p>';
            echo '<p>' . $notification['created_at'] . '</p>';
            // Add more details or formatting for notifications if needed
            echo '</div>';
        }
    } else {
        echo '<p>No notifications found.</p>';
    }

    // Close the database connection
    $connect->close();
    ?>
</body>

</html>