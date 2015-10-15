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
}