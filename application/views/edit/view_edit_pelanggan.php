<div class="card-header">
    <h3 class="card-title">Tambah Pelanggan</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<!-- form error -->
<?php if (validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
    </div>
<?php endif; ?>
<form role="form" method="post">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Anggota keliling</label>
                    <select class="form-control" name="anggota">
                        <option selected value="<?= $pelanggan->id_anggota_keliling ?>"><?= $pelanggan->nama_anggota_keliling ?></option>
                        <?php foreach ($anggota as $a) : ?>
                            <option value="<?= $a->id_anggota_keliling ?>"><?= $a->nama_anggota_keliling ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" name='nama_pelanggan' value="<?= $pelanggan->nama_pelanggan ?>" id="exampleInputEmail1" placeholder="">
                </div>
                <div class="form-group">
                    <label>Nomor Rumah</label>
                    <select class="form-control" name='nomor_rumah'>
                        <option selected value="<?= $pelanggan->id_nomor_rumah ?>"><?= $pelanggan->nomor_rumah ?></option>
                        <?php foreach ($nomor_rumah as $n) : ?>
                            <option value="<?= $n->id_nomor_rumah ?>"><?= $n->nomor_rumah ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Hp</label>
                    <input type="number" class="form-control" name='nomor_hp' value="<?= $pelanggan->nomor_hp ?>" id="exampleInputEmail1" placeholder="">
                </div>
                <div class="form-group">
                    <label>Pilih gang</label>
                    <select class="form-control" name='gang'>
                        <option selected value="<?= $pelanggan->id_gang ?>"><?= $pelanggan->nama_gang ?></option>
                        <?php foreach ($gang as $g) : ?>
                            <option value="<?= $g->id_gang ?>"><?= $g->nama_gang ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input type="number" class="form-control" name='harga' value="<?= $pelanggan->harga ?>" id="exampleInputEmail1" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah galon</label>
                    <input type="number" class="form-control" name='galon' value="<?= $pelanggan->jumlah_galon ?>" id="exampleInputEmail1" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah anggota keluarga</label>
                    <input type="number" class="form-control" name='anggota_keluarga' value="<?= $pelanggan->jumlah_keluarga ?>" id="exampleInputEmail1" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Status rumah</label>
                    <select class="form-control" name='status_rumah'>
                        <option selected value="value=" <?= $pelanggan->status_rumah ?>>
                            <?php if ($pelanggan->status_rumah == 'rs') {
                                echo 'Rumah Sendiri';
                            } elseif ($pelanggan->status_rumah == 'n') {
                                echo 'Tinggal bersama orang tuan';
                            } else {
                                echo 'Nyewa';
                            } ?></option>
                        <option value="rs">Rumah sendiri</option>
                        <option value="n">Tinggal Bersama orang tua</option>
                        <option value="s">Nyewa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Aktivasi langganan</label>
                    <input type="number" class="form-control" name='aktivasi' value="<?= $pelanggan->is_langganan_active ?>" id="exampleInputEmail1" placeholder="1 = aktif , 0 = nonaktif">
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type='reset' class="btn btn-danger">Reset</button>
    </div>
</form>
<?php var_dump($pelanggan) ?>