<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitio_model extends CI_Model {


	//obtener menu
	public function getMenu($id)
	{
		$this->db->select('id','titulo','enlace','intra');
		$this->db->where('IDparent',$id);
		$this->db->order_by('pos', 'asc');
		$consulta = $this->db->get('sitio_menu');
		return $consulta->result_array();
	}


	public function combo($tabla=null,$datos=null)
	{
		$this->db->select($datos);
		$this->db->order_by($datos[0], 'asc');
		$this->db->group_by($datos[0]);
		$consulta = $this->db->get($tabla);
		return $consulta->result_array();
	}


	//obtener todos los CF paginados
	//UNIR getCF CON getCFByKks con un IF
	public function getCF($inicio = false, $limite = false)
	{
		if ($inicio !== FALSE && $limite !== FALSE){
			$this->db->limit($limite,$inicio);
		}
		$this->db->order_by('kks','asc');
		$consulta = $this->db->get("complejos_funcionales");
		return $consulta->result();
	}


	//obtener planos CF por KKS
	public function getCFByKks($kks = null, $inicio = false, $limite = false)
	{
		if ($inicio !== FALSE && $limite !== FALSE){
			$this->db->limit($limite,$inicio);
		}

		$this->db->order_by('kks','asc');
		$this->db->like('kks', $kks);
		$consulta = $this->db->get("complejos_funcionales");
		return $consulta->result();
	}


	//obtener válvulas de seguridad de SisTM paginadas
	public function get_valvulas_seguridad($kks = null, $inicio = false, $limite = false)
	{
		$sistm = $this->load->database('sistm', TRUE);

		if ($inicio !== FALSE && $limite !== FALSE)
		{
			$sistm->limit($limite,$inicio);
		}
		
		$sistm->select('kks, presion_disparo, raumarm');
		$sistm->order_by('kks','asc');
		$sistm->like('de_seguridad', 1);
		if($kks!==null)
		{
			$sistm->like('kks', $kks);
		}
		
		$consulta = $sistm->get("arfxta_t_edat_t");
		
		return $consulta->result();
	}


	//obtener tabla completa
	public function get_tabla($tabla,$columnas,$where,$like)
	{
		($columnas) ?? $this->db->select($columnas);
		($where) ?? $this->db->like($where,$like);

		//if($columnas!=null) 
		//{
		//	$this->db->select($columnas);
		//}
		//if($where!=null)
		//{
		//	$this->db->like($where,$like);
		//}

		$this->db->order_by($columnas, 'asc');		
		$consulta = $this->db->get($tabla);
		return $consulta->result_array();
	}


}

/* End of file sitio_model.php */
/* Location: ./application/models/sitio_model.php */