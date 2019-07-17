<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sitio extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('sitio_model','sitio');
		$this->load->model('documento_model');
		
		$this->load->helper('sitio_helper');
		
		$this->load->view('header');
		//$this->load->view('nav');
	}
	
	public function index()
	{
		//funcion para página principal (navbar, menú, etc.)
		
		//datos para nuevo
		$modal['titulo_nuevo'] = 'Agregar nuevo documento';
		$modal['uas'] = $this->sitio_model->combo('sitio_uas',$datos=array('id','descripcion'));
		$modal['emisor'] = $this->sitio_model->combo('sitio_sectores',$datos=array('sector','descripcion'));
		$modal['uo'] = $this->sitio_model->combo('sitio_uo',$datos=array('uo','descripcion'));
		$modal['contenido_nuevo'] = $this->load->view('alta',$modal, TRUE);

		//datos para modificar
		$modal['old']=$this->documento_model->get_cud($tabla='documentos',$cud='U1-COM-DM-000001');
		$modal['titulo_modificar'] = 'Modificar Documento ' . $modal['old']['cud'];
		$modal['uas_modificar'] = $this->sitio_model->combo('sitio_uas',$datos=array('id','descripcion'));
		$modal['emisor_modificar'] = $this->sitio_model->combo('sitio_sectores',$datos=array('sector','descripcion'));
		$modal['uo_modificar'] = $this->sitio_model->combo('sitio_uo',$datos=array('uo','descripcion'));
		$modal['contenido_modificar'] = $this->load->view('modificacion',$modal, TRUE);


		//datos para destacado
		$modal['titulo_destacado'] = 'KKS Destacados';
		$modal['contenido_destacado'] = $this->load->view('destacado',$modal, TRUE);
		

		//datos para referencia
		$modal['titulo_referencia'] = 'Referencia a documento';
		$modal['contenido_referencia'] = $this->load->view('referencia',$modal, TRUE);
		

		//cargo div "main" con todos los parámetros
		$this->load->view('menu');
		$main['main']=$this->load->view('pruebas',$modal,TRUE);
		$this->load->view('main',$main,FALSE);
	}
	
	public function cf($pagina = false)
	{
		//Parámetros
		$data['titulo'] = 'Complejos Funcionales';
		$data['tituloNav'] = 'Complejos Funcionales';
		$data['url'] = 'cf';
		$data['mensaje'] = 'Todos los documentos que no presenten el sello de "Conforme a Obra" serán considerados Documentación "Sólo para Información".';
		
		$this->load->view('header', $data);
		$this->load->view('nav', $data);
		$this->load->view('cf_buscador');
		$this->load->view('sugerencia', $data);
		
		if(isset($_GET['q']))
		{
			$kks = $_GET['q'];
			$inicio = 0;
			$limite = 10;
			if($pagina) {$inicio = ($pagina - 1) * $limite;}
			$config['total_rows'] = count($this->sitio->getCFByKks($kks));
			$baseDatos['complejosFuncionales'] = $this->sitio->getCFByKks($kks,$inicio,$limite);
			if($config['total_rows'] > 0)
			{
				//Paginación
				$this->load->library('pagination');
				$config['base_url'] = base_url().'sitio/cf';
				$config['reuse_query_string'] = TRUE;
								
				$config['per_page'] = $limite;
				$config['uri_segment'] = 3;
				$config['num_links'] = 2;
				
				$config['full_tag_open'] = '<ul class="pagination">';
				$config['full_tag_close'] = '</ul>';
				
				//Ir al principio
				$config['first_link'] = '<<';
				$config['first_tag_open'] = '<li class="waves-effect">';
				$config['first_tag_close'] = '</li>';
				
				$config['last_link'] = '>>';
				$config['last_tag_open'] = '<li class="waves-effect">';
				$config['last_tag_close'] = '</li>';
				
				//link siguiente '>'
				$config['next_link'] = '>';
				$config['next_tag_open'] = '<li class="waves-effect">';
				$config['next_tag_close'] = '</li>';
				
				//link anterior '<'
				$config['prev_link'] = '<';
				$config['prev_tag_open'] = '<li class="waves-effect">';
				$config['prev_tag_close'] = '</li>';
				
				//numeros
				$config['num_tag_open'] = '<li class="waves-effect">';
				$config['num_tag_close'] = '</li>';
		
				//activo
				$config['cur_tag_open'] = '<li class="active">';
				$config['cur_tag_close'] = '</li>';
					
				//Inicializo la paginación
				$this->pagination->initialize($config);
				//Vistas
				$this->load->view('cf_tabla',$baseDatos);
			}
			elseif($config['total_rows'] < 1)
			{
				$data['mensaje'] = 'No se encontraron resultados para "<b>'.$_GET['q'].'</b>"';
				$this->load->view('error',$data);
			}
		}
	}

	public function valvulas_seguridad($pagina = false)
	{
		//Parámetros
		$data['titulo'] = 'Válvulas de Seguridad';
		$data['tituloNav'] = 'Válvulas de Seguridad';
		$data['url'] = 'valvulas_seguridad';
		$this->load->view('header', $data);
        	$this->load->view('nav', $data);
		$this->load->view('valvulas_seguridad_buscador');
		$data['mensaje'] = 'Este listado se corresponde con el subcapítulo 2.7.1 del Manual de Operaciones - Unidad II.';
		$this->load->view('sugerencia', $data);
		
		if(isset($_GET['q']))
		{
			$kks = $_GET['q'];
			$inicio = 0;
			$limite = 10;
			if($pagina) {$inicio = ($pagina - 1) * $limite;}
			$config['total_rows'] = count($this->sitio->get_valvulas_seguridad($kks));
			$baseDatos['affected_rows'] = count($this->sitio->get_valvulas_seguridad($kks));
			$baseDatos['valvulas_seguridad'] = $this->sitio->get_valvulas_seguridad($kks,$inicio,$limite);
		}
		
		else
		{
			$inicio = 0;
			$limite = 10;
			if($pagina) {$inicio = ($pagina - 1) * $limite;}
			$config['total_rows'] = count($this->sitio->get_valvulas_seguridad());
			$baseDatos['valvulas_seguridad'] = $this->sitio->get_valvulas_seguridad($kks=null,$inicio,$limite);
		}
			if($config['total_rows'] > 0)
			{
				//Paginación
				$baseDatos['total_rows'] = count($this->sitio->get_valvulas_seguridad());
				$this->load->library('pagination');
				$config['base_url'] = base_url().'sitio/valvulas_seguridad';
				$config['reuse_query_string'] = TRUE;
								
				$config['per_page'] = $limite;
				$config['uri_segment'] = 3;
				$config['num_links'] = 2;
				
				$config['full_tag_open'] = '<ul class="pagination">';
				$config['full_tag_close'] = '</ul>';
				
				//Ir al principio
				$config['first_link'] = '<<';
				$config['first_tag_open'] = '<li class="waves-effect">';
				$config['first_tag_close'] = '</li>';
				
				$config['last_link'] = '>>';
				$config['last_tag_open'] = '<li class="waves-effect">';
				$config['last_tag_close'] = '</li>';
				
				//link siguiente '>'
				$config['next_link'] = '>';
				$config['next_tag_open'] = '<li class="waves-effect">';
				$config['next_tag_close'] = '</li>';
				
				//link anterior '<'
				$config['prev_link'] = '<';
				$config['prev_tag_open'] = '<li class="waves-effect">';
				$config['prev_tag_close'] = '</li>';
				
				//numeros
				$config['num_tag_open'] = '<li class="waves-effect">';
				$config['num_tag_close'] = '</li>';
		
				//activo
				$config['cur_tag_open'] = '<li class="active">';
				$config['cur_tag_close'] = '</li>';
					
				//Inicializo la paginación
				$this->pagination->initialize($config);
				//Vistas
				$this->load->view('valvulas_seguridad',$baseDatos);
			}
			elseif($config['total_rows'] < 1)
			{
				$data['mensaje'] = 'No se encontraron resultados para "<b>'.$_GET['q'].'</b>"';
				$this->load->view('error',$data);
			}
	}
}
/* End of file documentos.php */
/* Location: ./application/controllers/documentos.php */