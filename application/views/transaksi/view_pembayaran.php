<div class="container">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <?php
      $grand_total = 0;
      $cart = $this->cart->contents();
      foreach ($cart as $item) :
        $grand_total = $grand_total + $item['subtotal'];
      endforeach;
      ?>
      <div class="card text-white bg-primary m-3" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Total transaksi</h5>
          <p class="card-text"> Rp. <?= $grand_total ?></p>
          <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>
<?php
var_dump($cart); ?>