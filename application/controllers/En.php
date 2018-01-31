<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class En extends CI_Controller {

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

  public function index() {
    //ELIMINAR DATOS EN SESIÓN AL CARGAR LA PÁGINA
    /*$data['nombre_comple'] = $this->session->userdata('nombre_linke');
    $data['email_link'] = $this->session->userdata('email_linke');
    $data['comp'] = $this->session->userdata('compania') == null ? '' : $this->session->userdata('compania');
    $data['tit'] = $this->session->userdata('titulo') == null ? '' : $this->session->userdata('titulo');
    $data['pais_link'] = $this->session->userdata('pais_linke');
    $data['pantalla'] = $this->session->userdata('pantalla') == '' ? 0 : $this->session->userdata('pantalla');
    $data['industria'] = $this->session->userdata('industria');
    $data['Factura_anual'] = $this->session->userdata('Factura_anual');
    $data['Tamanio'] = $this->session->userdata('Tamanio');
    $data['Infraestructura'] = $this->session->userdata('Infraestructura');
    $explode = explode(",", $this->session->userdata('Prioridad'));
    $html    = '';
    foreach ($explode as $key) {
      $html .= '<li>'.$key.'</li>';
    }
    $data['priori'] = $html;*/
    $data['confirmar'] = $this->session->userdata('confirmar') == null ? 0 : $this->session->userdata('confirmar');
    $data['pantalla'] = 0;
    $client_id     = "864xp2wdu9eghe";
    $client_secret = "M6NxoP4EWlaADF2U";
    $redirect_uri  = "http://www.sap-latam.com/sap_business_one/callback";
    $csrf_token    = random_int(1111111, 9999999);
    $scopes        = "r_basicprofile%20r_emailaddress";
    $data['client_id']     = $client_id;
    $data['client_secret'] = $client_secret;
    $data['redirect_uri']  = $redirect_uri;
    $data['csrf_token']    = $csrf_token;
    $data['scopes']        = $scopes;
    $data['nombre_linke']  = $this->session->userdata('emailAddress');
    $this->load->view('v_en', $data);
  }

  function Savedatos() {
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
            if($pantalla == 1) {
              $idIdioma = $this->M_solicitud->getDatosPais($idioma);
              $arrayInsert = array('Industria'   => $datos,
                                   'Id_lenguaje' => $idIdioma);
              $datoInsert = $this->M_solicitud->insertarDatos($arrayInsert, 'solicitud');
              $session = array('industria' => $datos,
                               'id_sol'    => $datoInsert['Id'],
                                'idioma'   => $idioma);
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
                }else if($pantalla == 4){
                  $arrayUpdate = array($columna => $datos);
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

  function mostrarDatos() {
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
          $tamanio = $this->session->userdata('Tamanio') == null ? '-' : $this->session->userdata('Tamanio').' employees';
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
            $arrayInsert = array('nombre_completo' => $nombre_completo,
                                 'Empresa'         => $empresa,
                                 'Email'           => $email,
                                 'Pais'            => $pais,
                                 'Cargo'           => $cargo,
                                 'Telefono'        => $telefono,
                                 'Relacion'        => $relacion,
                                 'Contactado'      => $contacto,
                                 'Id_solicitud'    => $_SESSION['id_sol']);
            $datoInsert = $this->M_solicitud->insertarDatos($arrayInsert, 'usuario');
            $session = array('nombre_completo' => $nombre_completo,
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

          //$this->sendGmailSap($email);
          $data['msj']  = $datoInsert['msj'];
          $data['error'] = $datoInsert['error'];
        } catch (Exception $e) {
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
  }

    //EMAIL SAP
    function sendGmailSap($email) {
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {  
        if($_SESSION['Contacto'] == 3){
          $contact = 'por email y teléfono';
        }else if($_SESSION['Contacto'] == 2){
          $contact = 'por teléfono';
        }else if($_SESSION['Contacto'] == 1){
          $contact = 'por Email';
        }
        $respuestas = $this->M_solicitud->getRespUsuario($_SESSION['id_persona']);
       // cargamos la libreria email de ci
       $this->load->library("email");
       //configuracion para gmail
       $configGmail = array(
                            'protocol'  => 'smtp',
                            'smtp_host' => 'smtpout.secureserver.net',
                            'smtp_port' => 3535,
                            'smtp_user' => 'confirmaciones@merino.com.pe',
                            'smtp_pass' => 'cFm$17Pe',
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'newline'   => "\r\n"
                          );    
       //cargamos la configuración para enviar con gmail
       $this->email->initialize($configGmail);
       $this->email->from('info@mcg-agency.com');
       $this->email->to('jhonatanibericom@gmail.com');//EMAIL AL QUIÉN IRÁ DIRIGIDO
       $this->email->subject('Bienvenido/a a SAP BUSINESS ONE');

       //CONSTRUIMOS EL HTML
       $texto = '<!DOCTYPE html>
                    <html>
                    <head>
                      <title></title>
                    </head>
                    <body style="font-family: "Open Sans",Arial,Helvetica,sans-serif;">
                      <div style="max-width: 600px; width: 100%; margin: auto;background-color: #000000;">
                        <div style="height: 200px;border-bottom: 5px solid #e4e4e4;">
                          <div style="text-align: center;float: left;padding: 75px 30px;max-width: 200px;width: 100%;">
                            <img src="http://www.sap-latam.com/sap_business_one/public/img/logo/logo_header.png" style="max-width: 200px;">
                          </div>
                          <div style="height: 100%;max-width: 150px;width: 100%;float: right;display: inline-block;">
                            <div style="height: 100%;width: 100%;max-width: 30px;float: right;background-color: #54442E;"></div>
                            <div style="height: 100%;width: 100%;max-width: 30px;float: right;background-color: #8D6832;"></div>
                            <div style="height: 100%;width: 100%;max-width: 30px;float: right;background-color: #E29D2E;"></div>
                          </div>
                        </div>
                        <div style="background-color: #000000; color: #FFFFFF;padding: 30px;">
                          <h2 style="text-align: center">Datos del Cliente</h2>
                          <div>
                            <strong style="    max-width: 140px;width: 100%;display: inline-block;">Cliente</strong>
                            <p style="display: inline-block; margin: 0;"><span style="margin-right: 20px;">:</span> '.$_SESSION['nombre_completo'].'</p>
                          </div>
                          <div>
                            <strong style="    max-width: 140px;width: 100%;display: inline-block;">Cargo</strong>
                            <p style="display: inline-block; margin: 0;"><span style="margin-right: 20px;">:</span> '.$_SESSION['Cargo'].'</p>
                          </div>
                          <div>
                            <strong style="    max-width: 140px;width: 100%;display: inline-block;">Empresa</strong>
                            <p style="display: inline-block; margin: 0;"><span style="margin-right: 20px;">:</span> '.$_SESSION['Empresa'].'</p>
                          </div>
                          <div>
                            <strong style="    max-width: 140px;width: 100%;display: inline-block;">Teléfono</strong>
                            <p style="display: inline-block; margin: 0;"><span style="margin-right: 20px;">:</span> '.$_SESSION['Telefono'].'</p>
                          </div>
                          <div>
                            <strong style="    max-width: 140px;width: 100%;display: inline-block;">Email</strong>
                            <p style="display: inline-block; margin: 0;"><span style="margin-right: 20px;">:</span> '.$_SESSION['Email'].'</p>
                          </div>
                          <div>
                            <strong style="    max-width: 140px;width: 100%;display: inline-block;">Relación con SAP</strong>
                            <p style="display: inline-block; margin: 0;"><span style="margin-right: 20px;">:</span> '.$_SESSION['Relacion'].'</p>
                          </div>
                          <div>
                            <strong style="    max-width: 140px;width: 100%;display: inline-block;">País</strong>
                            <p style="display: inline-block; margin: 0;"><span style="margin-right: 20px;">:</span> '.$_SESSION['Pais'].'</p>
                          </div>
                          <h2 style="text-align: center">Respuestas</h2>
                          <div style="display: flex;">
                            <div style="margin-right: 20px;max-width: 40px;height:40px;width: 100%;display: inline-block;background-color: #FDB917; border-radius: 25px;display: flex;align-items: center;"><span style="margin: auto;">1</span></div>
                            <div>
                              <p style="margin: 0;">¿En qué industria se desempeña?</p>
                              <ul style="margin: 5px 0;padding-left: 15px;">
                                <li>'.$respuestas[0]->Industria.'</li>
                              </ul>
                            </div>
                          </div>
                          <div style="display: flex;">
                            <div style="margin-right: 20px;max-width: 40px;height:40px;width: 100%;display: inline-block;background-color: #FDB917; border-radius: 25px;display: flex;align-items: center;"><span style="margin: auto;">2</span></div>
                            <div>
                              <p style="margin: 0;">¿De qué tamaño es su empresa?</p>
                              <ul style="margin: 5px 0;padding-left: 15px;">
                                <li>'.$respuestas[0]->Tamanio.' empleados</li>
                              </ul>
                            </div>
                          </div>
                          <div style="display: flex;">
                            <div style="margin-right: 20px;max-width: 40px;height:40px;width: 100%;display: inline-block;background-color: #FDB917; border-radius: 25px;display: flex;align-items: center;"><span style="margin: auto;">3</span></div>
                            <div>
                              <p style="margin: 0;">Su facturación</p>
                              <ul style="margin: 5px 0;padding-left: 15px;">
                                <li>'.$respuestas[0]->Factura_anual.'</li>
                              </ul>
                            </div>
                          </div>
                          <div style="display: flex;">
                            <div style="margin-right: 20px;max-width: 40px;height:40px;width: 100%;display: inline-block;background-color: #FDB917; border-radius: 25px;display: flex;align-items: center;"><span style="margin: auto;">4</span></div>
                            <div>
                              <p style="margin: 0;">¿Cuál es la prioridad de su negocio?</p>
                              <ul style="margin: 5px 0;padding-left: 15px;">
                                <li>'.$respuestas[0]->Prioridad.'</li>
                              </ul>
                            </div>
                          </div>
                          <div style="display: flex;">
                            <div style="margin-right: 20px;max-width: 40px;height:40px;width: 100%;display: inline-block;background-color: #FDB917; border-radius: 25px;display: flex;align-items: center;"><span style="margin: auto;">5</span></div>
                            <div>
                              <p style="margin: 0;">¿Que tipo de infraestructura está buscando?</p>
                              <ul style="margin: 5px 0;padding-left: 15px;">
                                <li>'.$respuestas[0]->Infraestructura.'</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </body>
                  </html>';
        $this->email->message($texto);//AQUI SE INSERTA EL HTML
        $this->email->send();
        $this->session->unset_userdata('id_persona');
        $data['error'] = EXIT_SUCCESS;
      }catch (Exception $e){
        $data['msj'] = $e->getMessage();
      }
      return json_encode(array_map('utf8_encode', $data));
    }

    function EditQuestion() {
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {
        $data['ids_array']   = $this->session->userdata('ids_array');
        $data['array_3pant'] = $this->session->userdata('array_3pant');
        $data['pantalla_sess'] = $this->session->userdata('pantalla') == '' ? 0 : $this->session->userdata('pantalla');
        $data['error'] = EXIT_SUCCESS;
      } catch (Exception $e) {
          $data['msj'] = $e->getMessage();
      }
      echo json_encode($data);
    }

    function ConfirmarRespuestas() {
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {
        $confirmar = $this->input->post('confirmar');
        $session = array('confirmar' => $confirmar);
        $this->session->set_userdata($session);
        $data['error'] = EXIT_SUCCESS;
      }catch(Exception $e) {
        $data['msj'] = $e->getMessage();
      }
      echo json_encode($data);
  }


  function cambiarIdioma() {
    $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {
        $idioma = $this->input->post('idioma');
        $session = array('idioma' => $idioma);
        $this->session->set_userdata($session);
        $data['error'] = EXIT_SUCCESS;
      }catch(Exception $e) {
        $data['msj'] = $e->getMessage();
      }
      echo json_encode($data);
  }
}