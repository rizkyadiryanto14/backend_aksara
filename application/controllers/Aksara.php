<?php

/**
 * @property $Aksara_model
 */

class Aksara extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Aksara_model');
    }

    function index()
    {
        $data = $this->Aksara_model->get_data();
        echo json_decode($data);
    }
}
