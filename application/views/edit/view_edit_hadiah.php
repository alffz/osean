<div class="container">
  <div class="row">
    <!-- form bootstra   -->
    <div class="col-md-6 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Hadiah</h3>
        </div>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <label for="">Nama Hadiah</label>
              <input type="text" name="hadiah" class="form-control" value="<?= $hadiah->nama_hadiah ?>" placeholder="Hadiah" required>
            </div>
            <div class="form-group">
              <label for="">Jumlah kupon</label>
              <input type="number" name="jumlah_kupon" class="form-control" value="<?= $hadiah->jumlah_kupn_hadiah ?>" placeholder="Jumlah kupon" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Edit hadiah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>