<?php
require '../utils/mechanics.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mech_pfp = '';
    $mech_cover = '';
    $business_permit = '';
    
    // Handle profile picture upload
    if (isset($_FILES['mech_pfp']) && $_FILES['mech_pfp']['error'] === 0) {
        $allowed = ['jpg', 'jpeg', 'png'];
        $filename = $_FILES['mech_pfp']['name'];
        $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (in_array($filetype, $allowed)) {
            $newName = uniqid('profile_') . '.' . $filetype;
            $uploadPath = '../../image/' . $newName;
            
            if (move_uploaded_file($_FILES['mech_pfp']['tmp_name'], $uploadPath)) {
                $mech_pfp = $newName;
            }
        }
    }
    
    // Handle cover photo upload
    if (isset($_FILES['mech_cover']) && $_FILES['mech_cover']['error'] === 0) {
        $allowed = ['jpg', 'jpeg', 'png'];
        $filename = $_FILES['mech_cover']['name'];
        $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (in_array($filetype, $allowed)) {
            $newName = uniqid('cover_') . '.' . $filetype;
            $uploadPath = '../../image/' . $newName;
            
            if (move_uploaded_file($_FILES['mech_cover']['tmp_name'], $uploadPath)) {
                $mech_cover = $newName;
            }
        }
    }
    
    // Handle business permit upload
    if (isset($_FILES['business_permit']) && $_FILES['business_permit']['error'] === 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'pdf'];
        $filename = $_FILES['business_permit']['name'];
        $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (in_array($filetype, $allowed)) {
            $newName = uniqid('permit_') . '.' . $filetype;
            $uploadPath = '../../documents/' . $newName;
            
            if (move_uploaded_file($_FILES['business_permit']['tmp_name'], $uploadPath)) {
                $business_permit = $newName;
            }
        }
    }

    $mechanic = [
        'mechName' => $_POST['mechName'],
        'mechEmail' => $_POST['mechEmail'],
        'mechaddr' => $_POST['mechaddr'],
        'mechno' => $_POST['mechno'],
        'mechpwd' => $_POST['mechpwd'],
        'mech_services' => $_POST['mech_services'],
        'mech_pfp' => $mech_pfp,
        'mech_cover' => $mech_cover,
        'business_permit' => $business_permit,
        'acc_status' => 'pending'
    ];

    if (addMechanic($mechanic)) {
        header('Location: mechanics.php?success=1');
        exit;
    } else {
        header('Location: mechanics.php?error=1');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New Mechanic | Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #1F1F1F; color: white;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark text-white">
                    <div class="card-header bg-dark border-bottom border-secondary">
                        <h4 class="mb-0">Add New Mechanic</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Mechanic Name</label>
                                <input type="text" class="form-control bg-dark text-white" name="mechName" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control bg-dark text-white" name="mechEmail" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control bg-dark text-white" name="mechaddr" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Contact Number</label>
                                <input type="text" class="form-control bg-dark text-white" name="mechno" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control bg-dark text-white" name="mechpwd" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Services</label>
                                <input type="text" class="form-control bg-dark text-white" name="mech_services" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Profile Picture</label>
                                <input type="file" class="form-control bg-dark text-white" name="mech_pfp" accept=".jpg,.jpeg,.png">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Cover Photo</label>
                                <input type="file" class="form-control bg-dark text-white" name="mech_cover" accept=".jpg,.jpeg,.png">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Business Permit</label>
                                <input type="file" class="form-control bg-dark text-white" name="business_permit" accept=".jpg,.jpeg,.png,.pdf">
                            </div>
                            
                            <button type="submit" class="btn w-100" style="background-color: #F86D1A; color: white;">Add Mechanic</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
