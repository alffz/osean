<!-- call css -->
<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets\plugins\datatables-bs4\css\dataTables.bootstrap4.min.css') ?>">

<!-- C:\xampp\htdocs\osean\assets\plugins\datatables-bs4\css\dataTables.bootstrap4.min.css -->
<a href="<?php echo site_url('tambah/anggota') ?>" class="btn btn-primary m-3">tambah anggota</a>
<a href="<?php echo site_url('transaksi/trip') ?>" class="btn btn-primary m-3">trip</a>
<a href="<?php echo site_url('transaksi/keranjang_trip') ?>" class="btn btn-success m-3">Keranjang transaksi</a>

<script src="<?php echo base_url('assets\plugins\jquery\jquery.min.js') ?>"></script>
<div class="container">
  <div class="row">
    <table id="table" class="table table-sm table-responsive  m-3 font-weight-normal" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Anggota keliling</th>
          <th>Gang</th>
          <th>Pelanggan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>

  <script src="<?php echo base_url('assets\plugins\datatables\jquery.dataTables.js') ?>"></script>
  <script src="<?php echo base_url('assets\plugins\datatables-bs4\js\dataTables.bootstrap4.min.js') ?>"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      //datatables
      $('#table').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo base_url('datatable/get_pelangga_for_transaki') ?>",
          "type": "POST"
        },

      });
    });

    // function sendId() {
    //   // ajax
    //   $.ajax({
    //     url: "<?php echo base_url('transaksi/penjualan') ?>",
    //     type: "POST",
    //     data: {
    //       id: $(this).val()
    //     },
    //     success: function(data) {
    //       $('#result').html(data);
    //     }
    //   });
    //   alert('hello');
    // }
  </script>
</div>
</div>