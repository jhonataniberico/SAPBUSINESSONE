<?php

class M_reportes extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getDatosTabla() {
        $sql = "SELECT s.*,
					   u.nombre_completo,
				       u.Empresa,
				       u.Email,
				       u.Telefono,
                       u.Contactado
				  FROM usuario u,
				  	   solicitud s
				  WHERE u.Id_solicitud = s.Id";
        $result = $this->db->query($sql, array());
        return $result->result();
    }

}