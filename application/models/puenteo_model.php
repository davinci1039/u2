<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puenteo_model extends CI_Model {

	public function alta($tipo=null,$numero=null,$ano=null,$mit=null,$alta=null)
	{
		//generar un nuevo registro en tabla puenteo

		$data = array (
        'tipo' => $tipo,
        'numero' => $numero,
        'ano' => $ano,
        'mit' => $mit,
        'alta' => 1
		);

		$this->db->insert('puenteos', $data);
	}

	
	public function baja($id)
	{
		//update 1 a 0 en puenteos.alta
		$this->db->set('alta', 0);
		$this->db->where('id', $id);
		$this->db->update('puenteos'); 
	}

	
	public function modificar($id,$tipo=null,$numero=null,$ano=null,$mit=null)
	{
		//update con los datos de post en tabla puenteos
		$this->db->set('tipo', $tipo);
		$this->db->set('numero', $numero);
		$this->db->set('ano', $ano);
		$this->db->set('mit', $mit);
		$this->db->where('id', $id);
		$this->db->update('puenteos'); 
	}

	
	public function add_puenteos_documentos($cud=null,$id_puenteo=null)
	{
		//creo un registro en puenteos_documentos
		$data=array(
			'cud' => $cud,
			'id_puenteo' => $id_puenteo,
			'vigente' => 1
		);
		$this->db->insert('puenteos_documentos', $data);
	}


	public function set_puenteo($cud=null,$id_puenteo=null)
	{	
		//actualizo id_puenteo en documentos
		$data=('id_puenteo'=>$id_puenteo);
		$this->db->where('cud', $cud);
		$this->db->update('documentos', $data);
	}


	public function unset_puenteo($cud=null)
	{
		//actualizo id_puenteo en documentos
		$data=('id_puenteo'=>0);
		$this->db->where('cud', $cud);
		$this->db->update('documentos', $data);
	}


}

/* End of file puenteo_model.php */
/* Location: ./application/models/puenteo_model.php */