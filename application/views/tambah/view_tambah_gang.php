<?php
    // data gang
    // var_dump($gang);
?>

        <?php echo validation_errors(); ?>
            <form role="form" method="post">
            <div class="card-body">
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

            