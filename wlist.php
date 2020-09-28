<?php include 'inc/header.php'; ?>
<?php
if (isset($_GET['delwlistid'])) {
    $productId = $_GET['delwlistid'];
    $delwlist = $pd->delWlistData($productId, $cmrId);
}
?>
<div style="margin-top:40px"></div>
<div class="container">
    <div class="content">

        <h2>Wish List</h2>
        <?php if (isset($delwlist)) {
            echo $delwlist;
        } ?>
        <table class="table">
            <tr>
                <th>Sl</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
            $getPd = $pd->getWlistData($cmrId);
            if ($getPd) {
                $i = 0;


                while ($result = $getPd->fetch_assoc()) {
                    $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['productName']; ?></td>
                        <td>Rp. <?php echo $result['price']; ?></td>
                        <td><img src="admin/<?php echo $result['image']; ?>" width="100" height="100" alt="" /></td>
                        <td>
                            <a class="badge badge-primary" href="detail.php?proId=<?php echo $result['productId']; ?>">Buy Now</a> |
                            <a class="badge badge-danger" href="?delwlistid=<?php echo $result['productId']; ?>">Remove</a>
                        </td>
                    </tr>

            <?php
                }
            } ?>
        </table>


        <div class="shopping">
            <div class="shopleft" style="width: 100%; text-align: center;">
                <a href="index.php"> <img src="images/shop.png" alt="" /></a>
            </div>

        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>