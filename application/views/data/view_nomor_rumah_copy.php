<!-- call css -->

<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets\plugins\datatables-bs4\css\dataTables.bootstrap4.min.css') ?>">
<!-- C:\xampp\htdocs\osean\assets\plugins\datatables-bs4\css\dataTables.bootstrap4.min.css -->
<a href="<?php echo site_url('tambah/nomor_rumah') ?>" class="btn btn-primary m-3">tambah nomor rumah</a>
<script src="<?php echo base_url('assets\plugins\jquery\jquery.min.js') ?>"></script>
<div class="container">
    <div class="row">
        <table id="table" class="table m-3" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor_rumah</th>
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
                    "url": "<?php echo base_url('datatable/get_nomor_rumah') ?>",
                    "type": "POST"
                },

            });

        });
    </script>
</div>
</div>