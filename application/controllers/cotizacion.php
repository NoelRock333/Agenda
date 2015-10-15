<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cotizacion extends CI_Controller {

	public function index()
	{
		$this->load->view('agenda/index');
	}
}