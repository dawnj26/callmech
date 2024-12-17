<?php
session_start();
require 'utils/config.php';
$id = $_SESSION['mechanicid'];
$name=$_POST['name'];
$addr=$_POST['address'];
$num=$_POST['number'];
$services=$_POST['services'];
$sql = "UPDATE `mechanics` SET `mechName` = '$name',`mechaddr`= '$addr',`mechno`= '$num',`mech_services`= '$services' WHERE `mechanics`.`mechid` = $id;";
$result=$connect->query($sql)or die ("Error executing SQL statement".$sql);
if ($result) {
    echo "<script> alert('Your profile has been successfully updated!'); </script>";
  header("Location: profile.php");
} else {
  echo "Error";
}
