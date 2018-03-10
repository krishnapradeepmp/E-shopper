<?php
include_once 'config.php';
$sql= "SELECT cart.id as cart_id,`product`.`id`, `productname`, `prize`,`IMAGE`,`cart`.`quantity` FROM `product`,`cart` WHERE `item_ID`=`product`.`id` AND `customer_id`=".$_SESSION["customer_id"];
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
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="'.$row['quantity'].'" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">'.($row['prize']*$row['quantity']).'</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="RemoveFromCart.php?id='.$row['cart_id'].'"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						
					
';

}
echo'</tbody>';
?>