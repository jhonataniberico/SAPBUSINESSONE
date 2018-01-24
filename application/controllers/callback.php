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
 		print_r($user->positions->values[0]->company->name);
		print_r($user->positions->values[0]->title);
		$data['firstName'] 	  = $user->firstName;
		$data['lastName'] 	  = $user->lastName;
		$data['emailAddress'] = $user->emailAddress;
		$data['company'] 	  = $user->positions->values[0]->company->name;
		$data['title'] 	  = $user->positions->values[0]->title;
		$data['location'] 	  = $user->location->name;
		$session = array('nombre_linke' => $user->firstName.' '.$user->lastName,
		        	 	 'email_linke'  => $user->emailAddress,
				 		 'compania'  => $user->positions->values[0]->company->name,
						 'titulo'    => $user->positions->values[0]->title,
				 		 'pais_linke' 	=> $user->location->name,
				 		 'pantalla'     => 5);
		$this->session->set_userdata($session);
		header("location: es");
    } 
}