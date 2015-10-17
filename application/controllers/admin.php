<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/dashboard_view');
	}

    function lista_fechas() {
        $this->load->model('detalle_fechas_model');

        $arr = array();
        $data['fechas'] = $this->detalle_fechas_model->get($arr);
        $this->load->view('admin/lista_fechas', $data);
    }

    function lista_cotizaciones() {
        $this->load->model('detalle_cotizacion_model');

        $arr = array();
        $data['cotizaciones'] = $this->detalle_cotizacion_model->get($arr);
        $this->load->view('admin/lista_cotizaciones', $data);
    }

    function nuevo_obituario(){
        $this->load->view('admin/nuevo_obituario');
    }

    function nuevo_obituario_JSON(){
        $datos["nombre"]    = $this->input->post("nombre");
        $datos["semblanza"] = $this->input->post("semblanza");
        $datos["fname"]    = $this->input->post("fname");
        $this->load->model("obituario_model");
        $id_obituario = $this->obituario_model->insert($datos);
        $arr = array(
            "id" => $id_obituario
        );
        echo json_encode($arr);
    }

}