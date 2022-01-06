<!-- call css -->
<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets\plugins\datatables-bs4\css\dataTables.bootstrap4.min.css') ?>">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js">


<!-- C:\xampp\htdocs\osean\assets\plugins\datatables-bs4\css\dataTables.bootstrap4.min.css -->
<a href="<?php echo site_url('tambah/pelanggan') ?>" class="btn btn-primary m-3">tambah nomor rumah</a>
<script src="<?php echo base_url('assets\plugins\jquery\jquery.min.js') ?>"></script>

<div class="card-header">
    <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12 col-md-6"></div>
            <div class="col-sm-12 col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="table" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row" style="width: 50%;">
                            <th>No</th>
                            <th>Anggota keliling</th>
                            <th>Gang</th>
                            <th>Pelanggan</th>
                            <th>Nomor rumah</th>
                            <th>Nomor hp</th>
                            <th>Harga</th>
                            <th>Jumlah galon</th>
                            <th>Jumlah Keluarga</th>
                            <th>Status rumah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->

<script src="<?php echo base_url('assets\plugins\datatables\jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets\plugins\datatables-bs4\js\dataTables.bootstrap4.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //datatables
        $('#table').DataTable({
            autofill: true,
            processing: true,
            serverSide: true,
            select: true,
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }],
            select: {
                style: 'os',
                selector: 'td:first-child'
            },
            order: [
                [1, 'asc']
            ],
            ajax: {
                "url": "<?php echo base_url('datatable/get_pelanggan') ?>",
                "type": "POST"
            },


        });

    });
</script>
</div>
</div>