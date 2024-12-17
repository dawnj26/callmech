<?php
require 'utils/report.php';
require 'utils/users.php';

// Get user_id from URL parameter
$user_id = isset($_GET['user_id']) ? (int)$_GET['user_id'] : 0;
$user = getUserById($user_id);

if (!$user_id) {
    header('Location: reports.php?error=no_user');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $report = [
        'user_id' => $user_id, // Use the ID from URL parameter
        'content' => $_POST['content']
    ];
    $username = urlencode($user['first_name']. ' ' . $user['last_name']);

    if (addReport($report)) {
        header("Location: mechanic_chat.php?username=" . $username);
        exit;
    } else {
        header("Location: mechanic_chat.php?username=" . $username);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Report | Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #1F1F1F; color: white;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark text-white">
                    <div class="card-header bg-dark border-bottom border-secondary">
                        <h4 class="mb-0">Add New Report</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="content" class="form-label">Report Content</label>
                                <textarea class="form-control bg-dark text-white" 
                                          id="content" 
                                          name="content" 
                                          rows="5" 
                                          required></textarea>
                            </div>
                            
                            <button type="submit" 
                                    class="btn w-100" 
                                    style="background-color: #F86D1A; color: white;">
                                Submit Report
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
