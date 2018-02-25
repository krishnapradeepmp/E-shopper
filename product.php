
<?php
include_once 'config.php';
$sql= "SELECT * FROM product";
$result=$con->query($sql);
while($row= mysqli_fetch_assoc($result))
{
echo '<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="images/'
											.$row['IMAGE'].
										'" alt="" />
										<h2>'
											.$row['prize'].
										'</h2>
										<p>'
											.$row['productname'].
										'</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>$'
											.$row['prize'].
										'</h2>
											<p>'
											.$row['productname'].
										'</p>
											<a href="http://localhost/eshopper/product-details.php#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>CUSTOMIZE NOW</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>';
}					