<?php 
class Detalle_fechas_model extends CI_Model {

	public function __construct() {
        parent::__construct();
    }

    function insert($datos){
    	$this->db->insert("detalle_fechas", $datos);
        return $this->db->insert_id();
    }

    function get($datos){
    	$this->db->where($datos);
    	$res = $this->db->get('detalle_fechas');
        return $res->result();
    }

    function delete($datos){
    	$this->db->delete("detalle_fechas", $datos);
        return $this->db->affected_rows();

    }
    
    function get_fecha($id_fecha){
        $this->db->from("detalle_fechas");
        $this->db->where("id", $id_fecha);
        $res = $this->db->get();
        return $res->row();
    }

}