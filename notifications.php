<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Notifications - callMEchanic</title>
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #1F1F1F;
            color: white;
            min-height: 100vh;
        }

        .notification-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .notification-card {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .notification-message {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .notification-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.875rem;
            color: #999;
        }

        .notification-type {
            color: #F86D1A;
            font-weight: 500;
        }

        h1 {
            color: #F86D1A;
            text-align: center;
            padding: 2rem 0;
            font-size: 2rem;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #999;
        }
    </style>
</head>

<body>
    <div class="notification-container">
        <h1>Notifications</h1>

        <?php
        require 'utils/notifications.php';

        $notifications = getNotifications();

        if ($notifications && count($notifications) > 0) {
            foreach ($notifications as $notification) {
                echo '<div class="notification-card">';
                echo '<div class="notification-message">' . htmlspecialchars($notification['message']) . '</div>';
                echo '<div class="notification-meta">';
                echo '<span class="notification-date">' . formatDate($notification['created_at']) . '</span>';
                echo '<span class="notification-type">' . htmlspecialchars($notification['type']) . '</span>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="empty-state">No notifications found</div>';
        }
        ?>
    </div>
</body>

</html>