<?php
include_once 'config.php';
$sql= "SELECT * FROM product LIMIT 0,6" ;
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
													<h2>Rs. '.$row['prize'].'</h2>
													<p>'.$row['productname'].'</p>
													<a href="http://localhost/eshopper/product-details.php?id='
    . $row['id'] .
    '" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Details</a>
												</div>
												
											</div>
										</div>
								
                                                               
									
					</div>';
}