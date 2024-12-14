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
    <title>mechanics | callmechanic</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/78f0025f7d.js" crossorigin="anonymous"></script>
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

    table {
        width: 100%;
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
            <img src="img/logob.png" alt="">
        </div>
        <input type="checkbox" id="nav_check" hidden>
        <nav>
            <div class="logo">
                <img src="img/logo.png" alt="">
            </div>
            <ul>
                <li>
                    <a href="home.php">HOME</a>
                </li>
                <li>
                    <a href="mech.php" class="active">MECHANIC</a>
                </li>
                <li>
                    <a href="forum.php">ON ROAD HELP</a>
                </li>
                <li>
                    <a href="aboutus.php">ABOUT US</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="orange"></div>
    <div class="availserv">
        <center>
            <h1 style="color:#D9D9D9;font-size: 40px;margin-top: 5%;">SEARCH <span style="color:#F86D1A">RESULT:</span></h1>
        </center>
    </div>
    <div class="mainbody">
        <img src="img/rc.png" style="opacity:0.05; position:fixed; width:70%; margin-left:25%; margin-top:0%;">
        <div class="row" style="margin-top:2%;">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <table style="width:100%;">
                    <?php
                    require 'config.php';
                    $location  = $_POST['search_location'];
                    $dataset = $connect->query("SELECT * FROM `mechanics` WHERE mechaddr LIKE'%$location%'") or die("Error query");
                    if ($dataset) {
                        if ($dataset->num_rows > 0) {
                            while ($row = $dataset->fetch_array()) {
                                $mechname = $row['1'];
                                $mechmail = $row['2'];
                                $mechanicid = $row['0'];
                                $pic=$row['7'];
                                $_SESSION['mechid'] = $mechanicid;
                                echo "
                <tr>
                    <td>
                        <div class=\"cardPost\">
                            <div class=\"card-body\">
                                <table>
                                    <tr>
                                        <td rowspan=\"2\" style=\"width:20%;\">
                                            <div class=\"f\" style=\"margin-right:30px;\">
                                            ";?> <img src="image/<?php echo $pic; ?>" alt="" srcset="" class="rounded-circle mx-2"><?php echo"
                                            </div>
                                        </td>
                                        <td style=\"padding: 0px;\">
                                            <h5>$mechname</h5>
                                            <div class=\"text-muted small\" style=\"font-weight:600;color:#D9D9D9;\">
                                                $mechmail
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style=\"padding:0px;\">
                                            <div class=\"text-muted small\" style=\"font-weight:600;color:#D9D9D9;\">
                                                <form action=\"mechprofile.php\" method=\"GET\">
                                                    <input type=\"hidden\" name=\"mechID\" value=\"$mechanicid\">
                                                    <input type=\"submit\" class=\"btn btn-link\" value=\"View Profile\" style=\"background-color:none; font-weight:600; text-decoration:none;color:#F86D1A;\">
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <hr>
                    </td>
                </tr>";
                            }
                        } else {
                            echo "<center style=\"color:white;\">No result found</center>";
                        }
                    }
                    $connect->close();
                    ?>
                </table>
            </div>
            <div class="col-md-2">
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