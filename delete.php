<?php
require 'utils/config.php';
$id = $_GET['id'];
$sql = "DELETE FROM `components_images` WHERE components_id=$id";
$result=$connect->query($sql)or die ("Error executing SQL statement".$sql);
if ($result) {
    echo "<script> alert('The mechanic has been rejected!'); </script>";
  header("Location: admin_components.php");
} else {
  echo "Error";
}
?>