<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/w1.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="boxicons-master/css/boxicons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://kit.fontawesome.com/5a10e0b94b.js" crossorigin="anonymous"></script>
    <title>callmechanic</title>
</head>
<style>
    * {
        font-family: 'poppins', sans-serif;
        color:white;
    }
    body {
        background-color: #1F1F1F;
    }
    .box {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 90vh;
    }
    .container {
        width: 600px;
        display: flex;
        flex-direction: column;
        padding: 100px 0px 100px 0px;
    }
    span {
        color: #fff;
        font-size: small;
        display: flex;
        justify-content: left;
    }
    header {
        color: #fff;
        font-size: 25px;
        display: flex;
        justify-content: left;
    }
    .input-field .input {
        height: 40px;
        width: 100%;
        border: none;
        border-radius: 20px;
        color: #fff;
        font-size: 15px;
        padding: 10 0 0 10px;
        background: rgba(255, 255, 255, 0.1);
        outline: none;
    }
    select {
        height: 40px;
        width: 100%;
        border: none;
        border-radius: 20px;
        color: #fff;
        font-size: 15px;
        padding: 10 0 0 10px;
        background: rgba(255, 255, 255, 0.1);
        outline: none;
    }
    p {
        color: #fff;
        font-size: small;
        display: flex;
        justify-content: center;
        padding: 10px 0 10px 0;
    }
    ::-webkit-input-placeholder {
        color: #fff;
    }
    .submit {
        border: none;
        border-radius: 30px;
        font-size: 15px;
        height: 45px;
        outline: none;
        width: 100%;
        color: white;
        background: #F86D1A;
        cursor: pointer;
        transition: .3s;
    }
    .submit:hover {
        background: rgba(255, 255, 255, 0.7);
    }
    .accept {
        display: flex;
        color: #fff;
        font-size: small;
        margin-top: 12px;
    }
    label a {
        text-decoration: none;
        color: #fff;
    }
    a {
        text-decoration: none;
        color: #F86D1A;
    }
    .two-col {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        color: #fff;
        font-size: small;
        margin-top: 10px;
    }
    .two-column {
        display: flex;
        flex-direction: row;
        color: #fff;
        margin-top: 15px;
    }
    .one {
        display: flex;
    }
</style>

<body>
<div class="d-flex flex-wrap justify-content-center align-item-center;" style="<?php
                // require 'config.php';
                // $sql = "SELECT * FROM `components_images` where status='register'";
                // $dataset = $connect->query($sql);
                // if ($dataset) {
                //     if ($dataset->num_rows > 0) {
                //         while ($row = $dataset->fetch_array()) {
                //             $image = $row['2'];
                ?>
                           background-image: url('img/BCKGROUND.jpg');background-repeat:no-repeat;background-position:center; background-size: cover;">
                <?php
                //         }
                //     }
                // }
            
                ?>
<div class="box">
        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="top">
                <center><img src="image/NEARMELOGO.png" width="200" height="200" alt=""></center>
                    <header>Create New Account</header>
                    <span>Already a member? &nbsp;<b><a href="index.php">Login.</a></b></span>
                </div>
                <br><b>Personal Information:</b>
                <div class="two-col">
                    <div class="input-field">
                        Firstname:<input type="text" class="input" name="fname" required>
                    </div>&emsp;
                    <div class="input-field">
                        Lastname:<input type="text" class="input" name="lname" required>
                    </div>
                </div>
                <br>
                <div class="input-field">
                    Date of Birth:<input type="date" class="input" name="bdate" required>
                </div>
                <div class="two-column">
                    <div class="gender">
                        Sex:&emsp;&emsp;<input type="radio" class="input" name="sex" value="Male"> Male
                    </div>
                    &emsp;
                    <div class="gender">
                        <input type="radio" class="input" name="sex" value="Female"> Female
                    </div>
                </div>
                <br>
                <div class="input-field">
                    Contact Number:<input type="number" class="input" name="num" required>
                </div>
                <!-- <br><b>Vehicle:</b><br>
                <div class="input-field">
                    Type:
                    <select name="type">
                        <option value="Bus/Transit">Bus/Transit</option>
                        <option value="Car">Car</option>
                        <option value="Motorcycle/Scooter">Motorcycle/Scooter</option>
                        <option value="Tricycle">Tricycle</option>
                        <option value="Truck">Truck</option>
                        <option value="Van">Van</option>
                    </select>
                </div> -->
                <!-- <div class="two-col">
                    <div class="input-field">
                        Reg no:<input type="text" class="input" name="regno" required>
                    </div>&emsp;
                    <div class="input-field">
                        Model:<input type="text" class="input" name="mod" required>
                    </div>
                </div> -->
                <br><b>Account:</b><br>
                <div class="input-field">
                    Email: <input type="text" class="input" name="email" required>
                </div>
                <br>
                <div class="input-field">
                    Password: <input type="Password" class="input" name="pwd" required>
                </div>
                <br><b>Choose Profile Picture:</b><br>
                <div class="input-field">
                    <input type="file" name="image" accept=".jpg, .jpeg, .png">
                </div>
                <br>
                <div class="input-field">
                    <input type="submit" class="submit" value="Create Account" name="submit">
                </div>
            </form>
        </div>
    </div>
</div>
    
    <?php
      
      if (isset($_POST['submit'])) {
          require 'config.php';
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $bdate = $_POST['bdate'];
          $sex = $_POST['sex'];
          $num = $_POST['num'];
          $email = $_POST['email'];
          $pwd= $_POST['pwd'];
  
          $pfp = $_FILES['image'];
          
          $fileName=$_FILES['image']['name'];
          $tmpName = $_FILES['image']['tmp_name'];
          $validImageExtension=['.jpg','.jpeg', '.png']; 
          $ImageExtension=explode('.',$fileName);
          $ImageExtension = strtolower(end($ImageExtension)); 
          $newImageName=uniqid();
          $newImageName .='.' .$ImageExtension;
  
          $target = 'image/'. basename($fileName);

          if (!move_uploaded_file($tmpName, $target)) {
            echo $target;
            echo 'Error uploading';
          } else {
            $dataset = $connect->query("INSERT INTO `user`(`first_name`, `last_name`, `birthdate`, `gender`, `contactno`, `email`, `password`, `profile_pic`) VALUES ('$fname','$lname','$bdate','$sex','$num','$email','$pwd','$fileName')") or die("Error query");
            if ($dataset) {
                echo "<script>swal({
                            title: 'Good Job!',
                            icon:'success',
                            text: 'You have successfully created an account.',
                            type: 'success'
                            }).then(function() {
                                window.location.href = 'login.php';
                            })</script>";
            }
            $connect->close();
          }
  
          
      }
      ?>
    <br>
    <footer>
        <div class="text-center">
        <p style="color:#D9D9D9;">Copyright &copy; 2017 All Rights Reserved by<span style="color:#F86D1A;">callmechanic</span>.</p>
        </div>
    </footer>
</body>

</html>