<?php

//if(isset($_POST['file_data']))
//{
//	@session_start();
//	$_SESSION['file_data'] = $_POST['file_data'];
//	echo '1';
//}
//else
//{
//	echo '2';
//}
//echo '<script>alert("'.$_POST['file_data'].'")</script>';
//echo '<script>alert("'.$_POST['qty'].'")</script>';
//echo '<script>alert("'.$_POST['id'].'")</script>';

session_start();

include_once 'config.php';

//$img = $_POST['file_data'];
//$img = str_replace('data:image/' . '.png' . ';base64,', '', $img);
//$img = str_replace(' ', '+', $img);
//$data = base64_decode($img);
//$file = 'img-' . time() . '-' . rand(0, 100) . '.png';
//
//$target_dir = "customs/";
//$target_file = $target_dir . $file;
//file_put_contents($target_file,$data);
//$data = base64_decode($_POST["file_data"]);
//$file = 'img-' . time() . '-' . rand(0, 100) . '.png';
//$target_dir = "customs/";
//$target_file = $target_dir . $file;
//file_put_contents($target_file, $data);

$image_parts = explode(";base64,", $_POST['file_data']);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];
$image_base64 = base64_decode($image_parts[1]);
$file = 'img-' . time() . '-' . rand(0, 100) . '.png';
$target_dir = "customs/";
$target_file = $target_dir . $file;
file_put_contents($target_file, $image_base64);

$sql = "INSERT INTO `cart`(`item_ID`, `QUANTITY`,`customer_id`,`custom`) VALUES (" . $_POST['id'] . "," . $_POST['qty'] . "," . $_SESSION["customer_id"] . ",'$file')";
$con->query($sql);
//echo $sql;