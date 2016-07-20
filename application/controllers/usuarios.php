<?php

class Usuarios extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('usuarios_model');
		$this->load->library('session');
	}

	public function index()
	{
		$data = array(
			'titulo' => 'Login'
		);
		$this->load->view('login_view',$data);
	}

	public function signup()
	{
		$data = array(
			'titulo' => 'Sign Up'
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
					'mensaje'=>'Se registro correctamente al usuario: ',
					'titulo' => 'Login',
					'usuario' => $this->input->post('usuario')
				);
				$this->load->view('login_view',$data1);
			}else{
				$data = array(
					'titulo' => 'Sign Up',
					'mensaje' => 'Hubo un Error | Verifique el Formulario'
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
				$estado = $this->usuarios_model->very_estado();
				if ($estado == true) {
					$variables = array(
						'usuario' => $this->input->post('usuario')
					);
					$this->session->set_userdata('logged_in',$variables);
					$type = $this->usuarios_model->get_tipo_usuario($this->input->post('usuario'));

					if ($type != null) {
						$q = $type['tipo'];
						$data['titulo'] = 'HomePage';
						$data['tipo'] = $type['tipo'];
						$data['usuario'] = $this->input->post('usuario');

						switch ($q) {
							case 'gerente':
								//redirect(base_url().'gerente/');
							break;
							case 'admin':
								redirect(base_url().'admin/');
							break;
							case 'tecnico':
								//redirect(base_url().'tecnico/');
							break;
							case 'solicitante':
								redirect(base_url().'solicitante/');
							break;
						}
					}else{
						redirect(base_url().'usuarios/');
					}
				}else{
					$data = array(
						'mensaje1' => 'El usuario esta Inactivo',
						'titulo' => 'Log In'
					);
					$this->load->view('login_view',$data);
				}
			}else{
				$data1 = array(
					'mensaje1'=>'El Usuario o la Contraseña son Incorrectos.',
					'titulo' => 'Log In'
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
	    session_destroy();
	    // redirigimos al controlador principal
	    redirect(base_url().'inicio');
	}

}

?>