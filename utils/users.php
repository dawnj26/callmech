<?php

require __DIR__ . '/config.php';

// Get all users
function getUsers(): array
{
    global $connect;

    $query = "SELECT * FROM user";

    $result = $connect->query($query);

    if ($result && $result->num_rows > 0) {
        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    } else {
        return [];
    }
}

//get user by id
function getUserById($id) {
    global $connect;

    $query = "SELECT * FROM user WHERE user_id=$id";

    $result = $connect->query($query);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        return $user;
    } else {
        return null;
    }
    
}

// Delete user
function deleteUser(int $id): bool
{
    global $connect;

    $query = "DELETE FROM user WHERE user_id=$id";

    sleep(2);

    $result = $connect->query($query);

    return $result;
}

// add user
function addUser($first_name, $last_name, $birthdate, $gender, $contactno, $email, $password, $profilepic): bool
{
    global $connect;
    
    $query = "INSERT INTO user (first_name, last_name, birthdate, gender, contactno, email, password, profile_pic) 
              VALUES ('$first_name', '$last_name', '$birthdate', '$gender', '$contactno', '$email', '$password', '$profilepic')";
    
    $result = $connect->query($query);

    if (!$result) {
        echo $connect->error;
    }
    
    return $result;
}

// Update user
function updateUser(int $userId, $first_name, $last_name, $birthdate, $gender, $contactno, $email, $password, $profilepic = null): bool
{
    global $connect;
    
    $updates = [
        "first_name='$first_name'",
        "last_name='$last_name'",
        "birthdate='$birthdate'",
        "gender='$gender'",
        "contactno='$contactno'",
        "email='$email'"
    ];
    
    if ($password) {
        $updates[] = "password='$password'";
    }
    
    if ($profilepic) {
        $updates[] = "profile_pic='$profilepic'";
    }
    
    $updateString = implode(", ", $updates);
    
    $query = "UPDATE user SET $updateString WHERE user_id=$userId";
    
    $result = $connect->query($query);
    
    if (!$result) {
        echo $connect->error;
    }
    
    return $result;
}

