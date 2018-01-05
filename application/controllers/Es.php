<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Es extends CI_Controller {

	function __construct() {
        parent::__construct();
        //$this->load->model('M_preaprobacion');
        $this->load->helper('utils');
        $this->load->helper("url");
    }

	public function index()
	{
		$data['industria'] = $_SESSION['industria'];
		$this->load->view('v_es');
	}

	function guardarDatos() {
		$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try 
          {
          	$datos = $_POST['datos'];
          	$session = array('industria' => $datos);
            $this->session->set_userdata($session);
            $data['error'] = EXIT_SUCCESS;
			print_r($proj_name);
          }catch(Exception $e) {
           $response = array('status' => 2);
        }
        echo json_encode($response);
	}
}