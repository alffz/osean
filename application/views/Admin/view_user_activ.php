<div class="row">
  <div class="container">
    <div class="col-md-6">
      <div class="card-header">
        <h3 class="card-title">Edit user activation</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <?php echo validation_errors(); ?>
      <form method="post">
        <div class="card-body">
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name='nama' value="<?php echo $user->nama_user ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="userActive">Aktivasi user</label><br>
            <small>1 = Aktif</small>
            <input type="number" name='userActiv' value="<?php echo $user->is_user_active ?>" class="form-control">
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