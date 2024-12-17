<?php
require '../utils/users.php';

// Get user data
$userId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$users = getUsers();
$user = array_filter($users, fn($u) => $u['user_id'] == $userId);
$user = reset($user);

if (!$user) {
    header('Location: users.php?error=1');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $profilepic = null;
    
    // Handle file upload if new image provided
    if (isset($_FILES['profilepic']) && $_FILES['profilepic']['error'] === 0) {
        $allowed = ['jpg', 'jpeg', 'png'];
        $filename = $_FILES['profilepic']['name'];
        $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (in_array($filetype, $allowed)) {
            $newName = uniqid('profile_') . '.' . $filetype;
            $uploadPath = '../image/' . $newName;
            
            if (move_uploaded_file($_FILES['profilepic']['tmp_name'], $uploadPath)) {
                $profilepic = $newName;
            }
        }
    }

    $result = updateUser(
        $userId,
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['birthdate'],
        $_POST['gender'],
        $_POST['contactno'],
        $_POST['email'],
        $_POST['password'] ?? null,
        $profilepic
    );

    if ($result) {
        header('Location: users.php?success=1');
        exit;
    } else {
        header('Location: users.php?error=1');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User | Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #1F1F1F; color: white;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark text-white">
                    <div class="card-header bg-dark border-bottom border-secondary">
                        <h4 class="mb-0">Edit User</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control bg-dark text-white" 
                                       name="first_name" required value="<?php echo htmlspecialchars($user['first_name']); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control bg-dark text-white" 
                                       name="last_name" required value="<?php echo htmlspecialchars($user['last_name']); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Birthdate</label>
                                <input type="date" class="form-control bg-dark text-white" 
                                       name="birthdate" required value="<?php echo $user['birthdate']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <select class="form-select bg-dark text-white" name="gender" required>
                                    <option value="Male" <?php echo $user['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                                    <option value="Female" <?php echo $user['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                                    <option value="Other" <?php echo $user['gender'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contact Number</label>
                                <input type="text" class="form-control bg-dark text-white" 
                                       name="contactno" required value="<?php echo htmlspecialchars($user['contactno']); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control bg-dark text-white" 
                                       name="email" required value="<?php echo htmlspecialchars($user['email']); ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password (leave blank to keep current)</label>
                                <input type="password" class="form-control bg-dark text-white" name="password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Profile Picture</label>
                                <?php if ($user['profile_pic']): ?>
                                    <div class="mb-2">
                                        <img src="/callmechanic/image/<?php echo htmlspecialchars($user['profile_pic']); ?>" 
                                             alt="Current profile picture" class="img-thumbnail" style="max-width: 100px;">
                                    </div>
                                <?php endif; ?>
                                <input type="file" class="form-control bg-dark text-white" 
                                       name="profilepic" accept=".jpg,.jpeg,.png">
                                <small class="text-muted">Leave empty to keep current image. Supported formats: JPG, PNG</small>
                            </div>
                            <button type="submit" class="btn w-100" style="background-color: #F86D1A; color: white;">Update User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
