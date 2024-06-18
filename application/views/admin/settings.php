<?php $this->load->view('templates/header') ?>
<?php $this->load->view('templates/navbar') ?>
<?php $this->load->view('templates/sidebar') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Halaman Settings</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <!-- sekarang masuk ke kolom isi konten -->
            <div class="card mb-4">
                <div class="card-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="umum-tab" data-toggle="tab" href="#umum" role="tab" aria-controls="umum" aria-selected="true">Sejarah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="logo-tab" data-toggle="tab" href="#logo" role="tab" aria-controls="logo" aria-selected="false">Logo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="icon-tab" data-toggle="tab" href="#icon" role="tab" aria-controls="icon" aria-selected="false">Informasi Aplikasi</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <!-- menu pertama -->
                        <div class="tab-pane fade show active" id="umum" role="tabpanel" aria-labelledby="umum-tab">
                            <form action="<?php echo site_url('admin/konfig') ?>" method="post">
                                <input type="hidden" name="id_konfigurasi">
                                <div class="row mb-3">
                                    <div class="col-md-6 order-md-1">
                                        <h3>Daftar Sejarah</h3>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Sejarah</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6 order-md-1">
                                        <h3>Informasi</h3>
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" name="namaweb" placeholder="Judul" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Kontent Sejarah</label>
                                            <textarea name="tentang" rows="3" class="form-control" placeholder="Kontent Sejarah"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <input type="reset" name="reset" value="Reset" class="btn btn-secondary mr-2">
                                    <input type="submit" name="submit" value="Simpan Konfigurasi" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        <!-- menu kedua -->
                        <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                            <h3 class="col-md-12 order-md-1">Logo Website</h3>
                            <form action="<?php echo site_url('admin/konfig/logo') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_konfigurasi">
                                <div class=" form-group col-md-12">
                                    <label>Upload Logo Baru</label>
                                    <input type="file" name="logo" class="form-control" id="file1">
                                    <div id="imagePreview"></div>
                                </div>
                                <div class="form-group col-md-12 mb-4">
                                    <label>Logo Situs Sekarang</label><br>
                                    <img src="" style="max-width:200px; height:auto;">
                                </div>

                                <div class="form-group col-md-12">
                                    <input type="reset" name="reset" value="Reset" class="btn btn-secondary mr-2">
                                    <input type="submit" name="submit" value="Simpan Logo" class="btn btn-primary ">
                                </div>
                            </form>
                        </div>
                        <!-- menu ketiga -->
                        <div class="tab-pane fade" id="icon" role="tabpanel" aria-labelledby="icon-tab">
                            <h3 class="col-md-12 order-md-1">Favicon</h3>
                            <form action="<?php echo site_url('admin/konfig/icon') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_konfigurasi">
                                <div class="form-group col-md-12">
                                    <label>Upload Favicon Baru</label>
                                    <input type="file" name="icon" class="form-control" id="file2">
                                    <div id="imagePreview"></div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label>Favicon Situs Sekarang</label><br>
                                    <img src="" style="max-width:200px; height:auto;">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="reset" name="reset" value="Reset" class="btn btn-secondary mr-2">
                                    <input type="submit" name="submit" value="Simpan Favicon" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- akhir div card body -->
            </div> <!-- akhir div card -->
        </div>
    </section>
</div>


<?php $this->load->view('templates/footer') ?>