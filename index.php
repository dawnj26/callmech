<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/w1.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>sign up as</title>
</head>
<style>
* {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
    }

    body {
        background-color: #1F1F1F;
        overflow-x: hidden;
        overflow-y: auto;
        color:white;
    }

</style>
<body>

    <div class="d-flex flex-wrap justify-content-center align-item-center;" style="height:100vh;<?php
                require 'config.php';
                $sql = "SELECT * FROM `components_images` where status='user_type'";
                $dataset = $connect->query($sql);
                if ($dataset) {
                    if ($dataset->num_rows > 0) {
                        while ($row = $dataset->fetch_array()) {
                            $image = $row['2'];
                ?>
                            background-image: url('img/<?php echo $image ?>');background-repeat:no-repeat;background-position:center;">
                <?php
                        }
                    }
                }
                ?>
        <div class="container my-auto mx-3" style="max-width: 960px;">
        <center><div class="col-sm-7">
            <center>
            <?php
                require 'config.php';
                $sql = "SELECT * FROM `components_images` where status='Current'";
                $dataset = $connect->query($sql);
                if ($dataset) {
                    if ($dataset->num_rows > 0) {
                        while ($row = $dataset->fetch_array()) {
                            $image = $row['2'];
                ?>
                            <img src="img/<?php echo $image; ?>" width="200" height="100" alt="" name="logo">
                <?php
                        }
                    }
                }
                ?>
                <h3>Welcome to <strong style="color:#D9D9D9;">call<span style="color:#F86D1A">MEchanic</span></strong></h3>
                <small style="color:#D9D9D9;">Sign in as:</small><br>
            </center>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                    <form action="login.php" method="post" name="login-form" autocomplete="off" class="row g-2 needs-validation" novalidate>
                        <input type="submit" name="signin" value="User" class="btn" style="background-color:#F86D1A; color:white;">
                    </form>
                    </div>
                    <div class="col">
                    <form action="mechLogin.php" method="post" name="login-form" autocomplete="off" class="row g-2 needs-validation" novalidate>
                        <input type="submit" name="signin" value="Mechanic" class="btn btn" style="background-color:#F86D1A; color:white;">
                    </form>
                    </div>
                    <div class="col">
                    <form action="adminlogin.php" method="post" name="login-form" autocomplete="off" class="row g-2 needs-validation" novalidate>
                        <input type="submit" name="signin" value="Admin" class="btn btn" style="background-color:#F86D1A; color:white;">
                    </form>
                    </div>
                </div>
            </div>
        </div></center>
    </div>
    </div>
</body>

</html>