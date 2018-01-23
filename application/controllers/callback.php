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
		print_r($user->firstName);
		print_r($user->lastName);
		print_r($user->emailAddress);
		print_r($user->headline);
		print_r($user->location->name);
		$data['firstName'] 	  = $user->firstName;
		$data['lastName'] 	  = $user->lastName;
		$data['emailAddress'] = $user->emailAddress;
		$data['headline'] 	  = $user->headline;
		$data['location'] 	  = $user->location->name;
		$session = array('nombre_linke' => $user->firstName.' '.$user->lastName,
		        	 	 'email_linke'  => $user->emailAddress,
				 		 'universidad'  => $user->headline,
				 		 'pais_linke' 	=> $user->location->name,
				 		 'pantalla'     => 5);
		$this->session->set_userdata($session);
		header("location: es");
    } 
}