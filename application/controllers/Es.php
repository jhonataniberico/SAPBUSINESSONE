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
		$data['industria'] = $_SESSION['industria'];
		$this->load->view('v_es', $data);
	}

	function saveDatos() {
		$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try 
          {
          	$datos = $_POST['global_datos'];
          	$arrayInsert = array('Industria' => $datos,
          						 'Id_pais' => 1);
            //$datoInsert = $this->M_solicitud->insertarDatos($arrayInsert, 'solicitud');
            $session = array('industria' => $datos,
        					 'id_sol'    => $datoInsert['Id']);
            $this->session->set_userdata($session);
            $data['error'] = EXIT_SUCCESS;
          }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($response);
	}

	function getModelo() {
		$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try 
          {
          	$data['error'] = EXIT_SUCCESS;
          }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($response);
	}
}