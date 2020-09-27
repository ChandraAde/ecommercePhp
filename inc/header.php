<?php
include 'lib/Session.php';
Session::init();
include 'lib/Database.php';
include 'helpers/Format.php';
// include 'classes/Product2.php';
// include 'classes/Cart.php';

spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});
$db = new Database();
$fm = new Format();
$pd = new Product();
$ct = new Cart();
$cat = new Category();
$cmr = new Customer();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/detail.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/cards.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/fontawesome.min.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        .gambar {
            background-image: url(https://3.bp.blogspot.com/-7J0DwNqcHnU/WJf2EITqAmI/AAAAAAAAADk/aImIh6a2EoA2avuSGv15_e1rtDCvyr2GQCLcB/s1600/tenun%2Bntt%2Btenun%2Btroso%2Btenun%2Badalah%2Btenun%2Bpelepah%2Bpisang%2Btenun%2Bulap%2Bdoyo%2Btenun%2Batbm%2Btenun%2Baceh%2Btenun%2Balmond.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .shadowText {
            -webkit-text-stroke: 1px black;
            color: white;
            text-shadow:
                3px 3px 0 #000,
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000;
        }
    </style>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    <div class="super_container">
        <!-- Header -->
        <header class="header">
            <!-- Top Bar -->
            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918577/phone.png" alt=""></div>+91 9823 132 111
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918597/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">contact@bbbootstrap.com</a>
                            </div>
                            <div class="top_bar_content ml-auto">

                                <div class="top_bar_user">

                                    <div class="user_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg" alt=""></div>
                                    <!-- <div><a href="#">Register</a></div> -->
                                    <!-- <div><a href="#">Sign in</a></div> -->
                                    <?php
                                    if (isset($_GET['cid'])) {
                                        $cmrId = Session::get("cmrId");
                                        $delData = $ct->delCustomerCart();
                                        $delComp = $pd->delCompareDara($cmrId);
                                        Session::destroy();
                                    }
                                    ?>
                                    <div class="login">
                                        <?php
                                        $login = Session::get("cuslogin");
                                        if ($login == false) {
                                        ?>
                                            <a href="login.php">Login</a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="?cid=<?php Session::get('cmrId'); ?>">Logout</a>
                                        <?php
                                        }
                                        ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Header Main -->
            <div class="header_main">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="#">BBB</a></div>
                            </div>
                        </div> <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form action="#" class="header_search_form clearfix"> <input type="search" required="required" class="header_search_input" placeholder="Search for products...">
                                            <div class="custom_dropdown" style="display: none;">
                                                <div class="custom_dropdown_list"> <span class="custom_dropdown_placeholder clc">All Categories</span> <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        <li><a class="clc" href="#">All Categories</a></li>
                                                        <li><a class="clc" href="#">Computers</a></li>
                                                        <li><a class="clc" href="#">Laptops</a></li>
                                                        <li><a class="clc" href="#">Cameras</a></li>
                                                        <li><a class="clc" href="#">Hardware</a></li>
                                                        <li><a class="clc" href="#">Smartphones</a></li>
                                                    </ul>
                                                </div>
                                            </div> <button type="submit" class="header_search_button trans_300" value="Submit"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png" alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                    <div class="wishlist_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918681/heart.png" alt=""></div>
                                    <div class="wishlist_content">

                                        <div class="wishlist_text"><a href="#">Wishlist</a></div>
                                        <?php
                                        $cmrId = Session::get("cmrId");
                                        $getwl = $pd->getWlistData($cmrId);
                                        if ($getwl) {
                                            $row = $getwl->fetch_assoc();
                                            // echo $row;
                                        ?>
                                            <div class="wishlist_count"></div>
                                        <?php
                                        }
                                        else {
                                        ?>
                                            <div class="wishlist_count">0</div>
                                        <?php
                                            
                                        }
                                        ?>
                                        
                                    </div>
                                </div> <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">

                                        <?php
                                        $getData = $ct->checkCartItem();
                                        if ($getData) {
                                            $sum = Session::get("gTotal");
                                            $qty = Session::get("qty");

                                        ?>
                                            <div class="cart_icon"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                                                <div class="cart_count"><span><?php echo $qty  ?></span></div>
                                            </div>
                                            <div class="cart_content">
                                                <div class="cart_text"><a href="cart.php">Cart</a></div>
                                                <div class="cart_price"><?php echo "$" . number_format($sum) . ".00" ?></div>
                                            <?php
                                        } else {
                                            ?>
                                                <div class="cart_icon"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                                                    <div class="cart_count"><span>0</span></div>
                                                </div>
                                                <div class="cart_content">
                                                    <div class="cart_text"><a href="cart.php">Cart</a></div>
                                                    <div class="cart_price">$0</div>
                                                <?php
                                            }

                                                ?>

                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- Main Navigation -->
                <nav class="main_nav">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="main_nav_content d-flex flex-row">
                                    <!-- Categories Menu -->
                                    <!-- Main Nav Menu -->
                                    <div class="main_nav_menu">
                                        <ul class="standard_dropdown main_nav_dropdown">
                                            <li><a href="index.php">Home<i class="fas fa-chevron-down"></i></a></li>
                                            <li class="hassubs"> <a href="#">Top Brands</a>
                                            </li>
                                            <?php
                                            $cmrId = Session::get("cmrId");
                                            $chkOrder = $ct->checkOrder($cmrId);
                                            if ($chkOrder) {
                                            ?>
                                                <!-- <li><a href="orderdetails.php">Order</a></li> -->
                                                <li class="hassubs"> <a href="#">Order</a>
                                                <?php
                                            }
                                                ?>
                                                </li>

                                                <li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
                                        </ul>
                                    </div> <!-- Menu Trigger -->
                                    <div class="menu_trigger_container ml-auto">
                                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                            <div class="menu_burger">
                                                <div class="menu_trigger_text">menu</div>
                                                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav> <!-- Menu -->
        </header>