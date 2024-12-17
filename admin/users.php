<?php
require '../utils/users.php';   
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Management - callMEchanic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1F1F1F;
            color: white;
            min-height: 100vh;
        }

        .table {
            color: white;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead th {
            background-color: rgba(248, 109, 26, 0.1);
            border-color: rgba(255, 255, 255, 0.1);
            color: #F86D1A;
        }

        .table td {
            border-color: rgba(255, 255, 255, 0.1);
        }

        .btn-action {
            background-color: #F86D1A;
            color: white;
            border: none;
            padding: 0.25rem 0.75rem;
            border-radius: 4px;
            text-decoration: none;
            margin-right: 0.5rem;
            transition: background-color 0.3s;
        }

        .btn-action:hover {
            background-color: #e55d0a;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #bb2d3b;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body>
    <div class="container py-4">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="card-title mb-0" style="color: #F86D1A;">User Management</h2>
                    <a href="add_user.php" class="btn btn-action">Add New User</a>
                </div>

                <?php
                if (isset($_GET['success'])) {
                    echo '<div class="alert alert-success">User added successfully</div>';
                } else if (isset($_GET['deleted'])) {
                    echo '<div class="alert alert-success">User deleted successfully</div>';
                } else if (isset($_GET['updated'])) {
                    echo '<div class="alert alert-success">User updated successfully</div>';
                } else if (isset($_GET['error'])) {
                    echo '<div class="alert alert-danger">Something went wrong</div>';
                }

                ?>

                <div class="table-responsive">
                    <?php

                    $users = getUsers();
                    if (!empty($users)) {
                        echo '<table class="table table-hover">';
                        echo '<thead><tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr></thead><tbody>';
                        foreach ($users as $user) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($user['first_name']) . '</td>';
                            echo '<td>' . htmlspecialchars($user['last_name']) . '</td>';
                            echo '<td>' . htmlspecialchars($user['email']) . '</td>';
                            echo '<td>' . htmlspecialchars($user['contactno']) . '</td>';
                            echo '<td>
                                    <a href="edit.php?id=' . $user['user_id'] . '" class="btn-action">Edit</a>
                                    <a href="delete.php?id=' . $user['user_id'] . '" class="btn-action btn-delete" onclick="return confirm(\'Are you sure?\')">Delete</a>
                                </td>';
                            echo '</tr>';
                        }
                        echo '</tbody></table>';
                    } else {
                        echo '<div class="text-center text-muted">No users found</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>