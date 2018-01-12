<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Es extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_solicitud');
        $this->load->helper('utils');
        $this->load->helper("url");
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

	public function index() {
    $this->session->unset_userdata('Industria');
    $this->session->unset_userdata('Infraestructura');
    $this->session->unset_userdata('Factura_anual');
    $this->session->unset_userdata('Tamanio');
    $this->session->unset_userdata('Prioridad');
		$this->load->view('v_es');
	}

	function saveDatos() {
		    $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
          	$datos 	     = $this->input->post('global_datos');
          	$pantalla    = $this->input->post('pantalla');
          	$idioma      = $this->input->post('idioma');
          	$datos_prio  = $this->input->post('datos_prio');
          	$operar      = $this->input->post('operar');
          	$facturacion = $this->input->post('facturacion');
          	$columna  	 = null;
          	if($pantalla == 2) {$columna = 'Factura_anual';} elseif ($pantalla == 3) {$columna = 'Prioridad';}elseif ($pantalla == 4) {$columna = 'Infraestructura';}
          	if($pantalla == 1) {
          		$idIdioma = $this->M_solicitud->getDatosPais($idioma);
          		$arrayInsert = array('Industria'   => $datos,
          						             'Id_lenguaje' => $idIdioma);
            	$datoInsert = $this->M_solicitud->insertarDatos($arrayInsert, 'solicitud');
            	$session = array('industria' => $datos,
        					 	           'id_sol'    => $datoInsert['Id']);
            	$this->session->set_userdata($session);
          	}else {
          		if($pantalla == 2) {
          			$arrayUpdate = array($columna  => $facturacion,
          								           'Tamanio' => $operar);
          			$session = array($columna  => $facturacion,
          							         'Tamanio' => $operar);
          		}else {
          			if($pantalla == 3) {
          				$arrayUpdate = array($columna => $datos_prio);
          				$session     = array($columna => $datos_prio);
          			}else {
          				$arrayUpdate = array($columna => $datos);
          				$session     = array($columna => $datos);
          			}
          		}
          		$this->M_solicitud->updateDatos($arrayUpdate, $_SESSION['id_sol'], 'solicitud', 'Id');
            	$this->session->set_userdata($session);
          	}
            $data['error'] = EXIT_SUCCESS;
          }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}

	function mostrarDatos() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
          $tamanio = $this->session->userdata('Tamanio') == null ? '-' : $this->session->userdata('Tamanio').' empleados';
          $data['Industria']       = $this->session->userdata('industria') == null ? '-' : $this->session->userdata('industria');
          $data['Factura_anual']   = $this->session->userdata('Factura_anual') == null ? '-' : $this->session->userdata('Factura_anual');
  	      $data['Tamanio']   		   = $tamanio;
  	      $data['Prioridad']       = $this->session->userdata('Prioridad') == null ? '-' : $this->session->userdata('Prioridad');
  	      $data['Infraestructura'] = $this->session->userdata('Infraestructura') == null ? '-' : $this->session->userdata('Infraestructura');
  	      $data['error'] 			     = EXIT_SUCCESS;
        } catch (Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}

	function solicitarEstimacion() {
		    $data['error']  = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $nombre_completo = $this->input->post('nombre_completo');
          	$empresa    	   = $this->input->post('empresa');
          	$email           = $this->input->post('email');
          	$pais  			     = $this->input->post('pais');
          	$cargo           = $this->input->post('cargo');
          	$telefono 	   	 = $this->input->post('telefono');
          	$relacion 	   	 = $this->input->post('relacion');
          	$contacto 	   	 = $this->input->post('contacto');

          	//INSERTAMOS LOS DATOS A LA BASE DE DATOS
          	$arrayInsert = array('nombre_completo' => $nombre_completo,
                  					     'Empresa' 		     => $empresa,
                  					 	   'Email' 		       => $email,
                  						   'Pais' 		       => $pais,
                  					 	   'Cargo' 	  	     => $cargo,
                  					 	   'Telefono' 	     => $telefono,
                  					 	   'Relacion' 	     => $relacion,
                  						   'Contactado' 	   => $contacto,
                  						   'Id_solicitud'    => $_SESSION['id_sol']);
          	$datoInsert = $this->M_solicitud->insertarDatos($arrayInsert, 'usuario');

          	//GUARDAMOS EN SESIÓN LOS DATOS
          	$session = array('nombre_completo' => $nombre_completo,
                  					 'Empresa' 		     => $empresa,
                  					 'Email' 		       => $email,
                  					 'Pais' 		       => $pais,
                  					 'Cargo' 	  	     => $cargo,
                  					 'Telefono' 	     => $telefono,
                  					 'Relacion' 	     => $relacion,
                  					 'Contacto' 	     => $contacto);
          	$this->session->set_userdata($session);

          	//ENVIAR EMAIL AL CLIENTE Y A LA EMPRESA
            /*$this->sendGmailCliente($email, $datoInsert['Id']);
          	$this->sendGmailSap($email, $datoInsert['Id']);*/
          	$data['msj'] = $datoInsert['msj'];
			$data['error'] = $datoInsert['error'];
        } catch (Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}

	//EMAIL CLIENTE
	function sendGmailCliente($email, $id_usuario) {
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {
        //cargamos la libreria email de ci
       $this->load->library("email");
       //configuracion para gmail
       $configGmail = array(
                            'protocol'  => 'smtp',
                            'smtp_host' => 'ssl://smtp.gmail.com',
                            'smtp_port' => 465,
                            'smtp_user' => 'miauto@prymera.pe',
                            'smtp_pass' => '8hUpuv6da_@v',
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'newline'   => "\r\n"
                          );    
       //cargamos la configuración para enviar con gmail
       $this->email->initialize($configGmail);
       $this->email->from('userauto@prymera.com');
       $this->email->to($this->session->userdata('Email'));//EMAIL AL QUIÉN IRÁ DIRIGIDO
       $this->email->subject('Bienvenido aaaa');

       //CONSTRUIMOS EL HTML
       $texto = '<!DOCTYPE html>
				 <html>
				 <head>
					<title>EMAIL CLIENTE</title>
				 </head>
				 <body>
					<h1>Hola Cliente</h1>
					<p>Gracias por confiar en SAP BUSENESS ONE</p>
				 </body>
				</html>';
       $this->email->message($texto);//AQUI SE INSERTA EL HTML
       $this->email->send();
        $data['error'] = EXIT_SUCCESS;
      }catch (Exception $e){
      	$data['msj'] = $e->getMessage();
      }
      return json_encode(array_map('utf8_encode', $data));
    }

    //EMAIL SAP
    function sendGmailSap($email, $id_usuario) {
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {  
        //cargamos la libreria email de ci
       $this->load->library("email");
       //configuracion para gmail
       $configGmail = array(
                            'protocol'  => 'smtp',
                            'smtp_host' => 'ssl://smtp.gmail.com',
                            'smtp_port' => 465,
                            'smtp_user' => 'miauto@prymera.pe',
                            'smtp_pass' => '8hUpuv6da_@v',
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'newline'   => "\r\n"
                          );    
       //cargamos la configuración para enviar con gmail
       $this->email->initialize($configGmail);
       $this->email->from('userauto@prymera.com');
       $this->email->to('jhonatanibericom@gmail.com');//EMAIL AL QUIÉN IRÁ DIRIGIDO
       $this->email->subject('Bienvenido/a a SAP BUSINESS ONE');

       //CONSTRUIMOS EL HTML
       $texto = '<!DOCTYPE html>
				 <html>
				 <head>
					<title>EMAIL SAP</title>
				 </head>
				 <body>
					<h1>Hola SAP</h1>
					<h1>El Cliente: '.$_SESSION['nombre_completo'].'<h1>
					<h1>Con Email: '.$_SESSION['Email'].'<h1>
					<h1>Con el teléfono: '.$_SESSION['Telefono'].'<h1>
					<h1>Con el Cargo de '.$_SESSION['Cargo'].'<h1>
					<h1>Solicitó un registro a la plataforma de SAP<h1>
				 </body>
				</html>';
        $this->email->message($texto);//AQUI SE INSERTA EL HTML
        $this->email->send();
        $data['error'] = EXIT_SUCCESS;
      }catch (Exception $e){
      	$data['msj'] = $e->getMessage();
      }
      return json_encode(array_map('utf8_encode', $data));
    }
}