<?php

include_once 'config.php';
$sql = "SELECT wishlist.id as wishlist_id,`product`.`id`, `productname`, `prize`,`IMAGE` FROM `product`,`wishlist` WHERE `item_ID`=`product`.`id` AND `customer_id`=" . $_SESSION["customer_id"];
//echo $sql;
$result = $con->query($sql);
if (mysqli_num_rows($result) != 0) {
    echo '<div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description"></td>
                                <td class="price">Price</td>

                                <td></td>
                            </tr>
                        </thead>';
    
    echo'<tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo'

						<tr>
							<td class="cart_product">
								<a href="product-details.php?id=' . $row['id'] . '"><img src="images/' . $row['IMAGE'] . '" height="200" width="200" alt=""></a>
							</td>
				<td class="cart_description">
								<h4><a href="product-details.php?id=' . $row['id'] . '">' . $row['productname'] . '</a></h4>
								<p>Web ID ' . $row['id'] . '</p>
							</td>
							<td class="cart_price">
								<p>Rs. ' . $row['prize'] . '</p>
							</td>
						
							
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="RemoveFromWishlist.php?id=' . $row['wishlist_id'] . '"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						
					
';
    }
    echo'</tbody>';
    
    echo '                </table>
                </div>';
    
}