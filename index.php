<?php
require 'utils/shared.php';


if (isset($_GET['logout'])) {

    session_unset();
    session_destroy();
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/w1.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="boxicons-master/css/boxicons.css">
    <script src="https://kit.fontawesome.com/5a10e0b94b.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>callmechanic</title>
</head>
<style>
    * {
        font-family: 'poppins', sans-serif;
    }

    body {
        background-color: #1F1F1F;
        /* Default background color */
        background-image: url('img/loginbg.png');
        /* Background image */
        background-repeat: no-repeat;
        /* Prevent tiling */
        background-size: cover;
        /* Ensure the image covers the entire screen */
        background-position: center;
        /* Center the image */
        overflow: hidden;
        /* Prevent scrollbars if not needed */
    }

    label {
        color: white;
    }

    .box {
        margin-top: 150px;
        margin-left: 200px;
        /* display: flex; */
        justify-content: center;
        align-items: center;
        min-height: 90vh;
    }

    .container {
        width: 350px;
        display: flex;
        flex-direction: column;
        padding: 0 15px 0 15px;
    }

    span {
        color: #fff;
        font-size: small;
        display: flex;
        justify-content: center;
        padding: 0px 0 20px 0;
    }

    header {
        color: #fff;
        font-size: 30px;
        display: flex;
        justify-content: center;
        padding: 10px 0 0 0;
    }

    .input-field .input {
        height: 45px;
        width: 87%;
        border: none;
        border-radius: 30px;
        color: #fff;
        font-size: 15px;
        padding: 0 0 0 45px;
        background: rgba(255, 255, 255, 0.1);
        outline: none;
    }

    i {
        position: relative;
        top: -33px;
        left: 17px;
        color: #fff;
    }

    p {
        color: #fff;
        font-size: small;
     
        
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
        margin-top: 10px;
    }

    .submit:hover {
        background: rgba(255, 255, 255, 0.7);
    }

    .remember {
        display: flex;
        color: #fff;
        font-size: small;
    }

    label a {
        text-decoration: none;
        color: #fff;
    }

    a {
        text-decoration: none;
        color: #F86D1A;
    }
</style>

<body>
    <?php



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require 'utils/auth.php';


        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $type = $_POST['type'];
        if ($email == 'admin' && $pwd == 'admin') {
            redirect('http://localhost/callmechanic/admin_status_approval.php');
        }

        $login = loginWithEmailAndPassword($email, $pwd, $type);

        if (empty($login)) {

            if ($type === 'user') {
                redirect('http://localhost/callmechanic/home.php');
            } else {
                redirect('http://localhost/callmechanic/mechHome.php');
            }
        } else {

            echo "
                <script>swal({
                    title: 'Unable to login!',
                    icon:'error',
                    text: '$login',
                })</script>";
        }
    }
    ?>
    <div class="d-flex flex-wrap justify-content-center align-item-center;" style="height:100vh;">

        <div class="box">
            <div class="container">
                <div class="top">

                    <img src="image/NEARMELOGO.png" width="180" height="180" alt="" name="logo">

                    </center>
                    <span>Sign in to your account. <?php echo "hello"; ?></span>
                </div>
                <form action="" method="POST">

                    <div class="input-field">
                        <input type="text" class="input" placeholder="Email" name="email" required>
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="input-field">
                        <input type="Password" class="input" placeholder="Password" name="pwd" required>
                        <i class="fa-solid fa-key"></i>
                    </div>
                    <input type="radio" name="type" id="user" value="user" checked>
                    <label for="user">User</label><br>
                    <input type="radio" name="type" id="mech" value="mech">
                    <label for="mech">Mechanic</label>
                    <div class="input-field">
                        <input type="submit" class="submit" value="Login" name="Login">
                    </div>
                </form>
                <div>
                    <p><a href="forgot_password.php">Forgot Password?</a></p>
                </div>
                <div>
                    <p id="signup">
                        Not a member yet? <br />
                        <a href="mechregister.php">Sign up as mechanic.</a><br />
                        <a href="register.php">Sign up as user</a>
                    </p>
                </div>

            </div>
        </div>
    </div>


    </div>

    <footer>
        <div class="text-center">
            <p style="color:#D9D9D9;">Copyright &copy; 2024 All Rights Reserved by<span style="color:#F86D1A;">NearMe</span>.</p>
        </div>
    </footer>

</body>

</html>