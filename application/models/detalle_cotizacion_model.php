<?php 
class Detalle_cotizacion_model extends CI_Model {

	public function __construct() {
        $this->load->database();
        parent::__construct();
    }

    function insert($datos){
    	$this->db->insert("detalle_cotizacion", $datos);
        return $this->db->insert_id();
    }

    function get($datos){
    	$this->db->where($datos);
    	$res = $this->db->get('detalle_cotizacion');
        return $res->result();
    }

    function delete($datos){
    	$this->db->delete("detalle_cotizacion", $datos);
        return $this->db->affected_rows();
    }
    
    function get_detalle($id_cotizacion){
        $this->db->from("detalle_cotizacion");
        $this->db->where("id", $id_fecha);
        $res = $this->db->get();
        return $res->row();
    }

}