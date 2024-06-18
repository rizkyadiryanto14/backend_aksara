<?php

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('url', 'security'));
        $this->load->model('User_model');
    }

    function index()
    {
        $this->load->view('auth/login');
    }
    public function login()
    {
        // Mendapatkan data dari request POST
        $postData = json_decode(file_get_contents('php://input'), true);

        // Jika tidak ada data JSON, coba ambil dari POST biasa (form HTML)
        if ($postData === null) {
            $postData = $this->input->post();
        }

        // Pastikan $postData tidak bernilai null
        if ($postData === null) {
            $response = array('status' => false, 'message' => 'Invalid input format, please send form data or JSON data');
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
            return;
        }

        // Validasi input
        $this->load->library('form_validation');
        $this->form_validation->set_data($postData);
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal
            $response = array('status' => false, 'message' => validation_errors());
            if ($this->input->is_ajax_request() || $this->is_json_request()) {
                // Jika permintaan melalui AJAX atau JSON, kirimkan respons JSON
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response));
            } else {
                // Jika permintaan melalui form HTML, set flashdata dan redirect ke halaman login
                $this->session->set_flashdata('error', validation_errors());
                redirect(base_url('auth/login'));
            }
            return;
        }

        $username = $postData['username'];
        $password = $postData['password'];

        // Proses autentikasi
        $user = $this->User_model->get_user_by_username($username);

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set_userdata('user_id', $user['id_users']);
            $response = array('status' => true, 'message' => 'Login successful', 'user' => $user);

            if ($this->input->is_ajax_request() || $this->is_json_request()) {
                // Jika permintaan melalui AJAX atau JSON, kirimkan respons JSON
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response));
            } else {
                // Jika permintaan melalui form HTML, redirect ke halaman dashboard
                redirect(base_url('admin/dashboard'));
            }
        } else {
            // Jika gagal
            $response = array('status' => false, 'message' => 'Invalid username or password');

            if ($this->input->is_ajax_request() || $this->is_json_request()) {
                // Jika permintaan melalui AJAX atau JSON, kirimkan respons JSON
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($response));
            } else {
                // Jika permintaan melalui form HTML, set flashdata dan redirect ke halaman login
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect(base_url('auth/login'));
            }
        }
    }

    // Helper function to check if request is JSON
    private function is_json_request()
    {
        return isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false;
    }



    function register()
    {
        // Mendapatkan data dari request (biasanya melalui JSON)
        $postData = json_decode(file_get_contents('php://input'), true);

        if ($this->User_model->check_username_exists($postData['username'])) {
            $response = array('status' => false, 'message' => 'Username already exists');
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
            return;
        }

        // Validasi input
        $this->load->library('form_validation');
        $this->form_validation->set_data($postData);
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kirimkan respons error
            $response = array('status' => false, 'message' => validation_errors());
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
            return;
        }

        $data_array = [
            'username'              => $postData['username'],
            'password'              => password_hash($postData['password'], PASSWORD_DEFAULT),
            'nama'                  => $postData['nama'],
            'email'                 => $postData['email'],
            'tanggal_registrasi'    => date('Y-m-d H:i:s')
        ];

        // Proses autentikasi
        $user = $this->User_model->insert_user($data_array);

        if ($user) {
            // Jika berhasil, buat session dan kirimkan respons sukses
            $response = array('status' => true, 'message' => 'Registrasi Successful', 'user' => $user);
        } else {
            // Jika gagal, kirimkan respons error
            $response = array('status' => false, 'message' => 'Invalid username or password');
        }

        // Kirimkan respons dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function logout()
    {
        // Hapus semua data sesi
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();

        // Cek apakah permintaan datang dari AJAX atau JSON
        if ($this->input->is_ajax_request() || $this->is_json_request()) {
            // Jika permintaan melalui AJAX atau JSON, kirimkan respons JSON
            $response = array('status' => true, 'message' => 'Logout successful');
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        } else {
            // Jika permintaan melalui form HTML, redirect ke halaman login
            redirect(base_url('auth'));
        }
    }
}
