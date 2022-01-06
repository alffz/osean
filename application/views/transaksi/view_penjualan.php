<div class="container">
  <div class="row">
    <div class="col-md-10 col-sm-12">
      <!-- form bootstrap-->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Transaksi</h3>
        </div>
        <div class="panel-body">
          <!-- form error -->
          <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
            </div>
          <?php endif; ?>
          <form class="form-horizontal" method="post">
            <!-- option bootstrap -->
            <div class="row">
              <div class="col-md-2 ">
                <div class="form-group">
                  <label class="control-label">Trip</label>
                  <select class="form-control" name="trip">
                    <option value="">Trip</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class=" control-label">Anggota</label>
                  <select class="form-control" name="id_anggota" id="anggota">
                    <option value="" selected>Pilih Anggota keliling</option>
                    <?php foreach ($anggota as $key => $value) { ?>
                      <option value="<?php echo $value->id_anggota_keliling; ?>"><?php echo $value->nama_anggota_keliling; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class=" control-label">Gang</label>
                  <select class="form-control" name="gang" id="gang">
                    <option value="" selected>Pilih Gang</option>
                    <?php foreach ($gang as $key => $value) { ?>
                      <option value="<?php echo $value->id_gang; ?>"><?php echo $value->nama_gang; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class="control-label">Pelanggan</label>
                  <!-- select -->
                  <select class="form-control" name="pelanggan" id="pelanggan">
                    <option value="">Pilih Pelanggan</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label class=" control-label">Jumlah galon</label>
                  <input type="number" class="form-control " name="jumlah_galon" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">Bayar</label>
                  <input type="number" class="form-control " name="bayar">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">Hutang</label>
                  <input type="number" class="form-control " name="hutang">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">Bayar kupon</label>
                  <input type="number" class="form-control " name="bayar_kupon">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label">Catatan</label>
                  <input type="text" class="form-control" name="catatan">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-8">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</div>

<script>
  // run ajax get data
  // on change 

  $(document).ready(function() {
    $('#gang').change(function() {
      var id_gang = $(this).val();
      var data = [];
      console.log(id_gang);
      $.ajax({
        url: "<?php echo base_url('api/api/get_pelanggan'); ?>",
        method: "POST",
        data: {
          id_gang: id_gang
        },
        async: false,
        dataType: 'json',
        success: function(data) {
          $('#pelanggan').children('.item').remove();
          $.each(data, function(i, item) {
            renderDataPelanggan(item);
          });
          $('#pelanggan').change(function() {
            for (let i = 0; i < data.length; i++) {
              console.log(data[i].nama_anggota_keliling);
            }

          });

        }

      });

    });

    // render data pelanggan
    function renderDataPelanggan(item) {
      $('#pelanggan').append('<option class="item" value="' + item.id_pelanggan + '">' + item.nama_pelanggan + '</option>');
    }
  });

  // loop data json 
</script>