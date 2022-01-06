<div class="container">
  <div class="row">
    <!-- link -->
    <a href="<?= base_url('tambah/anggota') ?>" class=" m-3 btn btn-sm badge-primary">Tambah anggota</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Nomor Hp</th>
          <th scope="col">Jumlah gang</th>
          <th scope="col">Jumlah langganan</th>
          <th scope="col">Gaji</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <!-- loop data  foreach-->
        <?php $i = 1;
        foreach ($anggota as $row) : ?>
          <tr>
            <td><?= $i++ ?></td>
            <td><?= $row->nama_anggota_keliling; ?></td>
            <td><?= $row->nomor_hp; ?></td>
            <td><?= $row->jumlah_gang; ?></td>
            <td><?= $row->jumlah_langganan; ?></td>
            <td>
              <a href="<?= base_url('anggota/gaji') ?><?= base64_encode($row->id_anggota_keliling) ?> " class="badge badge-primary">Gaji</a>
            </td>
            <td><?= $row->is_anggota_keliling_active; ?></td>
            <td>
              <a href="<?= base_url('edit/anggota/') ?><?= $row->id_anggota_keliling ?> " class="badge badge-primary">Edit angoota</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>