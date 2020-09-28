<?php include('inc/header.php') ?>
<!--For Page-->

<div class="album py-5 bg-light">
  <div class="container container-fluid">
    <h1> <span class="label label-default badge badge-secondary">Semua Produk</span></h1>
    <div style="margin-top:50px">

    </div>
    <div class="row">
      <?php
      $getFpd = $pd->getAllProduct();
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
                    <a type="button" class="btn btn-sm btn-outline-primary" href="detail.php?proId=<?php echo $result['productId']; ?>">View</a>
                    <button type="button" class="btn btn-sm btn-outline-danger">Add to Cart</button>
                  </div>
                  <p><span class="price">Rp <?php echo number_format($result['price']); ?></span></p>
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
<?php include('inc/footer.php') ?>