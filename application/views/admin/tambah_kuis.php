<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/navbar'); ?>
<?php $this->load->view('templates/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kuis</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Kuis</li>
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
                            <h3 class="card-title">Form Tambah Kuis</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_kuis">Nama Kuis</label>
                                <input type="text" name="nama_kuis" id="nama_kuis" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="jenis_pertanyaan">Jenis Pertanyaan</label>
                                <select name="jenis_pertanyaan" id="jenis_pertanyaan" class="form-control">
                                    <option selected disabled>Pilih Jenis Pertanyaan</option>
                                    <option value="essay">Essay</option>
                                    <option value="pilihan_ganda">Pilihan Ganda</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pertanyaan">Pertanyaan</label>
                                <input type="text" name="pertanyaan" id="pertanyaan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="jawaban">Jawaban</label>
                                <input type="text" name="jawaban" id="jawaban" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('templates/footer') ?>