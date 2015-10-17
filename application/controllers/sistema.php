<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sistema extends CI_Controller {

	public function index()
	{
		$this->load->view('sistema/agenda_view');
	}

    function agregar_fecha() 
    {
        $fecha 	= $this->input->post("fecha");
        $tipo 	= $this->input->post("tipo");
        $datos["nombre"] 	= $this->input->post("nombre");
        $datos["telefono"] 	= $this->input->post("telefono");
        $datos["correo"] 	= $this->input->post("correo");

        if($tipo == "Individual")
        	$datos["tipo"] = 1;
        else
        	$datos["tipo"] = 2;

        $date = explode(" ", $fecha);
        $f_exp = explode("/", $date[0]);
        $fecha_ins = $f_exp[2] . "-" . $f_exp[1] . "-" . $f_exp[0];
        $datos["fecha"] = $fecha_ins;
        $datos["hora"] = $date[1];

        $this->load->model("detalle_fechas_model");
        $id_fecha = $this->detalle_fechas_model->insert($datos);

        $arr = array(
            "fecha" => $date[0],
            "hora" => $datos["hora"] . ":" . "00",
            "id_fecha" => $id_fecha
        );
        echo json_encode($arr);
    }

    function cotizacion()
    {
        $this->load->view("sistema/cotizacion_view");
    }

    function solicitar_cotizacion(){
        $datos["nombre"]    = $this->input->post("nombre");
        $datos["telefono"]  = $this->input->post("telefono");
        $datos["correo"]    = $this->input->post("correo");
        $this->load->model("detalle_cotizacion_model");
        $id = $this->detalle_cotizacion_model->insert($datos);
        $arr = array(
            "id" => $id
        );
        echo json_encode($arr);
    }

    function obituario($id_obituario = '1')
    {
        $this->load->model("obituario_model");
        $datos['obituario'] = $this->obituario_model->get(array("id"=>$id_obituario));
        $this->load->view("sistema/obituario_view", $datos);
    }

    function compartir_historia(){
        $datos['id_obituario'] = $this->input->post("id_obituario");
        $datos['anecdota']   = $this->input->post("anecdota");
        $this->load->model("detalle_obituario_model");
        $id_detalle = $this->detalle_obituario_model->insert($datos);
        $arr = array(
            "id" => $id_detalle
        );
        echo json_encode($arr);
    }
}
