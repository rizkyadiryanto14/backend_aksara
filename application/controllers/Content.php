<?php

/**
 * @property $input
 * @property $Content_model
 * @property $session
 * @property $output
 * @property $form_validation
 */

class Content extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');
    }

	/**
	 * @return void
	 */

    function index(): void
	{
        $this->load->view('admin/content');
    }

	/**
	 * @return void
	 */

	function addview_content(): void
	{
        $this->load->view('admin/add_content');
    }

	/**
	 * @return void
	 */

	public function get_content_data(): void
	{
        $columns = array(
            0 => 'id_content',
            1 => 'judul',
            2 => 'jenis_konten',
            3 => 'isi',
            4 => 'created_by'
        );

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->Content_model->all_content_count();
        $totalFiltered = $totalData;

        if (empty($this->input->post('search')['value'])) {
            $content = $this->Content_model->all_content($limit, $start, $order, $dir);
        } else {
            $search = $this->input->post('search')['value'];
            $content = $this->Content_model->content_search($limit, $start, $search, $order, $dir);
            $totalFiltered = $this->Content_model->content_search_count($search);
        }

        $data = array();
        if (!empty($content)) {
            foreach ($content as $row) {
                $nestedData['id_content'] = $row->id_content;
                $nestedData['judul'] = $row->judul;
                $nestedData['jenis_konten'] = $row->jenis_konten;
                $nestedData['isi'] = $row->isi;
                $nestedData['created_by'] = $row->created_by;
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }

	/**
	 * @return void
	 */

    function insert(): void
	{
        $input = $this->input;
        $data = [
            'judul'         => $input->post('judul'),
            'jenis_kontent' => $input->post('jenis_kotent'),
            'isi'           => $input->post('isi'),
            'created_at'    => $this->session->userdata('username'),
            'updated_by'    => $this->session->userdata('username'),
        ];
    }

	/**
	 * @return void
	 */

    public function create(): void
	{
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('jenis_konten', 'Jenis Konten', 'required');
        $this->form_validation->set_rules('kontent', 'Kontent', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' => validation_errors());
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
            return;
        }

        $data = array(
            'judul' => $this->input->post('judul'),
            'jenis_konten' => $this->input->post('jenis_konten'),
            'kontent' => $this->input->post('kontent'),
            'created_by' => $this->session->userdata('username'),
            'updated_by' => $this->session->userdata('username')
        );

        $result = $this->Content_model->create_content($data);

        if ($result) {
            $this->session->set_flashdata('sukses', 'Data Content Berhasil Ditambahkan');
            $response = array('status' => true, 'message' => 'Content created successfully');
        } else {
            $this->session->set_flashdata('gagal', 'Data Content Gagal Ditambahkan');
            $response = array('status' => false, 'message' => 'Failed to create content');
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

	/**
	 * @return void
	 */

    public function upload_image(): void
	{
        if (isset($_FILES['upload']['name'])) {
            $file = $_FILES['upload']['tmp_name'];
            $fileName = $_FILES['upload']['name'];
            $fileType = $_FILES['upload']['type'];

            $filePath = './uploads/' . $fileName;

            if (move_uploaded_file($file, $filePath)) {
                $url = base_url('uploads/' . $fileName);
                $response = array(
                    'uploaded' => true,
                    'url' => $url
                );
            } else {
                $response = array(
                    'uploaded' => false,
                    'error' => array('message' => 'The file could not be uploaded.')
                );
            }
            echo json_encode($response);
        } else {
            $response = array(
                'uploaded' => false,
                'error' => array('message' => 'No file was uploaded.')
            );
            echo json_encode($response);
        }
    }
}
