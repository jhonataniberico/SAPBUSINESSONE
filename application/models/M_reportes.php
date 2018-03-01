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
                       u.Contactado,
                       u.Pais,
                       DATE_FORMAT(u.fecha_sol, '%d/%m/%Y %H:%i %p') AS fecha_sol,
                       u.Cargo,
                       u.Relacion
				  FROM usuario u,
				  	   solicitud s
				  WHERE u.Id_solicitud = s.Id";
        $result = $this->db->query($sql, array());
        return $result->result();
    }

}