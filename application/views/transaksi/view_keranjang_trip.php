<div class="container">
  <div class="row">
    <table id="table" class="table table-sm table-responsive table-bordered  m-3 font-weight-normal" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama pelanggan</th>
          <th>Jumlah beli</th>
          <th>harga</th>
          <th>total</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        $cart = $this->cart->contents();
        foreach ($cart as $item) : ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $item['name'] ?></td>
            <td><?php echo $item['qty'] ?></td>
            <td>Rp. <?php echo number_format($item['price'], 0, ',', '.') ?></td>
            <td>Rp. <?php echo number_format($item['subtotal'], 0, ',', '.') ?> </td>
            <td>
              <a href="<?php echo site_url('transaksi/hapus_keranjang_trip/' . $item['rowid']) ?>" class="btn btn-danger btn-sm">hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
        <tr>
          <td class="text-right" colspan="5">Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></td>
        </tr>

      </tbody>
    </table>
    <div class="justify-content-end">
      <a href="<?= base_url('transaksi/') ?>" class="btn btn-sm btn-success m-3">Tambah transaksi</a>
      <a href="<?= base_url('transaksi/pembayaran') ?>" class="btn btn-sm btn-primary m-3">Pembayaran</a>
    </div>
  </div>
</div>