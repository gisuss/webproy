<?php

class Usuarios extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('usuarios_model');
	}

	public function index()
	{
		$data = array(
			'titulo' => 'Inicio de Sesion'
		);
		$this->load->view('login_view',$data);
	}

	public function signup()
	{
		$data = array(
			'titulo' => 'Registro'
		);
		$this->load->view('signup_view',$data);
	}

	public function very_signup()
	{
		if ($this->input->post('submit_reg')) {
			$this->form_validation->set_rules('nombre','Nombre','required');
			$this->form_validation->set_rules('apellido','Apellido','required');
			$this->form_validation->set_rules('cedula','Cedula','required');
			$this->form_validation->set_rules('correo','Correo','required|valid_email|callback_very_email');
			$this->form_validation->set_rules('telefono','Telefono','required');
			$this->form_validation->set_rules('usuario','Usuario','required|trim|callback_very_user');
			$this->form_validation->set_rules('pass','Contraseña','required|trim|min_length[6]');
			$this->form_validation->set_rules('pass2','Contraseñas','required|trim|matches[pass]');
			$this->form_validation->set_rules('departamento','Departamento','required');
			$this->form_validation->set_rules('cargo','Cargo','required');
			$this->form_validation->set_rules('tipo','Tipo','required|callback_very_user');


			$this->form_validation->set_message('required','<p class="text-warning">El campo  <b>%s</b>  es OBLIGATORIO.</p>');
			$this->form_validation->set_message('very_user','<p class="text-warning">El  <b>%s</b>  YA EXISTE, por favor indique otro.</p>');
			$this->form_validation->set_message('very_email','<p class="text-warning">El  <b>%s</b>  YA EXISTE, por favor indique otro.</p>');
			$this->form_validation->set_message('valid_email','<p class="text-warning">Ingrese un  <b>%s</b>  VALIDO.</p>');
			$this->form_validation->set_message('matches','<p class="text-warning">Las  <b>%s</b>  NO COINCIDEN.</p>');
			$this->form_validation->set_message('min_length','<p class="text-warning">El campo  <b>%s</b>  debe tener como minimo 6 caracteres.</p>');

			if ($this->form_validation->run() != FALSE) {
				$this->usuarios_model->add_user();
				$data1 = array(
					'mensaje'=>'El Usuario se registro correctamente.',
					'titulo' => 'Registro'
				);
				$this->load->view('signup_view',$data1);
			}else{
				$data = array(
					'titulo' => 'Registro'
				);
				$this->load->view('signup_view',$data);
			}
		}else{
			redirect(base_url().'usuarios/signup');
		}
	}

	public function very_user($user)
	{
		$variable = $this->usuarios_model->very($user,'usuario');
		if ($variable == true) {
			return false;
		}else{
			return true;
		}
	}

	public function very_email($email)
	{
		$variable = $this->usuarios_model->very($email,'correo');
		if ($variable == true) {
			return false;
		}else{
			return true;
		}
	}

	public function very_sesion()
	{
		if ($this->input->post('submit')) {
			$variable = $this->usuarios_model->very_sesion();
			if ($variable == true) {
				$variables = array(
					'usuario' => $this->input->post('usuario')
				);
				$this->session->set_userdata($variables);
				redirect(base_url().'inicio');
				//$query = $this->usuarios_model->get_tipo_usuario();
			}else{
				$data1 = array(
					'mensaje'=>'El Usuario o Contraseña son Incorrectos.',
					'titulo' => 'Registro'
				);
				$this->load->view('login_view',$data1);
			}
		}else{
			redirect(base_url().'usuarios/');
		}
	}

	public function logout()
	{
	    // creamos un array con las variables de sesión en blanco
		$datasession = array('usuario' => '');
	    // y eliminamos la sesión
	    $this->session->unset_userdata($datasession);
	    // redirigimos al controlador principal
	    redirect(base_url().'usuarios/signup');
	}

}