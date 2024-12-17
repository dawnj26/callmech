<?php
require '../utils/mechanics.php';

// Get mechanic data
$mechid = isset($_GET['mechid']) ? (int)$_GET['mechid'] : 0;
$mechanics = getMechanics();
$mechanic = array_filter($mechanics, fn($m) => $m['mechid'] == $mechid);
$mechanic = reset($mechanic);

if (!$mechanic) {
    header('Location: mechanics.php?error=1');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mech_pfp = null;
    $mech_cover = null;
    $business_permit = null;
    
    // Handle profile picture upload
    if (isset($_FILES['mech_pfp']) && $_FILES['mech_pfp']['error'] === 0) {
        $allowed = ['jpg', 'jpeg', 'png'];
        $filename = $_FILES['mech_pfp']['name'];
        $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (in_array($filetype, $allowed)) {
            $newName = uniqid('profile_') . '.' . $filetype;
            $uploadPath = '../image/' . $newName;
            
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
            $uploadPath = '../image/' . $newName;
            
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
            $uploadPath = '../documents/' . $newName;
            
            if (move_uploaded_file($_FILES['business_permit']['tmp_name'], $uploadPath)) {
                $business_permit = $newName;
            }
        }
    }

    $result = updateMechanic(
        $mechid,
        $_POST['mechName'],
        $_POST['mechEmail'],
        $_POST['mechaddr'],
        $_POST['mechno'],
        $_POST['mechpwd'] ?? null,
        $_POST['mech_services'],
        $mech_pfp,
        $mech_cover,
        $business_permit,
        $_POST['acc_status']
    );

    if ($result) {
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
    <title>Edit Mechanic | Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #1F1F1F; color: white;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark text-white">
                    <div class="card-header bg-dark border-bottom border-secondary">
                        <h4 class="mb-0">Edit Mechanic</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Mechanic Name</label>
                                <input type="text" class="form-control bg-dark text-white" name="mechName" 
                                       required value="<?php echo htmlspecialchars($mechanic['mechName']); ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control bg-dark text-white" name="mechEmail" 
                                       required value="<?php echo htmlspecialchars($mechanic['mechEmail']); ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control bg-dark text-white" name="mechaddr" 
                                       required value="<?php echo htmlspecialchars($mechanic['mechaddr']); ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Contact Number</label>
                                <input type="text" class="form-control bg-dark text-white" name="mechno" 
                                       required value="<?php echo htmlspecialchars($mechanic['mechno']); ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">New Password (leave blank to keep current)</label>
                                <input type="password" class="form-control bg-dark text-white" name="mechpwd">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Services</label>
                                <input type="text" class="form-control bg-dark text-white" name="mech_services" 
                                       required value="<?php echo htmlspecialchars($mechanic['mech_services']); ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Account Status</label>
                                <select class="form-select bg-dark text-white" name="acc_status" required>
                                    <option value="Pending" <?php echo strtolower($mechanic['acc_status']) == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                    <option value="Approved" <?php echo strtolower($mechanic['acc_status']) == 'approved' ? 'selected' : ''; ?>>Approved</option>
                                    <option value="Rejected" <?php echo strtolower($mechanic['acc_status']) == 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Profile Picture</label>
                                <?php if ($mechanic['mech_pfp']): ?>
                                    <div class="mb-2">
                                        <img src="/callmechanic/image/<?php echo htmlspecialchars($mechanic['mech_pfp']); ?>" 
                                             alt="Current profile picture" class="img-thumbnail" style="max-width: 100px;">
                                    </div>
                                <?php endif; ?>
                                <input type="file" class="form-control bg-dark text-white" name="mech_pfp" accept=".jpg,.jpeg,.png">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Cover Photo</label>
                                <?php if ($mechanic['mech_cover']): ?>
                                    <div class="mb-2">
                                        <img src="/callmechanic/image/<?php echo htmlspecialchars($mechanic['mech_cover']); ?>" 
                                             alt="Current cover photo" class="img-thumbnail" style="max-width: 100px;">
                                    </div>
                                <?php endif; ?>
                                <input type="file" class="form-control bg-dark text-white" name="mech_cover" accept=".jpg,.jpeg,.png">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Business Permit</label>
                                <?php if ($mechanic['business_permit']): ?>
                                    <div class="mb-2">
                                        <a href="/callmechanic/documents/<?php echo htmlspecialchars($mechanic['business_permit']); ?>" 
                                           target="_blank" class="btn btn-sm btn-secondary">View Current Permit</a>
                                    </div>
                                <?php endif; ?>
                                <input type="file" class="form-control bg-dark text-white" name="business_permit" accept=".jpg,.jpeg,.png,.pdf">
                            </div>
                            
                            <button type="submit" class="btn w-100" style="background-color: #F86D1A; color: white;">Update Mechanic</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
