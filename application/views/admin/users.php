<?php $this->load->view('templates/header') ?>

<?php $this->load->view('templates/navbar') ?>

<?php $this->load->view('templates/sidebar') ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Users</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Halaman Users</li>
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
							<button class="btn btn-primary" data-toggle="modal" data-target="#modaltambahuser">Tambah User</button>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="users" class="table table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Lengkap</th>
											<th>Username</th>
											<th>Email</th>
											<th>Role</th>
											<th>Waktu Belajar</th>
											<th>Tanggal</th>
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

<!-- modal tambah user -->

<div class="modal fade" id="modaltambahuser">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">Form Tambah User</h3>
			</div>
			<form action="<?= base_url('admin/insert_users') ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="nama_lengkap">Nama Lengkap</label>
						<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="email">E-Mail</label>
						<input type="text" name="email" id="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="role">Role</label>
						<select name="role" id="role" class="form-control" required>
							<option selected disabled>Pilih User Role</option>
							<option value="admin">Admin</option>
							<option value="user	">User</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- end modal tambah user -->



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Masukkan DataTables JS di sini -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function() {
		var dataTable = $('#users').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				url: "<?php echo base_url('admin/get_data_users'); ?>",
				type: "POST"
			},
			"columnDefs": [{
				"targets": [0, 1, 2, 3, 4, 5, 6, 7],
				"orderable": false,
			}],
		});
	});
</script>

<?php $this->load->view('templates/footer') ?>