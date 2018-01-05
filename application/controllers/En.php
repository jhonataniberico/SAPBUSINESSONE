<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class En extends CI_Controller {

	function __construct() {
        parent::__construct();
        //$this->load->model('M_preaprobacion');
        $this->load->helper('utils');
        $this->load->helper("url");
    }

	public function index()
	{
		//print_r($_SESSION['industria']);
		$this->load->view('v_en');
	}
}