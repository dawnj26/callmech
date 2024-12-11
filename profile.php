<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="mainstyle.css"> -->
    <link rel="icon" href="img/w1.png">
    <title>mechanicprofile | callmechanic</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/78f0025f7d.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
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
    }

    header {
        width: 60%;
        height: 60px;
        background: #D9D9D9;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 40px;
        margin: 0 auto;
        margin-top: 2%;
    }

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
    }

    img {
        width: 100%;
    }

    .logo {
        width: 180px;
        margin-top: 40px;
    }

    nav .logo {
        display: none;
    }

    nav ul {
        display: flex;
    }

    nav ul li a {
        color: #2F2F2F;
        display: block;
        margin: 0 2px;
        padding: 15px 20px;
        transition: 0.2s;
        text-decoration: none;

    }

    nav ul li a:hover {
        background: #F86D1A;
        color: #D9D9D9;
        text-decoration: none;
    }

    nav ul li a.active {
        background: #F86D1A;
        color: #D9D9D9;
    }

    .orange {
        background: #F86D1A;
        width: 23%;
        height: 65px;
        margin-left: 15%;
        margin-top: -2%;
    }

    .mainbody {
        margin-top: 0px;
    }

    .jumbotrontitle {
        width: 100%;
        margin-top: 15%;
        margin-left: 10%;
    }

    h1 {
        font-size: 100px;
    }

    .buttn {
        margin-top: 3%;
        width: 50%;
    }

    table {
        width: 100%;
    }

    .coverphoto {
        width: 100%;
        height: 100px;
    }

    .backbutton {
        padding: 10px;
    }

    .avatar {
        vertical-align: middle;
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }

    .input-field .text {
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

    .input{
        width: 100%;
    }

    h2 {
        color: white;
    }

    @media only screen and (max-width: 1100px) {
        header {
            width: 80%;
            padding: 0 20px;
        }

        nav {
            color: #D9D9D9;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 999;
            width: 60%;
            height: 100vh;
            transition: 0.2s;
            background-color: #2F2F2F;
            box-shadow: 2px 0 20px 0 rgba(0, 0, 0, 0.05);
        }

        #nav_check:checked~nav {
            right: 0;
        }

        nav ul li a {
            color: #D9D9D9;
            text-decoration: none;
        }

        nav .logo {
            display: block;
            height: 70px;
            display: flex;
            align-items: center;
            margin: auto;
            margin-top: 15%;
        }

        nav ul {
            display: block;
            padding: 0 20px;
            margin-top: 30px;
        }

        nav ul li a {
            margin-bottom: 5px;
        }
    }
</style>

