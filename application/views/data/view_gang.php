<!-- link add gang -->
<a href="<?= base_url('tambah/gang')?>" class="btn btn-success btn-sm m-3">Tambah gang</a>
<!-- table bootstrap -->
<div class="table-responsive m-3">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Gang</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($gang as $g) {
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