<?php

include_once 'config.php';
$sql = "SELECT * FROM category";
$result = $con->query($sql);
$i = 0;
$cat = array();
echo '<div class="col-sm-12">
							<ul class="nav nav-tabs">';
while ($row = mysqli_fetch_assoc($result)) {
    if ($i == 0) {
        echo'<li class="active"><a href="#' . $row['category_name'] . '" data-toggle="tab">' . $row['category_name'] . '</a></li>';

        $i++;
    } else {
        echo'<li><a href="#' . $row['category_name'] . '" data-toggle="tab">' . $row['category_name'] . '</a></li>';
    }
    array_push($cat, $row['category_name']);
}
echo '</ul>
						</div>';

echo '<div class="tab-content">';
for ($i = 0; $i < count($cat); $i++) {
    echo '<div class="tab-pane fade active in" id="' . $cat[$i] . '" >';
    $sql = "SELECT * FROM `product` WHERE `category`='" . $cat[$i]."' LIMIT 0,3";
    $result = $con->query($sql);
    if (mysqli_num_rows($result) != 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-sm-3">
									<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/'
            . $row['IMAGE'] .
            '" alt="" />
													<h2>Rs. ' . $row['prize'] . '</h2>
													<p>' . $row['productname'] . '</p>
													<a href="http://localhost/eshopper/product-details.php?id='
            . $row['id'] .
            '" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Details</a>
												</div>
												
											</div>
										</div>
								</div>';
        }
    }


    echo '</div>';
}



echo '					</div>';

