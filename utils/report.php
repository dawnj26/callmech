<?php

// {
//     "id": {
//       "type": "int",
//       "length": 11,
//       "primary_key": true
//     },
//     "user_id": {
//       "type": "int",
//       "length": 11,
//       "foreign_key": true
//     },
//     "content": {
//       "type": "text",
//       "collation": "utf8mb4_unicode_ci"
//     },
//     "created_at": {
//       "type": "timestamp"
//     }
// }

require __DIR__ . '/config.php';

function getReports(): array
{
    global $connect;

    $query = "SELECT * FROM reports";

    $result = $connect->query($query);

    if ($result && $result->num_rows > 0) {
        $reports = $result->fetch_all(MYSQLI_ASSOC);
        return $reports;
    } else {
        echo $connect->error;
        return [];
    }
}



function addReport(array $report): bool
{
    global $connect;

    $user_id = (int)$report['user_id'];
    $content = $connect->real_escape_string($report['content']);

    $query = "INSERT INTO reports (user_id, content) VALUES ($user_id, '$content')";

    $result = $connect->query($query);

    if ($result) {
        return true;
    } else {
        echo $connect->error;
        return false;
    }
}

function deleteReport(int $id): bool
{
    global $connect;

    $query = "DELETE FROM reports WHERE id = $id";

    $result = $connect->query($query);

    if ($result) {
        return true;
    } else {
        echo $connect->error;
        return false;
    }
}

function updateReport(int $id, int $user_id, string $content): bool
{
    global $connect;

    $content = $connect->real_escape_string($content);

    $query = "UPDATE reports SET user_id = $user_id, content = '$content' WHERE id = $id";

    $result = $connect->query($query);

    if ($result) {
        return true;
    } else {
        echo $connect->error;
        return false;
    }
}


