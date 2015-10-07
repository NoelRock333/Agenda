<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {

	public function index()
	{
		$this->load->view('agenda/index');
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

    function lista_fechas() {
        $this->load->model('detalle_fechas_model');

        $arr = array();
        $data['fechas'] = $this->detalle_fechas_model->get($arr);
        $this->load->view('agenda/lista_fechas', $data);
    }
}
