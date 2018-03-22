<?php
session_start();
 include_once 'config.php';
 $id=$_GET['id'];
 $sql="DELETE FROM `wishlist` where id=$id";
$con->querry($sql);
echo '<script>alert("Deleted from Wishlist Successfully...")</script>';
echo '<script>window.location="currentWishlist.php"</script>';
 