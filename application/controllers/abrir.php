<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Abrir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('documento_model','documento');
		$this->load->helper('archivos_helper');
	}

	public function index($cud)
	{
		$cud = $data['cud'] = $this->uri->segment(2);
		$data['archivo'] = $this->documento->get_cud('documentos',$cud);
		$data['nombre'] = strtoupper($data['archivo']->uas)."-"
		.strtoupper($data['archivo']->os)."-"
		.strtoupper($data['archivo']->kks)."-"
		.$data['archivo']->fecha_numero;
		
		//si hizo click en descargar
		if(isset($_POST['descargar']))
		{
			$this->load->view('descargar', $data);
		}
		//si hizo click en ver
		else
		{
			$this->load->view('abrir', $data);
		}

	}

	//public function bp()
	//{
		//	$id = $data['id'] = $this->uri->segment(3);
		//	$data['archivo'] = $this->documento->getBPbyID($id);
		//	$data['file'] = "E:/documentos/planos/mecanica/catalogos/bp/T ".$data['archivo']->PAG;
		//	$data['nombre'] = "(T".$data['archivo']->PAG.")-"$data['archivo']->kks.;
		//	$this->load->view('abrir', $data);
	//}



	//public function rt()
	//{
	//	$id = $data['id'] = $this->uri->segment(3);
	//	$data['archivo'] = $this->documento->getBPbyID($id);
	//	$data['file'] = "E:/documentos/planosEsquemas/mecanica/catalogos/rt/T ".$data['archivo']->PAG;
	//	$data['nombre'] = "(T".$data['archivo']->PAG.")-"$data['archivo']->kks.;
	//	$this->load->view('abrir', $data);
	//}

}

/* End of file abrir.php */
/* Location: ./application/controllers/abrir.php */