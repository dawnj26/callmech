<?php
require '../utils/users.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $profilepic = '';
    
    // Handle file upload
    if (isset($_FILES['profilepic']) && $_FILES['profilepic']['error'] === 0) {
        $allowed = ['jpg', 'jpeg', 'png'];
        $filename = $_FILES['profilepic']['name'];
        $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (in_array($filetype, $allowed)) {
            // Create unique filename
            $newName = uniqid('profile_') . '.' . $filetype;
            $uploadPath = '../image/' . $newName;
            
            if (move_uploaded_file($_FILES['profilepic']['tmp_name'], $uploadPath)) {
                $profilepic = $newName;
            }
        }
    }
    
    $result = addUser(
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['birthdate'],
        $_POST['gender'],
        $_POST['contactno'],
        $_POST['email'],
        $_POST['password'],
        $profilepic
    );
    echo "Hello";

    if ($result) {
        header('Location: /callmechanic/admin/users.php?success=1');
        
    } else {
        header('Location: /callmechanic/admin/users.php?error=1');
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New User | Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #1F1F1F; color: white;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark text-white">
                    <div class="card-header bg-dark border-bottom border-secondary">
                        <h4 class="mb-0">Add New User</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control bg-dark text-white" name="first_name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control bg-dark text-white" name="last_name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Birthdate</label>
                                <input type="date" class="form-control bg-dark text-white" name="birthdate" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <select class="form-select bg-dark text-white" name="gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contact Number</label>
                                <input type="text" class="form-control bg-dark text-white" name="contactno" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control bg-dark text-white" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control bg-dark text-white" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Profile Picture</label>
                                <input type="file" 
                                       class="form-control bg-dark text-white" 
                                       name="profilepic" 
                                       accept=".jpg,.jpeg,.png">
                                <small class="text-muted">Supported formats: JPG, PNG</small>
                            </div>
                            <button type="submit" class="btn w-100" style="background-color: #F86D1A; color: white;">Add User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>