<body>
    <header>
        <div class="logo">
        <?php
                require 'config.php';
                $sql = "SELECT * FROM `components_images` where status='Current'";
                $dataset = $connect->query($sql);
                if ($dataset) {
                    if ($dataset->num_rows > 0) {
                        while ($row = $dataset->fetch_array()) {
                            $image = $row['2'];
                ?>
                            <img src="image/<?php echo $image; ?>">
                <?php
                        }
                    }
                }
                ?>
        </div>
        <input type="checkbox" id="nav_check" hidden>
        <nav>
            <div class="logo">
                <img src="img/logo.png" alt="">
            </div>
            <ul>
                <li>
                    <a href="mechHome.php">HOME</a>
                </li>
                <li>
                    <a href="mechMessage.php">MESSAGES</a>
                </li>
                <li>
                    <a href="profile.php" class="active">PROFILE</a>
                </li>
                <li>
                    <a href="mechAboutUs.php">ABOUT US</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="orange"></div>
    <div class="coverphoto" style="width: 90%;height: 200px; margin:auto; margin-top:2%;margin-bottom:1%;">
        <img src="image/<?php echo $_SESSION['mech_cover']; ?>" alt="" srcset="" style="width:100%;height:200px;">
    </div>
    <div class="mainbody" style="margin-top:5px;">
        <div class="d-flex flex-row-reverse" style="margin-right:15%;">
            <a><input type="submit" class="btn btn-primary btn-sm" value="Edit Profile" style="background-color:lightgrey;border:none; width:180%;padding:8px;color:black;" data-bs-toggle="modal" data-bs-target="#myModal"></a>
            &emsp;&emsp;&emsp;&emsp;&emsp;<a href="mechLogin.php"><input type="submit" class="btn btn-primary btn-sm" value="Logout" style="background-color:#F86D1A;border:none; width:200%;padding:8px;"></a>
        </div>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content" style="color:#2F2F2F;">

                    <!-- Modal Header -->
                    <div class="modal-header" style="background-color: #F86D1A;color:#D9D9D9;">
                        <h4 class="modal-title">Update Profile</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" style="padding: 20px;">

                        <form action="update_mech_profile.php" method="post">
                            <?php
                            require 'config.php';
                            $id = $_SESSION['mechanicid'];
                            $sql = "SELECT * FROM `mechanics` where mechid=$id";
                            $dataset = $connect->query($sql);
                            if ($dataset) {
                                if ($dataset->num_rows > 0) {
                                    while ($row = $dataset->fetch_array()) {
                            ?>
                                        <b>Shop Name:</b> <input type="text" value="<?php echo $row['1']; ?>" name="name" style="width:100%; padding: 5px;border:none;"> <br>
                                        <br><b>Address: </b> <input type="text" value="<?php echo $row['3']; ?>" name="address" style="width:100%; padding: 5px;border:none;"> <br>
                                        <br><b>Contact Number: </b> <input type="text" value="<?php echo $row['4']; ?>" name="number" style="width:100%; padding: 5px;border:none;"> <br>
                                        <br><b>Services </b> <textarea name="services" style="width:100%; padding: 5px;border:none;"><?php echo $row['6']; ?></textarea>
                            <?php
                                    }
                                }
                            } ?>
                            <br><br>
                            <div class="d-flex flex-row-reverse">
                            <input type="submit" class="btn btn-light" style="background-color:#F86D1A; color:white; width:35%;" value="Update">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <table style="width:80%; margin:auto;">
            <tr>
                <td rowspan="2" style="width:15%;">
                    <div class="f">
                        <img src="image/<?php echo $_SESSION['mechpfp']; ?>" alt="" srcset="" class="avatar">
                    </div>
                </td>
                <td style="padding:2px;">
                    <h5><a href="mechprofile.php" style="text-decoration:none;color:#D9D9D9;"><?php echo $_SESSION['mechname']; ?></a></h5>
                    <div class="text-small" style="font-weight:600;color:#F86D1A">
                        <?php echo $_SESSION['mechemail']; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding:15px;">
                    <div class="" style="font-weight:600;color:#D9D9D9;">
                        <p>Contact Number: <span style="color:#F86D1A;"><?php echo $_SESSION['mechnum']; ?></span> <br>
                            <span style="color:#F86D1A;"><?php echo $_SESSION['mechaddr']; ?></span>
                        </p>
                    </div>
                </td>
            </tr>
        </table>
        <div class="availserv">
            <center>
                <h1 style="color:#D9D9D9;font-size: 40px;margin-top: 5%;">SERVICES <span style="color:#F86D1A">OFFERED</span></h1>
            </center>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="d-flex flex-row-reverse">
                    <img src="img/redcar.png" style="width:60%">
                </div>
            </div>

            <div class="col-6">
                <div style="margin-top: 10%;">
                    <?php
                    $service = $_SESSION['mech_services'];
                    foreach ((array) $service as $item) {
                        $items = explode(',', $item);
                        for ($i = 0; $i < sizeof($items); $i++) {
                            echo '<h2>' . $items[$i] . '</h2><br>';
                        }


                        echo "<br>";
                    }
                    ?>

                </div>
            </div>
        </div>
        <!-- Site footer -->
        <footer class="site-footer">
            <div class="container" style=" margin-top:5%;">
                <center>
                    <hr>
                    <p style="color:#D9D9D9;">Copyright &copy; 2017 All Rights Reserved by
                        <span style="color:#F86D1A;">callmechanic</span>.
                    </p>
                </center>
            </div>
        </footer>
</body>

</html>