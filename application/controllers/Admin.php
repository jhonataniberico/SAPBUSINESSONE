<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_reportes');
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

	public function index() {
		if($this->session->userdata('usuario') == null) {
			header("location: Login");
		}
		$data['html'] = $this->getTable();
		$this->load->view('v_admin', $data);
	}

	function getTable() {
		$datos = $this->M_reportes->getDatosTabla();
		$html = '';
		$cont = 1;
		foreach ($datos as $key) {
			$html .= '<tr class="tr-cursor-pointer tr-ver-info-solicitud" data-idSolicitud="'.$cont.'">
                        <td>'.$key->nombre_completo.'</td>
                        <td>'.$key->Empresa.'</td>
                        <td>'.$key->Email.'</td>
                        <td>'.$key->Telefono.'</td>
                        <td>'.$key->Industria.'</td>
                        <td>'.$key->Tamanio.'</td>
                        <td>'.$key->Factura_anual.'</td>
                        <td>'.$key->Prioridad.'</td>
                        <td>'.$key->Infraestructura.'</td>
                    </tr>';
            $cont++;
		}
		return $html;
	}

    function cerrarCesion() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $this->session->unset_userdata('Id_user');
            $this->session->unset_userdata('usuario');
            $data['error'] = EXIT_SUCCESS;
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}
