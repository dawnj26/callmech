<?php
require 'config.php';
$id = $_GET['id'];
$sql = "UPDATE `components_images` SET `status` = 'Current' WHERE `components_images`.`components_id` = $id;";
$result=$connect->query($sql)or die ("Error executing SQL statement".$sql);
if ($result) {
    echo "<script> alert('You have successfully changed current logo!'); </script>";
  header("Location: admin_components.php");
} else {
  echo "Error";
}
