<?php

class Users extends CI_Controller
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
		$data = [];
		$this->load->view('admin/users', $data);
	}
}
