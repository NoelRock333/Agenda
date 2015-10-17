<?php 
class Detalle_obituario_model extends CI_Model {

	public function __construct() {
        $this->load->database();
        parent::__construct();
    }

    function insert($datos){
    	$this->db->insert("detalle_obituario", $datos);
        return $this->db->insert_id();
    }

    function get($datos){
    	$this->db->where($datos);
    	$res = $this->db->get('detalle_obituario');
        return $res->result();
    }

    function delete($datos){
    	$this->db->delete("detalle_obituario", $datos);
        return $this->db->affected_rows();
    }
    
    function get_fecha($id_obituario){
        $this->db->from("detalle_obituario");
        $this->db->where("id", $id_obituario);
        $res = $this->db->get();
        return $res->row();
    }

}