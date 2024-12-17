<?php
require 'utils/config.php';
$name="logo";
$logo = $_FILES['image'];
$status="Not Current";
          
$fileName=$_FILES['image']['name'];
$tmpName = $_FILES['image']['tmp_name'];
$validImageExtension=['.jpg','.jpeg', '.png']; 
$ImageExtension=explode('.',$fileName);
$ImageExtension = strtolower(end($ImageExtension)); 
$newImageName=uniqid();
$newImageName .='.' .$ImageExtension;

$target = "C:\\xampp\\htdocs\\cc106etr\\image\\" . basename($fileName);
move_uploaded_file($tmpName, $target);

$sql = "INSERT INTO `components_images`(`components_name`, `components_image`, `status`) VALUES ('$name','$fileName','$status')";
$result=$connect->query($sql)or die ("Error executing SQL statement".$sql);
if ($result) {
  header("Location: admin_components.php");
} else {
  echo "Error";
}
