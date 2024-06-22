<?php

class Kuis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->view('admin/kuis');
	}

	public function add_view()
	{
		$this->load->view('admin/tambah_kuis');
	}
}
