<?php var_dump('$gang'); ?>
<div class="col-6 ">
    <div class="card-header">
        <h3 class="card-title">Edit gang</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post">
        <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Pilih anggota keliling</label>
                <select class="form-select" name="anggota" aria-label="Default select example">
                    <option selected value="<?= $gang->id_gang?>">Pilih anggota Keliling</option>
                    <?php foreach ($anggota as $a) : ?>
                        <option value="<?php echo $a->id_anggota_keliling?>"><?php echo $a->nama_anggota_keliling?></option>
                    <?php endforeach; ?>
                </select>
            </div>
                
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
            