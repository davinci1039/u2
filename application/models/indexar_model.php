<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indexar_model extends CI_Model {

	public function contarResultados($ruta_completa=null)
	{
		$this->db->like('link', $ruta_completa);
		$this->db->from('complejos_funcionales');
		$count = $this->db->count_all_results();
		return $count;
	}

	public function indexarCF($cf=null,$uas=null,$kks=null,$numero=null,$link=null,$puenteo=0)
	{
		$data = $arrayName = array(
								'cf' => $cf,
								'uas' => $uas,
								'kks' => $kks,
								'numero' => $numero,
								'link' => $link,
								'puenteo' => $puenteo);

		$this->db->insert('complejos_funcionales', $data);
	}

	public function getTabla($tabla=null)
	{
		$consulta = $this->db->get($tabla);
		return $consulta->result();
	}

	public function actualizarFila($tabla, $id, $datos)
	{
		$this->db->where('id', $id);
		$this->db->update($tabla, $datos);
	}

}

/* End of file indexar_model.php */
/* Location: ./application/models/indexar_model.php */