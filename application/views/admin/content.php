<?php $this->load->view('templates/header'); ?>

<?php $this->load->view('templates/navbar'); ?>

<?php $this->load->view('templates/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Content</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Content</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('admin/addcontent_view') ?>" class="btn btn-primary"> <i class="fas fa-plus"></i> Tambah Content</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="contentTable" class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Jenis</th>
                                            <th>Isi</th>
                                            <th>Created By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Masukkan DataTables JS di sini -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#contentTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('content/get_content_data') ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": "id_content"
                },
                {
                    "data": "judul"
                },
                {
                    "data": "jenis_konten"
                },
                {
                    "data": "isi"
                },
                {
                    "data": "created_by"
                },
                {
                    "data": null,
                    "defaultContent": "<button class='btn btn-warning btn-edit'>Edit</button> <button class='btn btn-danger btn-delete'>Delete</button>"
                }
            ]
        });
        $('#formTambahContent').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?= base_url('content/create') ?>',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#tambahcontent').modal('hide');
                    $('#contentTable').DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

<?php $this->load->view('templates/footer'); ?>