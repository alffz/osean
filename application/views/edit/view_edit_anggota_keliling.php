<div class="row">
    <div class="container">
        <div class="col-md-6">
            <div class="card-header">
                <h3 class="card-title">Tambah anggota keliling</h3>
            </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php echo validation_errors(); ?>
            <form method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name='nama' value="<?php echo $anggota->nama_anggota_keliling?>" class="form-control"  >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nomor Hp</label>
                        <input type="number" name='nomorhp' value="<?php echo $anggota->nomor_hp?>" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah Gang</label>
                        <input type="number" name='gang' value="<?php echo $anggota->jumlah_gang ?>" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah Langganan</label>
                        <input type="number" name='langganan' value="<?php echo $anggota->jumlah_langganan?>" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Gaji</label>
                        <input type="number" name='gaji' value="<?php echo $anggota->gaji?>" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <small>1 = aktif, 0 = nonaktif</small>
                        <input type="number" name='status' value="<?php echo $anggota->is_anggota_keliling_active?>" class="form-control" >
                    </div>
                </div>
            <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Batal</button>
                </div>
            </form>
        </div>        
    </div>
</div>
   
            