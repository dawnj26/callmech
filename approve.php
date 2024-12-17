<?php
require 'utils/config.php';
$id = $_GET['id'];
$sql = "UPDATE `mechanics` SET `acc_status` = 'Approved' WHERE `mechanics`.`mechid` = $id;";
$result=$connect->query($sql)or die ("Error executing SQL statement".$sql);
if ($result) {
    echo "<script> alert('The mechanic has been successfully approved!'); </script>";
  header("Location: admin_status_approval.php");
} else {
  echo "Error";
}
