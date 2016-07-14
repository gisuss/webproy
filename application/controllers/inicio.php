<?php

class Inicio extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url'); //para hacer formularios usando codeigniter
		$this->load->library('form_validation'); //para validar datos de formularios usando codeigniter
	}

	public function index()
	{
		$data = array(
				'titulo' => 'Pagina de Inicio'
		);
		$this->load->view('inicio_view',$data);
	}
}