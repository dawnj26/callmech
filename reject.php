<?php
require 'utils/config.php';
$id = $_GET['id'];
$sql = "DELETE FROM `mechanics` WHERE mechid=$id";
$result=$connect->query($sql)or die ("Error executing SQL statement".$sql);
if ($result) {
    echo "<script> alert('The mechanic has been rejected!'); </script>";
  header("Location: admin_status_approval.php");
} else {
  echo "Error";
}
?>