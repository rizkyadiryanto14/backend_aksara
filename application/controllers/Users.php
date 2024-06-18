<?php

/**
 * @property $User_model
 */

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	/**
	 * @return void
	 */
	public function index(): void
	{
		$data = [
			'users'		=> $this->User_model->get_all_user()
		];
		$this->load->view('admin/users', $data);
	}

	public function get_data_users(): void
	{
		$fetch_data = $this->User_model->make_datatables();
		if (is_array($fetch_data)) {
			$data = array();
			$no = 1;
			foreach ($fetch_data as $row) {
				$sub_array = array();
				$sub_array[] = $no++;
				$sub_array[] = $row->nama;
				$sub_array[] = $row->username;
				$sub_array[] = $row->email;
				$sub_array[] = $row->role;
				$sub_array[] = $row->waktu_belajar . ' Hari';
				$sub_array[] = $row->tanggal_registrasi;
				$sub_array[] = '<a href="' . site_url('belanja/update_view/' . $row->id_users) . '" class="btn btn-info btn-xs update"><i class="fa fa-edit"></i></a>
                     <a href="' . site_url('admin/delete_users/' . $row->id_users) . '" onclick="return confirm(\'Apakah anda yakin?\')" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></a>';
				$data[] = $sub_array;
			}
			$output = array(
				"draw" => isset($_POST["draw"]) ? intval($_POST["draw"]) : 0, // Periksa apakah 'draw' ada
				"recordsTotal" => $this->User_model->get_all_data(),
				"recordsFiltered" => $this->User_model->get_filtered_data(),
				"data" => $data
			);
			echo json_encode($output);
		} else {
			echo "Error: Fetch data is not an array.";
		}
	}

	function insert()
	{
		$data = [
			'username'			=> $this->input->post('username'),
			'nama'				=> $this->input->post('nama_lengkap'),
			'email'				=> $this->input->post('email'),
			'role'				=> $this->input->post('role'),
			'password'			=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'tanggal_registrasi' => date('Y-m-d')
		];


		$insert = $this->User_model->insert_user($data);

		if ($insert) {
			$this->session->set_flashdata('sukses', 'Data User Berhasil Di Tambahkan');
		} else {
			$this->session->set_flashdata('gagal', 'Data User Gagal Di Tambahkan');
		}

		redirect(base_url('admin/users'));
	}

	function update($id_users)
	{
	}

	function delete($id_users)
	{
		$delete_users = $this->User_model->delete_users($id_users);

		if ($delete_users) {
			$this->session->set_flashdata('sukses', 'Data Users Berhasil Dihapus');
		} else {
			$this->session->set_flashdata('gagal', 'Data Users Gagal Dihapus');
		}

		redirect(base_url('admin/users'));
	}
}
