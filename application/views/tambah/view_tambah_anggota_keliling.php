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
                        <input type="text" name='nama' class="form-control"  >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nomor Hp</label>
                        <input type="number" name='nomorhp' class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah Gang</label>
                        <input type="number" name='gang' class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jumlah Langganan</label>
                        <input type="number" name='langganan' class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Gaji</label>
                        <input type="number" name='gaji' class="form-control" >
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
   
   
            