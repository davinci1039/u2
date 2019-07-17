<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pruebas extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('pruebas');
		//$this->load->helper('pruebas');
	}

	public function index()
	{
		$data['titulo'] = 'pruebas';
		$this->load->view('header', $data);
	}


}

/* End of file pruebas.php */
/* Location: ./application/controllers/pruebas.php */