
<div class="col-6 ">
    <div class="card-header">
        <h3 class="card-title">Edit gang</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post">
        <div class="card-body">
            <div class="form-group">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Gang</label>
                <input type="text" name="nama" value="<?= $gang->nama_gang?>" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>                  
        </div>
    <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
    </form>
</div>
            