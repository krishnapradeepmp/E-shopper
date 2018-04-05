
<?php

include_once 'config.php';
$sql = "SELECT * FROM product";
$result = $con->query($sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo ' <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/'
    . $row['IMAGE'] .
    '" alt="" />
										<h2>Rs. '
    . $row['prize'] .
    '</h2>
										<p>'
    . $row['productname'] .
    '</p>' .
    //<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
    '</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rs. '
    . $row['prize'] .
    '</h2>
											<p>'
    . $row['productname'] .
    '</p>
											<a href="product-details.php?id='
    . $row['id'] .
    '" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Details</a>';
//                                                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
    echo '</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="insertToWishlist.php?id='.$row['id'].'"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>';
//										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
    echo'</ul>
								</div>
							</div>
						</div>
                                                '
    ;
}					