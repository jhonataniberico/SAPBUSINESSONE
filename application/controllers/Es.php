<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Es extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_solicitud');
        $this->load->helper('utils');
        $this->load->helper("url");
        $this->cont  = 1;
    }

	public function index()
	{
		/*$cont = 1;
		if($cont == 1) {
			$session = array('industria' => '');
        	$this->session->set_userdata($session);
        	$cont++;
		}*/
		/*if($this->cont  == 1) {
			$session = array('industria'  => '',
							 'id_sol' => null);
            $this->session->set_userdata($session);
		}else {
			print_r('entra en 2');
			$datosSol = $this->M_solicitud->getDatosSolicitud($_SESSION['id_sol']);
			$data['industria'] =  $_SESSION['industria'];
		}*/
		$this->load->view('v_es');
	}

	function saveDatos() {
		$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try 
          {
          	$datos = $_POST['global_datos'];
          	$pantalla = $_POST['pantalla'];
          	$columna = null;
          	if($pantalla == 2) {$columna = 'Tamanio';} elseif ($pantalla == 3) {$columna = 'Prioridad';}elseif ($pantalla == 4) {$columna = 'Infraestructura';}
          	if($pantalla == 1) {
          		$arrayInsert = array('Industria' => $datos,
          						     'Id_pais' => 1);
            	$datoInsert = $this->M_solicitud->insertarDatos($arrayInsert, 'solicitud');
            	$session = array('industria' => $datos,
        					 	 'id_sol'    => $datoInsert['Id']);
            	$this->session->set_userdata($session);
          	}else {
          		$arrayUpdate = array($columna => $datos);
          		$this->M_solicitud->updateDatos($arrayUpdate, $_SESSION['id_sol'], 'solicitud');
          		$session = array($columna  => $datos);
            	$this->session->set_userdata($session);
          	}
          	$this->cont++;
          	print_r('contador: '.$this->cont);
          	//print_r($this->session->all_userdata());
            $data['error'] = EXIT_SUCCESS;
          }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($response);
	}

	function mostrarDatos() {
        $data['error'] = EXIT_SUCCESS;
        $data['msj']   = null;
        try {
            $data['industria'] =  $_SESSION['industria'];
			$data['Tamanio'] =  '';
			$data['Prioridad'] = $_SESSION['Prioridad'];
			$data['Infraestructura'] = $_SESSION['Infraestructura'];
        } catch (Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}
}