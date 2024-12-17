<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.message{
            border:2px solid white;
            border-radius:10px;
            margin-bottom:10px;
            padding:10px;
            border-style:inset;
    
        }
.messageMech{
            background-color:orange;
            margin-bottom:10px;
            color:white;
            padding:10px;
            border-radius:10px;
            border-style:outset;
        }
</style>

<body>
    <div class="container">
        <center>
        <?php
        require 'utils/config.php';

        $username = $_SESSION['mechname'];

        $sql = ("SELECT DISTINCT msg_sender FROM messages WHERE msg_reciever='$username'");
        $dataset = $connect->query($sql);
        while ($row = $dataset->fetch_assoc()) {
            if ($row['msg_sender'] == $username){
                echo "<div class='message' style='color:white;'>Sender: " . $row['msg_sender'] . "<br>";
                echo "Message: " . $row['msg_content'] . "<br><br></div>";
            }
            else{
                echo "<div class='messageMech' >Sender: " . $row['msg_sender'] . "<br>";
                echo "Message: " . $row['msg_content'] . "<br><br></div>";
            }
        }

        ?>
        </center>
    </div>
</body>

</html>