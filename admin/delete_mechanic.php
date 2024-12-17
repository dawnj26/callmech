<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deleting Mechanic - callMEchanic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1F1F1F;
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loading-container {
            text-align: center;
        }

        .spinner-border {
            color: #F86D1A;
            width: 3rem;
            height: 3rem;
            margin-bottom: 1rem;
        }

        .message {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .redirecting {
            color: #999;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="loading-container">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="message">Deleting mechanic...</div>
        <div class="redirecting">You will be redirected automatically</div>
    </div>

    <?php
    require '../utils/mechanics.php';
    if (deleteMechanic($_GET['id'])) {
        header('Location: /callmechanic/admin/mechanics.php?deleted=1');
    } else {
        header('Location: /callmechanic/admin/mechanics.php?error=1');
    }
    ?>
</body>
</html>
