<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Documento extends CI_Controller 
{
 
 	public function __construct()
	{
		parent::__construct();
		$this->load->model('documento_model');
		$this->load->helper('documento_helper');
	}


 	public function alta()
 	{
 		if(!isset($_POST['uo'])||!isset($_POST['uas'])||!isset($_POST['titulo']))
 		{
 			header("Location: ../");
 		}
 		else
 		{
 			//asigno variables desde post
 			$unidad_organica = $this->input->post('uo');
 			$uas = $this->input->post('uas');
 			$emisor = $this->input->post('emisor');
			$os = quitar_espacios(limpiar($this->input->post('os')));
			$fecha_numero = $this->input->post('fecha_numero');
			$revision = $this->input->post('revision');
			$fecha_vigencia = $this->input->post('fecha_vigencia');
			$numero_enace = $this->input->post('numero_enace');
			$numero_proveedor = $this->input->post('numero_proveedor');
			$documento_original = $this->input->post('documento_original');
			$contrato = $this->input->post('contrato');
			$visible = 1;
			$id_puenteo = 0;
	
 			//busco última ocurrencia de CUD
 			$cud1= $unidad_organica."-".$emisor."-".$uas."-"; //U2-IN-DD-
			
 			//si esa combinación no existe, generar el primero.
			if (@count($this->documento_model->get_last($tabla='documentos',$id=null,$cud=$cud1))===0) 
			{
				$cud = $unidad_organica."-".$emisor."-".$uas."-000001"; //U2-IN-DD-000001
			}
			else
			{
				$consulta = $this->documento_model->get_last($tabla='documentos',$id=null,$cud=$cud1);
				@$maximo = ltrim(end(explode("-", $consulta['cud'])),'0'); //U2-IN-DD-000047 => 47
				$cud_nro = $maximo + 1; //47 => 48
				$cud = $cud1.str_pad($cud_nro, 6, '0', STR_PAD_LEFT); //U2-IN-DD-000048
			}

 			$titulo = utf8_encode($this->input->post('titulo'));
 			

 			$kks=limpiar($this->input->post('kks'));
			$kks=quitar_espacios($kks);

 			if(@count(explode(',', strtoupper($kks)) > 1))
 			{
 				$os_kks = $os."_".explode(",",$kks)[0];
 			}
 			else
 			{
 				$os_kks = $os."_".$kks;
 			}
	
 			
 			$oblea = $uas."_".$os_kks."_".$fecha_numero;
	
 			$this->documento_model->add_cud(
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
			);
 		}
 	}


 	public function modificar()
 	{
 		if(!isset($_POST['titulo']))
 		{
 			header("Location: ../");
 		}
 		else
 		{
 			//Asigno Variables
 			$cud=$this->input->post('cud');
			$uas=$this->input->post('uas');
			$os=quitar_espacios(limpiar($this->input->post('os')));
			$kks=$this->input->post('kks');
			$fecha_numero=$this->input->post('fecha_numero');
			$revision=$this->input->post('revision');
			$titulo=utf8_encode($this->input->post('titulo'));
			$fecha_vigencia=$this->input->post('fecha_vigencia');
			$numero_enace=$this->input->post('numero_enace');
			$numero_proveedor=$this->input->post('numero_proveedor');
			$documento_original=$this->input->post('documento_original');
			$contrato=$this->input->post('contrato');
	

			//limpio post->kks
			$kks=limpiar($this->input->post('kks'));
			$kks=quitar_espacios($kks);

			$explode_kks = explode(",", $kks);
			$kks_principal = $explode_kks[0];

			$os_kks = $os."_".$kks_principal;
 			$oblea = $uas."_".$os_kks."_".$fecha_numero;
	
 			$this->documento_model->edit_cud(
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
			);
			//header("Location: ../");
		}
 	}


 	public function revisionar($cud=null)
 	{
 		//guardar registro viejo en historico

 		/*

 		1-traer info vieja
 		2-agregar motivo
 		3-modificar los datos que sean necesarios (formulario modificar)
 		4-adjuntar documento nuevo listo para subir
 		5-guardar (envía post)
 		5.1-guarda el registro superado en tabla documentos_historico
 		5.2-mueve el archivo a f:\documentos\superados?? renombrándolo a CUD-Rev.X.pdf
		5.3-copia archivo nuevo en el UAS correspondiente (sin rev)
		5.4-guarda los datos nuevos en tabla documentos

 		*/
 		$doc['old']=$this->documento_model->get_cud($cud=$cud);
 		$motivo=$this->input->$doc['old']['motivo'];
 		

		//GENERAR REGISTRO EN DOCUMENTOS_HISTORICO 
 		$this->documento_model->add_historico(
			$cud=$doc['old']['cud'],
			$uas=$doc['old']['uas'],
			$os=$doc['old']['os'],
			$kks=$doc['old']['kks'],
			$os_kks=$doc['old']['os_kks'],
			$fecha_numero=$doc['old']['fecha_numero'],
			$revision=$doc['old']['revision'],
			$titulo=utf8_encode($doc['old']['titulo']),
			$emisor=$doc['old']['emisor'],
			$unidad_organica=$doc['old']['unidad_organica'],
			$fecha_vigencia=$doc['old']['fecha_vigencia'],
			$oblea=$doc['old']['oblea'],
			$numero_enace=$doc['old']['numero_enace'],
			$numero_proveedor=$doc['old']['numero_proveedor'],
			$documento_original=$doc['old']['documento_original'],
			$motivo
		);
	
 		//POST PARA REGISTRO VIGENTE
 		
 		//Asigno Variables
 		$cud=$this->input->post('cud');
		$uas=$this->input->post('uas');
		$os=quitar_espacios(limpiar($this->input->post('os')));
		$kks=$this->input->post('kks');
		$fecha_numero=$this->input->post('fecha_numero');
		$revision=$this->input->post('revision');
		$titulo=utf8_encode($this->input->post('titulo'));
		$fecha_vigencia=$this->input->post('fecha_vigencia');
		$numero_enace=$this->input->post('numero_enace');
		$numero_proveedor=$this->input->post('numero_proveedor');
		$documento_original=$this->input->post('documento_original');
		$contrato=$this->input->post('contrato');

		//limpio post->kks
		$kks=limpiar($this->input->post('kks'));
		$kks=quitar_espacios($kks);
		$explode_kks = explode(",", $kks);
		$kks_principal = $explode_kks[0];
		$os_kks = $os."_".$kks_principal;
 		$oblea = $uas."_".$os_kks."_".$fecha_numero;

 		//actualizar registro vigente
 		$this->documento_model->edit_cud(
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
		);
 	}

 	//Funcion "baja": $tipo=0 -> "anular", $tipo=1 -> "superar"
 	//public function baja($cud=null,$tipo=null)
 	//{
 	//	//guardar registro viejo
 	//	$doc['old']=$this->documento_helper->get_cud($cud);
 	//	$motivo=$this->input->$doc['old']['motivo'];
 	//	
 	//	$this->documento_helper->add_historico(
	//	$cud=$doc['old']['cud'],
	//	$uas=$doc['old']['uas'],
	//	$os_kks=$doc['old']['os_kks'],
	//	$os=$doc['old']['os'],
	//	$kks=$doc['old']['kks'],
	//	$fecha_numero=$doc['old']['fecha_numero'],
	//	$revision=$doc['old']['revision'],
	//	$titulo=utf8_encode($doc['old']['titulo']),
	//	$emisor=$doc['old']['emisor'],
	//	$fecha_vigencia=$doc['old']['fecha_vigencia'],
	//	$oblea=$doc['old']['oblea'],
	//	$numero_enace=$doc['old']['numero_enace'],
	//	$numero_proveedor=$doc['old']['numero_proveedor'],
	//	$proveedor=utf8_encode($doc['old']['proveedor']),
	//	$contrato=$doc['old']['contrato'],
	//	$motivo
	//	);
 	//	//cambio estado a superado
 	//	$this->documento_model->edit_cud($cud=$cud,$estado=2)
 	//}



}
 
 /* End of file documentos.php */
 /* Location: ./application/controllers/documentos.php */