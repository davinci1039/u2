<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indexar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		ini_set('max_execution_time', 0); 
		ini_set('memory_limit','2048M');
		$this->load->model('indexar_model');
		$this->load->helper('indexar_helper');
		//$this->load->helper('file');
	}

	public function indexarCF()
	{
		depurarCF('E:/documentos/tecnica/ic/cf');
		indexarCF('E:/documentos/tecnica/ic/cf');

		//$this->load->view('indexar_cf');
	}

	
}

/* End of file indexar.php */
/* Location: ./application/controllers/indexar.php */