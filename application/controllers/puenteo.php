<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puenteo extends CI_Controller {

	public function index()
	{
		parent::__construct();
		$this->load->model('puenteo_model');
		$this->load->helper('puenteo_helper');
	}

	
	public function alta()
	{
		//tomar todos los valores de post y agregarlos a la tabla puenteos
		//refresh a la página que se estaba usando anteriormente (traer link desde hidden)
		$tipo = $this->input->post('tipo');
		$numero = $this->input->post('numero');
		$ano = $this->input->post('ano');
		$mit = $this->input->post('mit');
		
		$this->puenteo_model->alta($tipo,$numero,$ano,$mit,$alta=1);
	}

	
	public function baja()
	{
		//cambiar 1 por 0 en puenteos.alta, desde post u otro
		if($id=null&&!isset($this->input->post('id')))
		{
			$data['titulo']="Error - ID no existente";
			$data['texto']="El número de puenteo no existe.";
			$this->load->view('error', $data, FALSE);
		}
		elseif(isset($this->input->post('id')))
		{
			$id = $this->input->post('id');
			$this->puenteo_model->baja($id);
		}
		else
		{
			$this->puenteo_model->baja($id);
		}	
	}

	
	public function modificar()
	{
		$id=$this->input->post('id');
		$tipo = $this->input->post('tipo');
		$numero = $this->input->post('numero');
		$ano = $this->input->post('ano');
		$mit = $this->input->post('mit');
		$this->puenteo_model->modificar($id,$tipo,$numero,$ano,$mit);
	}


	public function puentear()
 	{
 		//traigo valores de post
 		$id_puenteo=$this->input->post('id_puenteo');
		$cud=$this->input->post('cud');
 		
 		$this->puenteo_model->add_puenteos_documentos($cud,$id_puenteo); //agrego a historico de puenteos
 		$this->puenteo_model->set_puenteo($cud,$id_puenteo); //seteo puenteo 
 	}


 	public function unset_puenteo()
 	{
 		//traigo valores de post
 		$id_puenteo=$this->input->post('id_puenteo');
 		$cud=$this->input->post('cud');

 		//des-seteo puenteo 
 		$this->puenteo_model->unset_puenteo($cud);
 	}

}

/* End of file puenteo.php */
/* Location: ./application/controllers/puenteo.php */