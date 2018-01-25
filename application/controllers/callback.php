<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class callback extends CI_Controller {
    
    function __construct() {
        parent::__construct();
	$this->load->library('session');
    }

    public function index()
    {    
    	require_once "init.php";
		$user = getCallback();
		$_SESSION['user'] = $user;
		//print_r($user);
		//if(isset($response->records))
 		//print_r(isset($user->positions->values) == true ? $user->positions->values[0]->company->name : '');
		//print_r($user->positions->values[0]->title);
		$data['firstName'] 	  = $user->firstName;
		$data['lastName'] 	  = $user->lastName;
		$data['emailAddress'] = $user->emailAddress;
		$data['company'] 	  = isset($user->positions->values) == true ? $user->positions->values[0]->company->name : null;
		$data['title'] 	  = isset($user->positions->values) == true ? $user->positions->values[0]->title : null;
		$data['location'] 	  = $user->location->name;
		$session = array('nombre_linke' => $user->firstName.' '.$user->lastName,
		        	 	 'email_linke'  => $user->emailAddress,
				 		 'compania'  => isset($user->positions->values) == true ? $user->positions->values[0]->company->name : null,
						 'titulo'    => isset($user->positions->values) == true ? $user->positions->values[0]->title : null,
				 		 'pais_linke' 	=> $user->location->name,
				 		 'pantalla'     => 5);
		$this->session->set_userdata($session);
		header("location: es");
    } 
}