<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
<?php include('inc/header.php')?>
<?php
if (isset($_GET['proId'])) {
    $proId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proId']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $addCart = $ct->addToCart($quantity, $proId);
}
?>
<?php 
$cmrId = Session::get("cmrId");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
    $productId = $_POST['productId'];
    $insertCom = $pd->insertCompareDara($productId, $cmrId);
}
?>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wlist'])) {
    $saveWlist = $pd->saveWishListData($proId, $cmrId);
}
?>

<div class="container">
    <div class="cardss">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <?php 
                            $getPd = $pd->getSingleProduct($proId);
                            if ($getPd) {
                                while ($result = $getPd->fetch_assoc()) {
                                ?>
                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="admin/<?php echo $result['image']; ?>" />
                        </div>
                    </div>

                </div>
                <div class="details col-md-6">
                    <h3 class="product-title"><?php echo $result['productName']; ?></h3>
                    <p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia
                        sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
                    <h4 class="price">current price: <span>$<?php echo $result['price']; ?></h4>
                    <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                    <h5 class="sizes">sizes:
                        <span class="size" data-toggle="tooltip" title="small">s</span>
                        <span class="size" data-toggle="tooltip" title="medium">m</span>
                        <span class="size" data-toggle="tooltip" title="large">l</span>
                        <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                    </h5>
                    <form action="" method="post">
                        <div class="form-group row" style="margin-left: 0px;">
                            <div class="col-xs-2">
                                <label for="qty" class="sr-only">Jumlah</label>
                                <input type="number" name="quantity" class="form-control" id="qty" value="1">
                            </div>

                        </div>
                        <?php if (isset($minProAlert)) {
                            echo $minProAlert;
                        } ?>
                        <span style="color:red; font-size:18px;">
                            <?php if (isset($addCart)) {
                            echo $addCart;
                        } ?>
                        </span>
                        <?php if (isset($insertCom)) {
                            echo $insertCom;
                        }
                        if (isset($saveWlist)) {
                            echo $saveWlist;
                        } ?>
                        <?php 
                        $login = Session::get("cuslogin");
                        if ($login == true) {
                            ?>
                        <div class="action">
                            <button class="add-to-cart btn btn-primary" name="submit" type="submit">add to cart</button>

                            <form action="" method="post">
                                <!-- <input type="submit" class="buysubmit" name="wlist" value="Add to List"/> -->
                                <button class="like btn btn-danger" name="wlist" type="submit"><span
                                        class="fa fa-heart"></span></button>
                            </form>
                    </form>
                </div>

                <?php
                        }
                        else{
                    ?>
                <h1>Ingin beli? Silahkan <a href="login.php">Login</a></h1>
                <?php
                        }
                        ?>
            </div>
            <?php
                                }
                            }
                    ?>
        </div>
    </div>
</div>
</div>
<?php include('inc/footer.php')?>