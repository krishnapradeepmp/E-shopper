<?php
session_start();
include_once 'config.php';
if (!isset($_SESSION["customer_id"])) {
    $sql = "SELECT MAX(id) FROM customer";
    $result = $con->query($sql);
    $row = mysqli_fetch_assoc($result);
    $_SESSION["customer_id"] = $row["MAX(id)"] + 1;
    $sql1 = "INSERT INTO `customer`(`c_name`, `c_address`) VALUES ('guest','guestAddress')";
    $con->query($sql1);
}
//echo $_SESSION["customer_id"];
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | E-Gifts</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/price-range.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>

        <?php include_once 'header.php'; ?>

        <section id="slider"><!--slider-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#slider-carousel" data-slide-to="1"></li>
                                <li data-target="#slider-carousel" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-6">
                                        <h1><span><b>LAMIYA MOMENT</b></span><br>
                                            <i>Gift is a matter...</i></h1>
                                        <h2>Personalized Online Gift Shoppee</h2>
                                        <p>Create beautiful custom blankets for your home or as gifts. Discover a wide selection of personalized blankets. </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="images/home/top3.jpg" class="girl img-responsive" alt="" /></div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>Online</span>-GIFTING</h1>
                                        <h2>100% Responsive Design</h2>
                                        <p> Magic Mug is a very different coffee mug and a very adorable one.It is a magical red mug. The best part is that the moment you will pour hot beverage it will change the color. One can enjoy and sip your coffee at any hour and at any place. These mugs are extremely unique and classy as they are photo template based and can be gifted to your loved ones on any occasion. One can present it to your loved one and make them feel special. It gives a very great look when kept it in the wardrobe of your kitchen. So, pep up your life and enjoy your hot beverage in this classic mug. </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="images/home/top2.jpg" class="girl img-responsive" alt="" />

                                    </div>
                                </div>

                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-GIFTING</h1>
                                        <h2>Personalized Cofee Mug</h2>
                                        <p>Boho Floral Personalized Name Coffee Mug - the perfect gift for mom, family, friends and coworkers who needs a cup of joy to get their day started.  </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="images/home/top3.jpg" class="girl img-responsive" alt="" />

                                    </div>
                                </div>

                            </div>

                            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section><!--/slider-->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Category</h2>
                            <?php
                            require_once 'Ctegory.php';
                            ?>
                            <!--						<div class="panel-group category-products" id="accordian">category-productsr
                                                                                    <div class="panel panel-default">
                                                                                            <div class="panel-heading">
                                                                                                    <h4 class="panel-title">
                                                                                                            <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                                                                                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                                                                                    Mugs&Sippers
                                                                                                            </a>
                                                                                                    </h4>
                                                                                            </div>
                                                                                            <div id="sportswear" class="panel-collapse collapse">
                                                                                                    <div class="panel-body">
                                                                                                            <ul>
                                                                                                                    <li><a href="#">Coffee Mugs</a></li>
                                                                                                                    <li><a href="#">T-Mugs </a></li>
                                                                                                                    <li><a href="#"> </a></li>
                                                                                                                    <li><a href="#">Beer Mugs</a></li>
                                                                                                                    <li><a href="#">Sippers </a></li>
                                                                                                            </ul>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="panel panel-default">
                                                                                            <div class="panel-heading">
                                                                                                    <h4 class="panel-title">
                                                                                                            <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                                                                                                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                                                                                    Clothing
                                                                                                            </a>
                                                                                                    </h4>
                                                                                            </div>
                                                                                            <div id="mens" class="panel-collapse collapse">
                                                                                                    <div class="panel-body">
                                                                                                            <ul>
                                                                                                                    <li><a href="#">Caps</a></li>
                                                                                                                    <li><a href="#">T_shirts</a></li>
                                                                                                                    <li><a href="#">Bedsheet</a></li>
                                                                                                                    
                                                                                                            </ul>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    
                                                                                    <div class="panel panel-default">
                                                                                            <div class="panel-heading">
                                                                                                    <h4 class="panel-title">
                                                                                                            <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                                                                                                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                                                                                    Womens
                                                                                                            </a>
                                                                                                    </h4>
                                                                                            </div>
                                                                                            <div id="womens" class="panel-collapse collapse">
                                                                                                    <div class="panel-body">
                                                                                                            <ul>
                                                                                                                    <li><a href="#">Fendi</a></li>
                                                                                                                    <li><a href="#">Guess</a></li>
                                                                                                                    <li><a href="#">Valentino</a></li>
                                                                                                                    <li><a href="#">Dior</a></li>
                                                                                                                    <li><a href="#">Versace</a></li>
                                                                                                            </ul>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="panel panel-default">
                                                                                            <div class="panel-heading">
                                                                                                    <h4 class="panel-title"><a href="#">Kids</a></h4>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="panel panel-default">
                                                                                            <div class="panel-heading">
                                                                                                    <h4 class="panel-title"><a href="#">Fashion</a></h4>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="panel panel-default">
                                                                                            <div class="panel-heading">
                                                                                                    <h4 class="panel-title"><a href="#">Households</a></h4>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="panel panel-default">
                                                                                            <div class="panel-heading">
                                                                                                    <h4 class="panel-title"><a href="#">Interiors</a></h4>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="panel panel-default">
                                                                                            <div class="panel-heading">
                                                                                                    <h4 class="panel-title"><a href="#">Clothing</a></h4>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="panel panel-default">
                                                                                            <div class="panel-heading">
                                                                                                    <h4 class="panel-title"><a href="#">Bags</a></h4>
                                                                                            </div>
                                                                                    </div>
                                                                                    <div class="panel panel-default">
                                                                                            <div class="panel-heading">
                                                                                                    <h4 class="panel-title"><a href="#">Shoes</a></h4>
                                                                                            </div>
                                                                                    </div>
                                                                            </div>/category-products-->


                            <div class="price-range"><!--price-range-->
                                <h2>Price Range</h2>
                                <div class="well text-center">
                                    <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                    <b class="pull-left">Rs. 0</b> <b class="pull-right">Rs. 600</b>
                                </div>
                            </div><!--/price-range-->

                            <div class="shipping text-center"><!--shipping-->
                                <img src="images/home/shipping.jpg" alt="" />
                            </div><!--/shipping-->

                        </div>
                    </div>


                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Featured Items</h2>
                        <?php
                        require_once 'product.php';
                        ?>


                    </div><!--features_items-->

                    <div class="category-tab"><!--category-tab-->
                        <?php require_once 'categorybar.php'; ?>	
                        
                    </div><!--/category-tab-->


                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">	
                                    <?php include_once 'Recommended.php' ?>								
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>			
                        </div>
                    </div><!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>

    <footer id="footer"><!--Footer-->
        <?php include_once 'footer.php'; ?>

    </footer><!--/Footer-->



    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
