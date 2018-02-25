<?php

include_once 'config.php';
$sql = "SELECT * FROM category";
$result = $con->query($sql);
echo'
		<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">';
while ($row = mysqli_fetch_assoc($result)) {
    echo'
		<li class="active"><a href="#' . $row['category_name'] . '" data-toggle="tab">' . $row['category_name'] . '</a></li>	';
}

echo '</ul>
						</div>';
/*						<div class="tab-content">
							<div class="tab-pane fade active in" id="' . $row['category_name'] . '" >';
$sql1 = "SELECT * FROM product WHERE catogory='" . $row['category_name'] . "'";
$result1 = $con->query($sql1);
while ($row1 = mysqli_fetch_assoc($result1)) {
    echo'


<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/' . $row1['IMAGE'] . '" alt="" />
												<h2>'
    . $row1['prize'] .
    '</h2>
												<p>'
    . $row1['productname'] .
    '</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>';
}*/
echo '</div>'; 
