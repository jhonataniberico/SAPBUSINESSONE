<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fi extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_solicitud');
        $this->load->helper('utils');
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

  public function index(){
    //ELIMINAR DATOS EN SESIÓN AL CARGAR LA PÁGINA
    $session = array('idioma' => 'Sueco');
    $this->session->set_userdata($session);
    /*$data['nombre_comple'] = $this->session->userdata('nombre_linke');
    $data['email_link']      = $this->session->userdata('email_linke');
    $data['comp']            = $this->session->userdata('compania') == null ? '' : $this->session->userdata('compania');
    $data['tit']             = $this->session->userdata('titulo') == null ? '' : $this->session->userdata('titulo');
    $data['pais_link']       = $this->session->userdata('pais_linke');
    $data['pantalla']        = $this->session->userdata('pantalla') == '' ? 0 : $this->session->userdata('pantalla');
    $data['industria']       = $this->session->userdata('industria');
    $data['Factura_anual']   = $this->session->userdata('Factura_anual');
    $data['Tamanio']         = $this->session->userdata('Tamanio');
    $data['Infraestructura'] = $this->session->userdata('Infraestructura');
    $explode                 = explode(",", $this->session->userdata('Prioridad'));
    $html                    = '';
    foreach ($explode as $key){
      $html .= '<li>'.$key.'</li>';
    }
    $data['priori']        = $html;*/
    $data['confirmar']     = $this->session->userdata('confirmar') == null ? 0 : $this->session->userdata('confirmar');
    $data['pantalla']      = 0;
    $client_id             = "864xp2wdu9eghe";
    $client_secret         = "M6NxoP4EWlaADF2U";
    $redirect_uri          = "http://www.sap-latam.com/sap_business_one/callback";
    $csrf_token            = random_int(1111111, 9999999);
    $scopes                = "r_basicprofile%20r_emailaddress";
    $data['client_id']     = $client_id;
    $data['client_secret'] = $client_secret;
    $data['redirect_uri']  = $redirect_uri;
    $data['csrf_token']    = $csrf_token;
    $data['scopes']        = $scopes;
    $data['nombre_linke']  = $this->session->userdata('emailAddress');
    $this->load->view('v_fi', $data);
  }
  function Savedatos(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $this->session->unset_userdata('Infraestructura');
            $datos       = $this->input->post('global_datos');
            $pantalla    = $this->input->post('pantalla');
            $idioma      = $this->input->post('idioma');
            $datos_prio  = $this->input->post('datos_prio');
            $operar      = $this->input->post('operar');
            $facturacion = $this->input->post('facturacion');
            $columna     = null;
            if($pantalla == 2) {$columna = 'Factura_anual';} elseif ($pantalla == 3) {$columna = 'Prioridad';}elseif ($pantalla == 4) {$columna = 'Infraestructura';}
            if($pantalla == 1){
              $idIdioma    = $this->M_solicitud->getDatosPais($idioma);
              $arrayInsert = array('Industria'   => $datos,
                                   'Id_lenguaje' => $idIdioma);
              $datoInsert = $this->M_solicitud->insertarDatos($arrayInsert, 'solicitud');
              $session    = array('industria' => $datos,
                                  'id_sol'    => $datoInsert['Id'],
                                  'idioma'    => $idioma);
              $this->session->set_userdata($session);
            }else {
              if($pantalla == 2){
                $arrayUpdate = array($columna  => $facturacion,
                                     'Tamanio' => $operar);
                $session     = array($columna  => $facturacion,
                                     'Tamanio' => $operar);
              }else {
                if($pantalla == 3){
                  $arrayUpdate = array($columna => $datos_prio);
                  $session     = array($columna => $datos_prio);
                }else if($pantalla == 4){
                  $arrayUpdate = array($columna          => $datos);
                  $session     = array('Infraestructura' => $datos);
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
  function mostrarDatos(){
    $data['error'] = EXIT_ERROR;
    $data['msj']   = null;
    try {
      $ids_array   = $this->input->post('array_ids');
      $array_3pant = $this->input->post('array_3pant');
      $explode = explode(",", $this->session->userdata('Prioridad'));
      $html    = '';
      foreach ($explode as $key) {
        $html .= '<li>'.$key.'</li>';
      }
      $session = array('ids_array'   => $ids_array,
                       'array_3pant' => $array_3pant);
      $this->session->set_userdata($session);
      $tamanio = $this->session->userdata('Tamanio') == null ? '-' : $this->session->userdata('Tamanio').' Anställda';
      $data['Industria']       = $this->session->userdata('industria') == null ? '-' : $this->session->userdata('industria');
      $data['Factura_anual']   = $this->session->userdata('Factura_anual') == null ? '-' : $this->session->userdata('Factura_anual');
      $data['Tamanio']         = $tamanio;
      $data['Prioridad']       = $html;
      $data['Infraestructura'] = $this->session->userdata('Infraestructura') == null ? '-' : $this->session->userdata('Infraestructura');
      $data['error']           = EXIT_SUCCESS;
    } catch (Exception $e) {
        $data['msj'] = $e->getMessage();
    }
    echo json_encode($data);
  }
  function solicitarEstimacion() {
    $data['error']  = EXIT_ERROR;
    $data['msj']    = null;
    try {
        $nombre_completo = $this->input->post('nombre_completo');
        $empresa         = $this->input->post('empresa');
        $email           = $this->input->post('email');
        $pais            = $this->input->post('pais');
        $cargo           = $this->input->post('cargo');
        $telefono        = $this->input->post('telefono');
        $relacion        = $this->input->post('relacion');
        $contacto        = $this->input->post('contacto');
        $term_cond       = $this->input->post('term_cond');
        if($contacto == '-'){
          $contacto = 0;
        }
        $arrayInsert = array('nombre_completo' => $nombre_completo,
                             'Empresa'         => $empresa,
                             'Email'           => $email,
                             'Pais'            => $pais,
                             'Cargo'           => $cargo,
                             'Telefono'        => $telefono,
                             'Terminos'        => $term_cond,
                             'Relacion'        => $relacion,
                             'Contactado'      => $contacto,
                             'Id_solicitud'    => $_SESSION['id_sol'],
                             'fecha_sol'       => date('Y-m-d H:i:s'));
        $datoInsert = $this->M_solicitud->insertarDatos($arrayInsert, 'usuario');
        $session    = array('nombre_completo' => $nombre_completo,
                            'Empresa'         => $empresa,
                            'Email'           => $email,
                            'Pais'            => $pais,
                            'Cargo'           => $cargo,
                            'Telefono'        => $telefono,
                            'Relacion'        => $relacion,
                            'Contacto'        => $contacto,
                            'pantalla'        => 0,
                            'id_persona'      => $datoInsert['Id']);
        $this->session->set_userdata($session);
        $this->session->unset_userdata('nombre_linke');
        $this->session->unset_userdata('email_linke');
        $this->session->unset_userdata('universidad');
        $this->session->unset_userdata('pais_linke');
        $this->session->unset_userdata('titulo');
        $this->session->unset_userdata('compania');
        $this->session->unset_userdata('Industria');
        $this->session->unset_userdata('Infraestructura');
        $this->session->unset_userdata('Factura_anual');
        $this->session->unset_userdata('Tamanio');
        $this->session->unset_userdata('Prioridad');
        $this->session->unset_userdata('idioma');
        $this->sendGmailSap($email);
        $this->emailClienteSap($email);
      $data['msj']   = $datoInsert['msj'];
      $data['error'] = $datoInsert['error'];
    } catch (Exception $e){
        $data['msj'] = $e->getMessage();
    }
    echo json_encode($data);
  }
  function sendGmailSap($email) {
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {  
        if($_SESSION['Contacto'] == '-'){
          $contact = '-';
        } else {
          if($_SESSION['Contacto'] == 3){
            $contact = 'por email y teléfono';
          }else if($_SESSION['Contacto'] == 2){
            $contact = 'por teléfono';
          }else if($_SESSION['Contacto'] == 1){
            $contact = 'por Email';
          }
        }
        $respuestas = $this->M_solicitud->getRespUsuario($_SESSION['id_persona']);
       $this->load->library("email");
       $configGmail = array('protocol'  => 'smtp',
                            'smtp_host' => 'smtpout.secureserver.net',
                            'smtp_port' => 3535,
                            'smtp_user' => 'info@sap-latam.com',
                            'smtp_pass' => 'sapinfo18',
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'newline'   => "\r\n");    
       $this->email->initialize($configGmail);
       $this->email->from('info@sapmarketing.net');
       $this->email->to('jhonatanibericom@gmail.com');
       $this->email->subject("Olen kiinnostunut SAP Business One'sta.");
       $texto = '<!DOCTYPE html>
                  <html>
                  <head>
                    <title></title>
                  </head>
                  <body style="font-family: "Open Sans",Arial,Helvetica,sans-serif;">
                    <table align="center" cellspacing="0" cellpadding="0" border="0" style="max-width: 500px; width: 100%; margin: auto;border: 1px solid #757575;">
                      <tr>
                        <th>
                          <table cellspacing="0" cellpadding="0" border="0" style="background-color: #000000;">
                            <tbody>
                              <tr>
                                <th style="width: 425px;text-align: left;padding-left: 20px;">
                                  <table cellspacing="0" cellpadding="0" border="0">
                                    <tbody>
                                      <tr style="text-align: left;">
                                        <th style="text-align: left;"><img width="150" src="http://www.sap-latam.com/sap_business_one/public/img/logo/logo_header.png"></th>
                                      </tr>
                                    </tbody>
                                  </table>
                                </th>
                                <th style="width: 75px;">
                                  <table cellspacing="0" cellpadding="0" border="0">
                                    <tbody>
                                      <tr>
                                        <td style="height: 100px;width: 25px;background-color: #54442E;"></td>
                                        <td style="height: 100px;width: 25px;background-color: #8D6832;"></td>
                                        <td style="height: 100px;width: 25px;background-color: #E29D2E;"></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </th>
                              </tr>
                            </tbody>
                          </table>
                        </th>
                      </tr>
                      <tr>
                        <td>
                          <table style="width: 100%;padding: 10px;">
                            <tbody>
                              <tr style="padding: 25px;margin: 30px;">
                                <td style="text-align: center;padding: 10px 0;"><font style="font-weight: bold;font-size: 20px;">Asiakastieto</font></td>
                              </tr>
                              <tr>
                                <table style="padding: 20px;" cellspacing="0" cellpadding="0" border="0">
                                  <tbody>
                                    <tr style="padding: 0 20px;">
                                      <td><font style="margin: 3px 0;font-size: 18px;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Asiakas:</strong></font></td>
                                      <td><font style="margin: 3px 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$_SESSION['nombre_completo'].'</font></td>
                                    </tr>
                                    <tr style="padding: 0 20px;">
                                      <td><font style="margin: 3px 0;font-size: 18px;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Lataa:</strong></font></td>
                                      <td><font  style="margin: 3px 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$_SESSION['Cargo'].'</font></td>
                                    </tr>
                                    <tr style="padding: 0 20px;">
                                      <td><font style="margin: 3px 0;font-size: 18px;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Yritys:</strong></font></td>
                                      <td><font style="font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$_SESSION['Empresa'].'</font></td>
                                    </tr>
                                    <tr style="padding: 0 20px;">
                                      <td><font style="margin: 3px 0;font-size: 18px;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Puhelin:</strong></font></td>
                                      <td><font style="margin: 3px 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$_SESSION['Telefono'].'</font></td>
                                    </tr>
                                    <tr style="padding: 0 20px;">
                                      <td><font style="margin: 3px 0;font-size: 18px;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Sähköposti:</strong></font></td>
                                      <td><font style="margin: 3px 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$_SESSION['Email'].'</font></td>
                                    </tr>
                                    <tr style="padding: 0 20px;">
                                      <td><font style="margin: 3px 0;font-size: 18px;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Suhde SAP&acute;iin:</strong></font></td>
                                      <td><font style="margin: 3px 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$_SESSION['Relacion'].'</font></td>
                                    </tr>
                                    <tr style="padding: 0 20px;">
                                      <td><font style="margin: 3px 0;font-size: 18px;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Maa:</strong></font></td>
                                      <td><font style="margin: 3px 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$_SESSION['Pais'].'</font></td>
                                    </tr>
                                    <tr style="padding: 0 20px;">
                                      <td><font style="margin: 3px 0;font-size: 18px;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Haluan yhteydenottoa:</strong></font></td>
                                      <td><font style="margin: 3px 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$contact.'</font></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </tr>
                              <tr style="padding: 25px;margin: 30px;">
                                <td style="text-align: center;"><font style="font-weight: bold;font-size: 20px;">Vastaukset</font></td>
                              </tr>
                              <tr>
                                <td>
                                  <table style="width: 100%;padding: 20px;" cellspacing="0" cellpadding="0">
                                    <tbody>
                                      <tr style="padding: 5px 20px;">
                                        <td rowspan="2"><img width="35" src="http://www.sap-latam.com/sap_business_one/public/img/1.jpg"></td>
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Mik&auml; on toimialasi?</strong></font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$respuestas[0]->Industria.'</font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td rowspan="2"><img width="35" src="http://www.sap-latam.com/sap_business_one/public/img/2.jpg"></td>
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Yrityksesi koko?</strong></font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$respuestas[0]->Tamanio.' employees</font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td rowspan="2"><img width="35" src="http://www.sap-latam.com/sap_business_one/public/img/3.jpg"></td>
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Laskutuksesi</strong></font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$respuestas[0]->Factura_anual.'</font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td rowspan="2"><img width="35" src="http://www.sap-latam.com/sap_business_one/public/img/4.jpg"></td>
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Liiketoimintasi prioriteetit?</strong></font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$respuestas[0]->Prioridad.'</font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td rowspan="2"><img width="35" src="http://www.sap-latam.com/sap_business_one/public/img/5.jpg"></td>
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Millaista infrastuktuuria etsit?</strong></font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$respuestas[0]->Infraestructura.'</font></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </body>
                  </html>';
        $this->email->message($texto);
        $this->email->send();
        $data['error'] = EXIT_SUCCESS;
      }catch (Exception $e){
        $data['msj'] = $e->getMessage();
      }
      return json_encode(array_map('utf8_encode', $data));
    }
  function emailClienteSap($email){
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {  
       $this->load->library("email");
       $respuestas = $this->M_solicitud->getRespUsuario($_SESSION['id_persona']);
       $configGmail = array('protocol'  => 'smtp',
                            'smtp_host' => 'smtpout.secureserver.net',
                            'smtp_port' => 3535,
                            'smtp_user' => 'info@sap-latam.com',
                            'smtp_pass' => 'sapinfo18',
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'newline'   => "\r\n");    
       $this->email->initialize($configGmail);
       $this->email->from('info@sapmarketing.net');
       $this->email->to($email);
       $this->email->subject('Kiitos mielenkiinnostasi SAP Business Onea kohtaan.');
       $texto = '<!DOCTYPE html>
                <html>
                <head>
                  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                    <meta name="viewport" content="width=device-width">
                  <title></title>
                  <style type="text/css">
                    table,tbody,tr,td,th{padding: 0;margin: 0;border-spacing: 0;border-collapse: inherit;}
                    body{margin: 0;padding: 0; height: 100vh;}
                    table.body{background-color: #F3F3F3;width: 100%;height: 100%;border:0;}
                    h2,p{font-family: "Open Sans",Arial,Helvetica,sans-serif;margin: 0;}
                  </style>
                </head>
                <body>
                  <table class="body" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                      <td>
                        <table align="center" cellspacing="0" cellpadding="0" border="0" style="width: 100%;max-width: 600px;margin: 0 auto;background-color: #000000;text-align: center;float: none;">
                          <tbody>
                            <tr>
                              <th>
                                <table cellspacing="0" cellpadding="0" border="0">
                                  <tbody>
                                    <tr>
                                      <th style="width: 525px;text-align: left;padding-left: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0">
                                          <tbody>
                                            <tr style="text-align: left;">
                                              <th style="text-align: left;"><img width="150" src="http://www.sap-latam.com/sap_business_one/public/img/logo/logo_header.png"></th>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </th>
                                      <th style="width: 75px;">
                                        <table cellspacing="0" cellpadding="0" border="0">
                                          <tbody>
                                            <tr>
                                              <td style="height: 100px;width: 25px;background-color: #54442E;"></td>
                                              <td style="height: 100px;width: 25px;background-color: #8D6832;"></td>
                                              <td style="height: 100px;width: 25px;background-color: #E29D2E;"></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </th>
                                    </tr>
                                  </tbody>
                                </table>
                              </th>
                            </tr>
                          </tbody>
                        </table>
                        <table align="center" cellspacing="0" cellpadding="0" style="width: 100%;border:1px solid #000000;max-width: 600px;margin: 5px auto;;text-align: center;float: none;background-color: #FFFFFF;">
                          <tbody>
                            <tr>
                              <td>
                                <table align="center" cellspacing="0" cellpadding="0" style="text-align: center;margin: auto;">
                                  <tbody>
                                    <tr>
                                      <td style="padding: 20px 40px 10px 40px;">
                                        <font style="color: #000000;font-weight: bold;font-size: 20px;">Kiitos osallistumisestanne!</font>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td style="padding:10px 40px 20px 40px;">
                                        <font style="color: #000000;">Uskomme, että SAP Business One auttaa sinua nopeuttamaan yrityksen digitaalista muutosta. SAP-edustaja ottaa sinuun yhteyttä ja auttaa sinua tekemään ensimmäisen askeleen.</font>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 20px;">
                                  <table style="width: 100%;padding: 20px;" cellspacing="0" cellpadding="0">
                                    <tbody>
                                      <tr style="padding: 5px 20px;">
                                        <td rowspan="2"><img width="35" src="http://www.sap-latam.com/sap_business_one/public/img/1.jpg"></td>
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Mik&auml; on toimialasi?</strong></font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$respuestas[0]->Industria.'</font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td rowspan="2"><img width="35" src="http://www.sap-latam.com/sap_business_one/public/img/2.jpg"></td>
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Yrityksesi koko?</strong></font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$respuestas[0]->Tamanio.' employees</font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td rowspan="2"><img width="35" src="http://www.sap-latam.com/sap_business_one/public/img/3.jpg"></td>
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Laskutuksesi</strong></font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$respuestas[0]->Factura_anual.'</font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td rowspan="2"><img width="35" src="http://www.sap-latam.com/sap_business_one/public/img/4.jpg"></td>
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Liiketoimintasi prioriteetit?</strong></font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$respuestas[0]->Prioridad.'</font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td rowspan="2"><img width="35" src="http://www.sap-latam.com/sap_business_one/public/img/5.jpg"></td>
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;"><strong>Millaista infrastuktuuria etsit?</strong></font></td>
                                      </tr>
                                      <tr style="padding: 5px 20px;">
                                        <td style="text-align: left;"><font style="margin: 0;font-family: "Open Sans",Arial,Helvetica,sans-serif;">'.$respuestas[0]->Infraestructura.'</font></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                              <tr>
                                <td style="padding:10px 40px 20px 40px;">
                                  <font style="color: #000000;font-size:14px;font-family: arial;"><strong>SAP Gobal</strong></font>
                                </td>
                              </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </table>
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
    function EditQuestion(){
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {
        $data['ids_array']     = $this->session->userdata('ids_array');
        $data['array_3pant']   = $this->session->userdata('array_3pant');
        $data['pantalla_sess'] = $this->session->userdata('pantalla') == '' ? 0 : $this->session->userdata('pantalla');
        $data['error'] = EXIT_SUCCESS;
      } catch (Exception $e) {
          $data['msj'] = $e->getMessage();
      }
      echo json_encode($data);
    }
    function ConfirmarRespuestas(){
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {
        $confirmar = $this->input->post('confirmar');
        $session   = array('confirmar' => $confirmar);
        $this->session->set_userdata($session);
        $data['error'] = EXIT_SUCCESS;
      }catch(Exception $e){
        $data['msj'] = $e->getMessage();
      }
      echo json_encode($data);
  }
  function cambiarIdioma(){
    $data['error'] = EXIT_ERROR;
    $data['msj']   = null;
      try {
        $idioma  = $this->input->post('idioma');
        $session = array('idioma' => $idioma);
        $this->session->set_userdata($session);
        $data['error'] = EXIT_SUCCESS;
      }catch(Exception $e){
        $data['msj'] = $e->getMessage();
      }
      echo json_encode($data);
  }
  function returnHome(){
    $data['error'] = EXIT_ERROR;
    $data['msj'] = null;
    try {
      $session = array('pantalla' => 0);
      $this->session->set_userdata($session);
      $data['error'] = EXIT_SUCCESS;
    }catch(Exception $e) {
      $data['msj'] = $e->getMessage();
    }
    echo json_encode($data);
  }
}