<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_solicitud');
        $this->load->model('M_reportes');
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }
	public function index(){
		if($this->session->userdata('usuario') == null){
			header("location: Login");
		}
		$data['html'] = $this->getTable();
		$this->load->view('v_admin', $data);
	}
	function getTable(){
        if($this->session->userdata('Idioma') == 'Todos'){
            print_r('entra');
            $datos = $this->M_reportes->getDatosTabla();
        }else if($this->session->userdata('Idioma') == 'Francés'){
            $datos = $this->M_reportes->getDatosTablaIdioma(4);
        }else if($this->session->userdata('Idioma') == 'Sueco'){
            print_r('entra2');
            $datos = $this->M_reportes->getDatosTablaIdioma(5);
        }
		$html  = '';
		$cont  = 1;
        if(count($datos) == 0) {
            $html = '';
            return $html;
        }else {
            foreach ($datos as $key){
                $contactado = null;
                if($key->Contactado == 1){
                    $contactado = 'Por Email';
                }else if($key->Contactado == 2){
                    $contactado = 'Por Teléfono';
                }else if($key->Contactado == 3){
                    $contactado = 'Por Email y teléfono';
                }
                $html .= '<tr class="tr-cursor-pointer tr-ver-info-solicitud" data-idSolicitud="'.$cont.'">
                            <td class="text-center">'.$key->nombre_completo.'</td>
                            <td class="text-center">'.$key->Empresa.'</td>
                            <td class="text-center">'.$key->Email.'</td>
                            <td class="text-center">'.$key->Telefono.'</td>
                            <td class="text-center">'.$key->Relacion.'</td>
                            <td class="text-center">'.$key->Cargo.'</td>
                            <td class="text-center">'.$contactado.'</td>
                            <td class="text-center">'.$key->Pais.'</td>
                            <td class="text-center">'.$key->fecha_sol.' pe</td>
                        </tr>';
                $cont++;
            }
            return $html;
        }
	}
    function cerrarCesion(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $this->session->unset_userdata('usuario');
            $this->session->unset_userdata('Id_user');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    function cargarFact(){
        $respuesta = new stdClass();
        $respuesta->mensaje = "";
        if(count($_FILES) == 0){
            $respuesta->mensaje = 'Seleccione su factura';
        }else {
            $tipo = $_FILES['archivo']['type']; 
            $tamanio = $_FILES['archivo']['size']; 
            $archivotmp = $_FILES['archivo']['tmp_name'];
            $namearch = $_FILES['archivo']['name'];
            $nuevo = explode(".",$namearch);
            if($tamanio > '2000000'){
                $respuesta->mensaje = 'El tamaño de su imagen debe ser menor';
            }else {
                if($nuevo[1] == 'jpeg' || $nuevo[1] == 'jpg' || $nuevo[1] == 'png'){
                    $target = getcwd().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'logo'.DIRECTORY_SEPARATOR.'google.png'/*.'1'.basename($_FILES['archivo']['name'])*/;
                    if (file_exists($ruta)) { 
                        unlink($target); 
                    } else { 
                        
                    } 
                    if(move_uploaded_file($archivotmp, $target) ){
                       $arrUpdt = array('documento' => $namearch);
                       if($this->session->userdata('Idioma') == 'Francés'){
                        $this->M_solicitud->updateDatosLogo($arrUpdt, 4, 'anotacion');
                       }else if($this->session->userdata('Idioma') == 'Sueco'){
                        $this->M_solicitud->updateDatosLogo($arrUpdt, 5, 'anotacion');
                       }
                       $respuesta->mensaje = 'Su factura se subió correctamente';
                    } else {
                       $respuesta->mensaje = 'Hubo un problema en la subida de imagen';
                    }
                }else {
                    $respuesta->mensaje = 'El formato de la factura es incorrecto';
                }
            }
            echo json_encode($respuesta);
        }
    }
}
