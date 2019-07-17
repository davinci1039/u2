<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documento_model extends CI_Model {
	
	/*

	GETTERS

	*/

	public function get_id($tabla=null,$id=null)
	{
		//buscar ID en cualquier tabla
		//devolver 1 sola fila completa
		
		$this->db->where('id', $id);
		return $consulta = $this->db->get($tabla, 1)->row_array();
	}


	public function get_cud($tabla=null,$cud=null)
	{
		//buscar CUD en cualquier tabla
		//devolver 1 sola fila completa
		
		$this->db->where('cud', $cud);
		return $this->db->get($tabla,1)->row_array();
	}


	public function get_last($tabla=null,$id=null,$cud=null)
	{
		if($id!=null)
		{
			$this->db->like('id',$id,'after');
			$this->db->order_by('id', 'desc');
		}
		elseif($cud!=null)
		{
			$this->db->like('cud',$cud,'after');
			$this->db->order_by('cud', 'desc');
		}

		$this->db->limit(1);
		return $this->db->get($tabla,1)->row_array();
	}

	public function get_kks($cud)
	{
		$this->db->like('id',$id,'after');
		$this->db->order_by('id', 'asc');
		return $this->db->get($tabla,1)->row_array();
	}


	/*

	ABM DOCUMENTOS

	*/

	public function add_cud(
		$cud,
		$uas,
		$os,
		$kks,
		$os_kks,
		$fecha_numero,
		$revision,
		$titulo,
		$emisor,
		$unidad_organica,
		$fecha_vigencia,
		$oblea,
		$numero_enace,
		$numero_proveedor,
		$documento_original,
		$contrato,
		$visible,
		$id_puenteo
	)
	{
		$data = array(
			'cud'=>$cud,
			'uas'=>$uas,
			'os'=>$os,
			'kks'=>$kks,
			'os_kks'=>$os_kks,
			'fecha_numero'=>$fecha_numero,
			'revision'=>$revision,
			'titulo'=>$titulo,
			'emisor'=>$emisor,
			'unidad_organica'=>$unidad_organica,
			'fecha_vigencia'=>$fecha_vigencia,
			'oblea'=>$oblea,
			'numero_enace'=>$numero_enace,
			'numero_proveedor'=>$numero_proveedor,
			'documento_original'=>$documento_original,
			'contrato'=>$contrato,
			'visible'=>$visible,
			'id_puenteo'=>$id_puenteo
		);
	
			$this->db->insert('documentos', $data);
			return TRUE;
	}


	public function edit_cud(
		$cud,
		$os,
		$kks,
		$os_kks,
		$fecha_numero,
		$revision,
		$titulo,
		$fecha_vigencia,
		$oblea,
		$numero_enace,
		$numero_proveedor,
		$documento_original,
		$contrato

	)
	{
		$data = array(
			'os'=>$os,
			'kks'=>$kks,
			'os_kks'=>$os_kks,
			'fecha_numero'=>$fecha_numero,
			'revision'=>$revision,
			'titulo'=>$titulo,
			'fecha_vigencia'=>$fecha_vigencia,
			'oblea'=>$oblea,
			'numero_enace'=>$numero_enace,
			'numero_proveedor'=>$numero_proveedor,
			'documento_original'=>$documento_original,
			'contrato'=>$contrato
		);
		
		$this->db->where('cud', $cud);
		$this->db->update('documentos', $data);
		return TRUE;
	}


	public function add_historico(
		$cud,
		$uas,
		$os,
		$kks,
		$os_kks,
		$fecha_numero,
		$revision,
		$titulo,
		$emisor,
		$unidad_organica,
		$fecha_vigencia,
		$oblea,
		$numero_enace,
		$numero_proveedor,
		$documento_original,
		$contrato,
		$motivo,
		$fecha
	)
	{
		$data = array(
			'cud'=>$cud,
			'uas'=>$uas,
			'os'=>$os,
			'kks'=>$kks,
			'os_kks'=>$os_kks,
			'fecha_numero'=>$fecha_numero,
			'revision'=>$revision,
			'titulo'=>$titulo,
			'emisor'=>$emisor,
			'unidad_organica'=>$unidad_organica,
			'fecha_vigencia'=>$fecha_vigencia,
			'oblea'=>$oblea,
			'numero_enace'=>$numero_enace,
			'numero_proveedor'=>$numero_proveedor,
			'documento_original'=>$documento_original,
			'contrato'=>$contrato,
			'motivo'=>$motivo,
			'fecha'=>$fecha
		);

		$this->db->insert('documentos_superados', $data);
		return TRUE;
	}


	/*

	FUNCIONES KKS_DOCUMENTO

	*/

	//Función genérica para modificar 1 sólo campo
	public function edit_campo($tabla=null,$id=null,$campo=null,$valor=null)
	{
		$data=array('$campo'=>$valor);
		$this->db->where('id', $id);
		$this->db->update('$tabla', $data);
		return TRUE;
	}

}
/* End of file documentos_model.php */
/* Location: ./application/models/documento_model.php */