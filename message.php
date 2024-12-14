<!DOCTYPE html>
<?php
// Start the session
session_start();
?>
<html>

<head lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="mainstyle.css"> -->
    <link rel="icon" href="img/w1.png">
    <title>message | callmechanic</title>
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
        color:white;
        background-image: url('img/BCKGROUND.jpg');
    background-size: cover; /* Ensure the image covers the entire background */
    background-position: center; /* Center the image */
    background-repeat: no-repeat; 
    }

    header {
        width: 100%;
        height: 60px;
        /* background: #D9D9D9; */
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 10px;
        margin: 0 auto;
        margin-top: 2%;
    }


    .mesbox {
        width: 100%;
    }

    .message {
        background-color: #626262;
        border-radius: 10px;
        margin-bottom: 10px;
        padding: 10px;
        width: 60%;
        float: right;
    }

    .messageMech {
        background-color: #F86D1A;
        margin-bottom: 10px;
        color: white;
        padding: 10px;
        border-radius: 10px;
        width: 60%;
        float: left;
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
        color: white;
        display: block;
        margin: 0;
        font-size: 13px;
        padding-right: 50px;
        padding-left: 50px;
        padding-top: 20px;
        padding-bottom: 20px;
        
        transition: 0.2s;
        text-decoration: none;

    }
    nav ul li a:hover {
        background: #F86D1A;
        color: #D9D9D9;
        text-decoration: none;
    }

    nav ul li a.active {
        font-size: 20px;
        font-weight: bold;
        color: #F86D1A;
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

    .aboutuslogo {
        width: 40%;
        margin: auto;
        color: #D9D9D9;
    }

    .smalllogo {
        width: 20%;
        margin: auto;
    }

    .cnt {
        background-color: dark;
        border-radius: 5px;
        width: 40%;
        padding: 15px;
        margin: auto;
        margin-top: 5%;
    }



    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
    }

    .rating>input {
        display: none;
    }

    .rating>label {
        position: relative;
        width: 1.1em;
        font-size: 40px;
        color: #FFD700;
        cursor: pointer;
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0;
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important;
    }

    .rating>input:checked~label:before {
        opacity: 1;
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4;
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
                // require 'config.php';
                // $sql = "SELECT * FROM `components_images` where status='Current'";
                // $dataset = $connect->query($sql);
                // if ($dataset) {
                //     if ($dataset->num_rows > 0) {
                //         while ($row = $dataset->fetch_array()) {
                //             $image = $row['2'];
                ?>
                            <img src="image/NEARMELOGO.png">
                <?php
                //         }
                //     }
                // }
                ?>
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
    <!-- <div class="orange"></div> -->
    <div class="mainbody">
        <?php
        require 'config.php';
        require 'utils/utils.php';

        $mechname = $_GET['mechname'];
        $username = $_SESSION['fname'] . " " . $_SESSION['lname'];
        ?>
        <div class="cnt">
            <center>
                <div class="chathead" style="background:#3c3c3c;padding: 20px;border-radius:5px; color:white; "><?php echo $mechname ?></div> <br>
                <div class="xxd" style="width:100% ;">
                    <?php
                    if (isset($_POST['send'])) {
                        $mechId = $_GET['mechid'];
      
                        createNotification($mechId, "$username sent a message", 'chat');
                        $mechname = $_GET['mechname'];
                        $username = $_SESSION['fname'] . " " . $_SESSION['lname'];
                        $message = $_POST['message_content'];
                        $dataset = $connect->query("INSERT INTO `messages`(`msg_sender`, `msg_receiver`, `msg_content`) VALUES ('$username','$mechname','$message')") or die("Error query");
                    }
                    ?>

                    <?php
                    $sql = "SELECT * FROM messages WHERE (msg_sender = '$username' AND msg_receiver = '$mechname') OR (msg_sender = '$mechname' AND msg_receiver = '$username')";

                    $dataset = $connect->query($sql);
                    if ($dataset) {
                        if ($dataset->num_rows > 0) {
                            while ($row = $dataset->fetch_array()) { {
                                    if ($row['msg_sender'] == $username) {
                                        echo "<div class='message' style='color:white;'><br>";
                                        echo "" . $row['msg_content'] . "<br><br></div>";
                                    } else {
                                        echo "<div class='mesbox'><div class='messageMech' style='color:white;'><br>";
                                        echo "" . $row['msg_content'] . "<br><br></div></div>";
                                    }
                                }
                            }
                        }
                    }



                    ?>


                    <form action="" method="POST">
                        <div class="flex justify-center">
                            <div class="mb-3 xl:w-96">
                                <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" rows="2" name="message_content" placeholder="Type your message here ..."></textarea>
                            </div>
                        </div>
                        <!-- <div class="d-flex flex-row-reverse">
                                <button type="button" class="btn btn-primary btn-sm" value="SEND" name="send" style="background-color:#F86D1A;border:none; width:20%;padding:5px;"><a href="" style="text-decoration:none; color:#D9D9D9;">message</a></button>
                            </div> -->
                        <div class="d-flex flex-row-reverse">
                            <table style="width:30%; padding:10px;">
                                <tr>
                                    <td style="padding:10px;">
                                        <!-- Button to Open the Modal -->

                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color:#F86D1A;border:none; width:100%;padding:5px; color:white;border-radius:5px;">Rate</button>

                        </div>
                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header" style="background-color:#1F1F1F">
                                        <h4 class="modal-title">Rate Mechanic</h4>
                                        <button type="button" class="btn-close" style="color:white;" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body" style="background-color:#222225">
                                        <form method="Post">
                                            <div class="rating">
                                                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                            </div>
                                            <br><input type="submit" class="btn btn-success" value="Submit" name="rate" style="background-color:#F86D1A;border:none; width:100%;padding:5px; color:white;border-radius:5px;">
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <?php
                       
                        if (isset($_POST['rate'])) {
                            $mechId = $_GET['mechid'];
                            $rating = $_POST['rating'];
                            $starLabel = $rating > 1 ? 'stars' : 'star';
                            createNotification($mechId, "$username rated you $rating $starLabel", 'rating');
                            $mech = $_GET['mechid'];
                            $user = $_SESSION['user_id'];
                            $dataset = $connect->query("INSERT INTO `ratings`(`mechanic_id`, `user_id`, `ratings`) VALUES ($mechId,$user,$rating)") or die("Error query");
                           
                        }
                        $connect->close();
                        ?>
                        </td>
                        <td>
                            <div class="d-flex flex-row-reverse">
                                <input type="submit" class="submit" value="SEND" name="send" style="background-color:#F86D1A;border:none; width:100%;padding:5px; color:white;border-radius:5px;"><a href="" style="text-decoration:none; color:#D9D9D9;">
                            </div>
                        </td>
                        </tr>
                        </table>
                </div>
                </form>
        </div>
        </center>
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
