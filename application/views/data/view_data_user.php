<!-- table bootstra -->
<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nomor Hp</th>
        <th>Email</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($user as $u) {
      ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $u->nama_user ?></td>
          <td><?php echo $u->nomor_hp ?></td>
          <td><?php echo $u->email ?></td>
          <td><?php if ($u->is_user_active >= 1) {
                echo 'Aktif';
              } else {
                echo 'Non Aktif';
              } ?></td>
          <td>
            <a href="<?php echo base_url('admin/edit_user/' . $u->id_user) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>