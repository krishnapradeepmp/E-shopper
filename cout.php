<?php
include_once 'config.php';
$sql= "SELECT cart.id as cart_id,`product`.`id`, `productname`, `prize`,`IMAGE`,`cart`.`quantity` FROM `product`,`cart` WHERE `item_ID`=`product`.`id` AND `customer_id`=".$_SESSION["customer_id"];
$result=$con->query($sql);
$total=0;
while($row= mysqli_fetch_assoc($result))
{
    echo'
    <tr>
							<td class="cart_product">
								<a href=""><img src="images/'.$row['IMAGE'].'" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">"images/'.$row['productname'].'"</a></h4>
								<p>Web ID:'.$row['id'].'</p>
							</td>
							<td class="cart_price">
								<p>'.$row['prize'].'</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">'.($row['prize']*$row['quantity']).'</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>';
    $total=$total+($row['prize']*$row['quantity']);
}
echo'<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>.$total;.</td>
									</tr>
			
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>$61</span></td>
									</tr>
								</table>
							</td>
						</tr>';
echo "total".$total;
