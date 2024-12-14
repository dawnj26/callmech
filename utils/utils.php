<?php
require 'config.php'; 

function getNotifications() : array {
    global $connect;

    $user_type = $_SESSION['user_type'];

    $idField = '';
    $nameField = '';
    $userId = -1;

    if ($user_type == 'mechanic') {
        $idField = 'mechanic_id';
        $userId = $_SESSION['mechanicid'];
        $nameField = 'mechName';
    } else {
        $idField = 'user_id';
        $userId = $_SESSION['user_id'];
        $nameField = 'first_name';
    }


    $notificationQuery = "SELECT * FROM notifications WHERE $idField = ?";
    $stmt = $connect->prepare($notificationQuery);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result && $result->num_rows > 0) {
        $notifications = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $notifications;
    } else {
        $stmt->close();
        return [];
    }
}

function createNotification(int $userId, string $message, string $type) : bool {
    global $connect;

    $user_type = $_SESSION['user_type'];


    $idField = '';
    if ($user_type == 'user') {
        $idField = 'mechanic_id';
    } else {
        $idField = 'user_id';
    }

    $query = "INSERT INTO notifications ($idField, message, type) VALUES (?, ?, ?)";

    $stmt = $connect->prepare($query);
    $stmt->bind_param("iss", $userId, $message, $type);
    
    $success = $stmt->execute();
    $stmt->close();
    
    return $success;
}

function formatDate($date) : string {
    if (!$date instanceof DateTime) {
        $date = new DateTime($date);
    }
    return $date->format('F j, Y g:ia');
}


