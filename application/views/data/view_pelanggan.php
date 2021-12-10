<!-- bootstrp table -->
<a href="<?= base_url('tambah/pelanggan')?>" class="btn btn-success btn-sm m-3">Tambah pelanggan</a>
<!-- table bootstrap -->
<div class="table-responsive m-3">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Anggota keliling</th>
                <th>gang</th>
                <th>Nama pelanggang</th>
                <th>Nomor rumah</th>
                <th>harga</th>
                <th>Jumlah galon</th>
                <th>Jumlah keluarga</th>
                <th>status rumah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($pelanggan as $g) {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $g->nama_gang; ?></td>
                    <td>
                        <a href="<?php echo base_url(); ?>edit/gang/<?php echo $g->id_gang; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                        <a href="<?php echo base_url(); ?>data/gang/langganan/<?php echo $g->id_gang; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Langganan</a>
                    </td>
                </tr>
                <?php
                $no++;
            }
            ?>
        </tbody>
    </table>