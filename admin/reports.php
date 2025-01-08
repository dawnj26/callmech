<?php
require '../utils/report.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report Management - callMEchanic</title>
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
                <h2 class="card-title mb-4" style="color: #F86D1A;">Report Management</h2>

                <?php
                if (isset($_GET['deleted'])) {
                    echo '<div class="alert alert-success">User disabled successfully</div>';
                } else if (isset($_GET['enabled'])) {
                    echo '<div class="alert alert-success">User enabled successfully</div>';
                } else if (isset($_GET['error'])) {
                    echo '<div class="alert alert-danger">Something went wrong</div>';
                }
                ?>

                <div class="table-responsive">
                    <?php
                    $reports = getReports();
                    if (!empty($reports)) {
                        echo '<table class="table table-hover">';
                        echo '<thead><tr>
                                <th>Report ID</th>
                                <th>User Name</th>
                                <th>Content</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr></thead><tbody>';
                        foreach ($reports as $report) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($report['report_id']) . '</td>';
                            echo '<td>' . htmlspecialchars($report['first_name'] . ' ' . $report['last_name']) . '</td>';
                            echo '<td>' . htmlspecialchars($report['content']) . '</td>';
                            echo '<td>' . htmlspecialchars($report['created_at']) . '</td>';
                            if (isset($report['deleted_at'])) {
                                echo '<td>
                                    <a href="enable.php?report=1&id=' . $report['user_id'] . '" class="btn-action" onclick="return confirm(\'Are you sure?\')">Enable</a>
                                </td>';
                            } else {
                                echo '<td>
                                    <a href="delete.php?report=1&id=' . $report['user_id'] . '" class="btn-action btn-delete" onclick="return confirm(\'Are you sure?\')">Disable</a>
                                </td>';
                            }
                            echo '</tr>';
                        }
                        echo '</tbody></table>';
                    } else {
                        echo '<div class="text-center text-muted">No reports found</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
