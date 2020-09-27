<?php include('inc/header.php') ?>
<!--For Page-->
<div class="gambar position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    <h1 class="display-4 font-weight-normal shadowText">Kain Tenun</h1>
    <!-- <p class="lead font-weight-normal shadowText">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple's marketing pages.</p> -->
    <!-- <a class="btn btn-outline-secondary" href="#">Coming soon</a> -->
  </div>
  <div class="product-device box-shadow d-none d-md-block"></div>
  <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
</div>
<div class="album py-5 bg-light">
  <div class="container">
    <h1> <span class="label label-default badge badge-secondary">Produk Pilihan</span></h1>
    <div style="margin-top:50px">

    </div>
    <div class="row">
      <?php
      $getFpd = $pd->getFeaturedProduct();
      if ($getFpd) {
        while ($result = $getFpd->fetch_assoc()) {
      ?>
          <div class="col-md-3">
            <div class="card mb-3 box-shadow" style="width: 18rem;">
              <img class="card-img-top" src="admin/<?php echo $result['image']; ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $result['productName']; ?></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-primary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-danger">Add to Cart</button>
                  </div>
                  <p><span class="price">$<?php echo $result['price']; ?></span></p>
                </div>

              </div>
            </div>
          </div>
      <?php
        }
      } ?>

    </div>
  </div>
</div>
<div class="album py-5 bg-light">
  <div class="container">
    <h1> <span class="label label-default badge badge-secondary">Produk Baru</span></h1>
    <div style="margin-top:50px">

    </div>
    <div class="row">
      <?php
      $getNpd = $pd->getNewProduct();
      if ($getNpd) {
        while ($result = $getNpd->fetch_assoc()) {
      ?>
          <div class="col-md-3">
            <div class="card mb-3 box-shadow" style="width: 18rem;">
              <img class="card-img-top" src="admin/<?php echo $result['image']; ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $result['productName']; ?></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a type="button" class="btn btn-sm btn-outline-primary" href="detail.php?proId=<?php echo $result['productId']; ?>">View</a>
                    <button type="button" class="btn btn-sm btn-outline-danger">Add to Cart</button>
                  </div>
                  <p><span class="price">$<?php echo $result['price']; ?></span></p>
                </div>

              </div>
            </div>
          </div>
      <?php
        }
      } ?>

    </div>
  </div>
</div>
</div>

<?php include('inc/footer.php') ?>