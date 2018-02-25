
<?php
include_once 'config.php';
$qty=$_POST['qty'];
$id=$_GET['id'];
$sql= "INSERT INTO `cart`(`item_ID`, `QUANTITY`) VALUES ('.$id.','.$qty.')";
$con->query($sql);
echo '<script>alert("Added to Cart Successfully...")</script>';
echo '<script>window.location="index.php"</script>';


