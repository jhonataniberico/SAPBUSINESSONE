<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Es extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_solicitud');
        $this->load->helper('utils');
        $this->load->helper("url");
    }

	public function index()
	{
		$this->load->view('v_es');
	}

	function saveDatos() {
		$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try 
          {
          	$datos 	     = $this->input->post('global_datos');
          	$pantalla    = $this->input->post('pantalla');
          	$idioma      = $this->input->post('idioma');
          	$datos_array = $this->input->post('datos_array');
          	$operar      = $this->input->post('operar');
          	$columna  	 = null;
          	//$arr_dat = implode(",", $datos_array);
          	print_r($pantalla);
          	if($pantalla == 2) {$columna = 'Factura_anual';} elseif ($pantalla == 3) {$columna = 'Prioridad';}elseif ($pantalla == 4) {$columna = 'Infraestructura';}
          	if($pantalla == 1) {
          		$idIdioma = $this->M_solicitud->getDatosPais($idioma);
          		$arrayInsert = array('Industria' => $datos,
          						     'Id_pais' => $idIdioma);
            	$datoInsert = $this->M_solicitud->insertarDatos($arrayInsert, 'solicitud');
            	$session = array('industria' => $datos,
        					 	 'id_sol'    => $datoInsert['Id']);
            	$this->session->set_userdata($session);
          	}else {
          		if($pantalla == 2) {
          			$arrayUpdate = array($columna => $datos,
          								 'Tamanio' => $operar);
          			$session = array($columna  => $datos,
          							 'Tamanio' => $operar);
          		}else {
          			$arrayUpdate = array($columna => $datos);
          			$session     = array($columna => $datos);
          		}
          		$this->M_solicitud->updateDatos($arrayUpdate, $_SESSION['id_sol'], 'solicitud');
            	$this->session->set_userdata($session);
            	//print_r($this->session->all_userdata());
          	}
          	$data['carita'] = 'hola';
            $data['error'] = EXIT_SUCCESS;
          }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}

	function mostrarDatos() {
        $data['error'] = EXIT_SUCCESS;
        $data['msj']   = null;
        try {
            $data['industria'] 		 =  'bbb'/*$_SESSION['industria']*/;
			$data['Tamanio']   		 =  'aaa';
			$data['Prioridad']       = 'ccc'/*$_SESSION['Prioridad']*/;
			$data['Infraestructura'] = 'ddd'/*$_SESSION['Infraestructura']*/;
        } catch (Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}
}