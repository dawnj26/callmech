<?php
require 'utils/config.php';
$id = $_GET['id'];
$sql = "UPDATE `components_images` SET `status` = 'Not Current' WHERE `components_images`.`components_id` = $id;";
$result=$connect->query($sql)or die ("Error executing SQL statement".$sql);
if ($result) {
    echo "<script> alert('You have successfully unset a logo!'); </script>";
  header("Location: admin_components.php");
} else {
  echo "Error";
}
