<?php 
class Obituario_model extends CI_Model {

	public function __construct() {
        $this->load->database();
        parent::__construct();
    }

    function insert($datos){
    	$this->db->insert("obituario", $datos);
        return $this->db->insert_id();
    }

    function get($datos){
    	$this->db->where($datos);
    	$res = $this->db->get('obituario');
        return $res->result();
    }

    function delete($datos){
    	$this->db->delete("obituario", $datos);
        return $this->db->affected_rows();
    }
    
    function get_fecha($id_persona){
        $this->db->from("obituario");
        $this->db->where("id", $id_persona);
        $res = $this->db->get();
        return $res->row();
    }

}