<?php
    // data gang
    // var_dump($gang);
?>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#exampleModal">
  Tambah gang
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo validation_errors(); ?>
            <form role="form" method="post">
            <div class="card-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Pilih anggota keliling</label>
                    <select class="form-select" name="anggota" aria-label="Default select example">
                        <option selected>Pilih anggota Keliling</option>
                        <?php foreach ($anggota as $a) : ?>
                            <option value="<?php echo $a->id_anggota_keliling?>"><?php echo $a->nama_anggota_keliling?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                    
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Gang</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="">
                </div>                  
            </div>
        <!-- /.card-body -->

           <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
           </div>
        </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- loop data with bootstrap table -->
<div class="container m-3">
    <div class="row">
        <div class="col-md-12">        
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data gang</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Gang</th>
                                <th>Anggota Keliling</th>
                                <th>Pelanggan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($gang as $g) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $g->nama_gang ?></td>
                                    <td><?php echo $g->nama_anggota_keliling ?></td>
                                    <td>
                                        <a href="<?php echo base_url('pelanggan/'.$g->id_gang) ?>" class="btn btn-success btn-sm">Lihat pelanggan</a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('edit/gang/'.$g->id_gang) ?>" class="btn btn-warning btn-sm">Edit</a>                                        
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
        </div>
    </div>
</div>
            