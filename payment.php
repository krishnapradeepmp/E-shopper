<?php

session_start();

include_once 'config.php';
$sql = "INSERT INTO `customer`(`c_name`, `c_address`) VALUES ('" . $_GET['bill_name'] . "','" . $_GET['bill_address'] . "')";
//echo $sql;
$con->query($sql);
$last_id = $con->insert_id;

$sql = "SELECT cart.id as cart_id,`product`.`id`, `productname`, `prize`,`IMAGE`,`cart`.`quantity`,`custom` FROM `product`,`cart` WHERE `item_ID`=`product`.`id` AND `customer_id`=" . $_SESSION["customer_id"];
$result = $con->query($sql);
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['custom'] == '') {
        $sql = "INSERT INTO `orders`(`model_id`, `quantity`, `customer_id`, `amount`) VALUES 
    (" . $row['id'] . "," . $row['quantity'] . ",$last_id," . ($row['prize'] * $row['quantity']) . ")";
    } else {
        $sql = "INSERT INTO `orders`(`model_id`, `quantity`, `customer_id`, `amount`, `custom`) VALUES 
    (" . $row['id'] . "," . $row['quantity'] . ",$last_id," . ($row['prize'] * $row['quantity']) . ",'" . $row['custom'] . "')";
    }
//    echo $sql;
    $con->query($sql);
    $last_order = $con->insert_id;
    $sql = "INSERT INTO `delivery`(`daddress`, `order_id`, `delivery_name`) VALUES ('" . $_GET['ship_name'] . "',$last_order,'" . $_GET['ship_address'] . "')";
//    echo $sql;
    $con->query($sql);
    $sql = "DELETE from `cart` where id=".$row['cart_id'];
//    echo $sql;
    $con->query($sql);
}

echo '<script>alert("Ordered Successfully...")</script>';
echo '<script>window.location="index.php"</script>';


