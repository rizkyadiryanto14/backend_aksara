<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/navbar'); ?>
<?php $this->load->view('templates/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Content</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Content</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Content</h3>
                        </div>
                        <form action="<?= base_url('content/create') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jenis_konten">Jenis Konten</label>
                                    <select name="jenis_konten" id="jenis_konten" class="form-control">
                                        <option selected disabled>Pilih Jenis Konten</option>
                                        <option value="pengenalan_aksara">Pengenalan Aksara</option>
                                        <option value="latihan_menulis">Latihan Menulis</option>
                                        <option value="menulis">Menulis</option>
                                        <option value="panduan">Panduan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul Konten</label>
                                    <input type="text" name="judul" id="judul" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="kontent">Materi</label>
                                    <div id="summernote">
                                        <p>Tulis Kontent Disini</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?= base_url('admin/content') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('templates/footer'); ?>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>