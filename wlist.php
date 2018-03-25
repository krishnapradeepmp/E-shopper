<?php
include_once 'config.php';
$sql= "SELECT wishlist.id as wishlist_id,`product`.`id`, `productname`, `prize`,`IMAGE` FROM `product`,`wishlist` WHERE `item_ID`=`product`.`id` AND `customer_id`=".$_SESSION["customer_id"];
$result=$con->query($sql);
echo'<tbody>';
while($row= mysqli_fetch_assoc($result))
{
echo'

						<tr>
							<td class="cart_product">
								<a href="product-details.php?id='.$row['id'].'"><img src="images/'.$row['IMAGE'].'" height="200" width="200" alt=""></a>
							</td>
				<td class="cart_description">
								<h4><a href="product-details.php?id='.$row['id'].'">'.$row['productname'].'</a></h4>
								<p>Web ID '.$row['id'].'</p>
							</td>
							<td class="cart_price">
								<p>'.$row['prize'].'</p>
							</td>
						
							
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="RemoveFromWishlist.php?id='.$row['wishlist_id'].'"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						
					
';

}
echo'</tbody>';
?>