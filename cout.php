<?php

include_once 'config.php';
$sql = "SELECT cart.id as cart_id,`product`.`id`, `productname`, `prize`,`IMAGE`,`cart`.`quantity` FROM `product`,`cart` WHERE `item_ID`=`product`.`id` AND `customer_id`=" . $_SESSION["customer_id"];
//echo $sql;
$result = $con->query($sql);
if (mysqli_num_rows($result) != 0) {
    $total = 0;
    echo '<div class="review-payment">
                    <h2>Review & Payments</h2>
                </div>
        <div class="table-responsive cart_info">
        <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description"></td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo'
    <tr>
							<td class="cart_product">
								<a href=""><img src="images/' . $row['IMAGE'] . '"  height="200" width="200" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">' . $row['productname'] . '</a></h4>';
//								<p>Web ID:' . $row['id'] . '</p>
							echo '</td>
							<td class="cart_price">
								<p>Rs. ' . $row['prize'] . '</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">';
//									<a class="cart_quantity_up" href=""> + </a>
									echo '<input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2" disabled="disabled">';
//									<a class="cart_quantity_down" href=""> - </a>
								echo '</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">Rs. ' . ($row['prize'] * $row['quantity']) . '</p> 
							</td>';
//							<td class="cart_delete">
//								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
//							</td>
						echo '</tr>';
        $total = $total + ($row['prize'] * $row['quantity']);
    }
    echo'<tr>
							<td colspan="3">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>Rs. ' . $total . '</td>
									</tr>
			
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>Rs. ' . $total . '</span></td>
									</tr>
                                                                        
								</table>
							</td>
						</tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2">
                                                        <a class="btn btn-default check_out" href="pay.php">Check Out ...</a>
                                                    </td>
                                                </tr>';
    echo '     </tbody>
                    </table>
                    </div>';
}
