<?php
include_once 'config.php';
$sql = "SELECT * FROM product where id=" . $_GET['id'];
$result = $con->query($sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="images/<?php echo $row['IMAGE']; ?>" alt="" />
            <h3>ZOOM</h3>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->


            <!-- Controls -->
            <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2><?php echo $row['productname']; ?></h2>

            <img src="images/product-details/rating.png" alt="" />
            <span>
                <span>Rs. <?php echo $row['prize']; ?></span>
                <label>Quantity:</label><form name="insert" action="insertToCart.php?id=<?php echo $row['id']; ?>" method="POST">
                    <input type="text" value="1" name="qty"/> 
                    <input type="submit" value="insertbutton" name="addcart" />
                    <a href="insertToWishlist.php?id=<?php echo $row['id']; ?>"><input type="button" value="Wish" /></a>
                    <a href="http://localhost/html5-picture-editor/index.php?image=http://localhost/eshopper/images/<?php echo $row['IMAGE']; ?>"><input type="button" value="Customize" /></a>
                  
                    <!--<input type="submit" value="Add2Wishlist" name="addcart" /></form>-->

                <!--<button type="button" class="btn btn-fefault cart">-->
                        <!--<i class="fa fa-shopping-cart"></i>-->
                <!--Add to cart-->
                <!--</button>-->
            </span>
            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Brand:</b> E-SHOPPER</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->