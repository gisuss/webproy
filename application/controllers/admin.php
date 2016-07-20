<?php

class Admin extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('solicitante_model');
		$this->load->model('usuarios_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');

			$data = array(
				'usuario' => $session_data['usuario'],
				'titulo' => 'HomePage'
			);
	     	$this->load->view("administrador/admin-home_view",$data);
	     }else{
	     	redirect(base_url().'usuarios/', 'refresh');
	     }
	}

	public function add_usuario()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data = array(
				'usuario' => $session_data['usuario'],
				'titulo' => 'Sign Up'
			);
			$this->load->view('signup_view',$data);
		}else{
			redirect(base_url().'usuarios/', 'refresh');
		}
	}

	public function update_user()
	{
		if ($this->input->post('submit_reg')) {
			$this->form_validation->set_rules('nombre','Nombre','required');
			$this->form_validation->set_rules('apellido','Apellido','required');
			$this->form_validation->set_rules('cedula','Cedula','required');
			$this->form_validation->set_rules('correo','Correo','required|valid_email');
			$this->form_validation->set_rules('telefono','Telefono','required');
			$this->form_validation->set_rules('usuario','Usuario','required|trim|callback_very_user');
			$this->form_validation->set_rules('pass','Contraseña','required|trim|min_length[6]');
			$this->form_validation->set_rules('pass2','Contraseñas','required|trim|matches[pass]');
			$this->form_validation->set_rules('departamento','Departamento','required');
			$this->form_validation->set_rules('cargo','Cargo','required');
			$this->form_validation->set_rules('tipo','Tipo','required');


			$this->form_validation->set_message('required','<p class="text-warning">El campo  <b>%s</b>  es OBLIGATORIO.</p>');
			$this->form_validation->set_message('very_user','<p class="text-warning">El  <b>%s</b>  YA EXISTE, por favor indique otro.</p>');
			$this->form_validation->set_message('very_email','<p class="text-warning">El  <b>%s</b>  YA EXISTE, por favor indique otro.</p>');
			$this->form_validation->set_message('valid_email','<p class="text-warning">Ingrese un  <b>%s</b>  VALIDO.</p>');
			$this->form_validation->set_message('matches','<p class="text-warning">Las  <b>%s</b>  NO COINCIDEN.</p>');
			$this->form_validation->set_message('min_length','<p class="text-warning">El campo  <b>%s</b>  debe tener como minimo 6 caracteres.</p>');

			if ($this->form_validation->run() != FALSE) {
				if ($this->session->userdata('logged_in')) {
					$session_data = $this->session->userdata('logged_in');
					$this->usuarios_model->update_user($this->input->post('usuario'));
					$data1 = array(
						'mensaje'=>'Se Actualizo correctamente al usuario: ',
						'titulo' => 'HomePage',
						'usuario1' => $this->input->post('usuario'),
						'usuario' => $session_data['usuario']
					);
					$this->load->view('administrador/admin-home_view',$data1);
				}else{
					redirect(base_url().'usuarios/');
				}
			}else{
				if ($this->session->userdata('logged_in')) {
					$session_data = $this->session->userdata('logged_in');
					$query = $this->usuarios_model->get_all_user($this->input->post('usuario'));
					$data = array(
						'titulo' => 'Update User',
						'mensaje1' => 'Hubo un Error | Verifique el Formulario',
						'usuario' => $session_data['usuario'],

						'nombre' => $query['nombre'],
						'apellido' => $query['apellido'],
						'cedula' => $query['cedula'],
						'correo' => $query['correo'],
						'telefono' => $query['telefono'],
						'tipo' => $query['tipo'],
						'cargo' => $query['cargo'],
						'departamento' => $query['departamento'],
						'usuario1' => $query['usuario'],
						'pass' => $query['pass'],
						'estado' => $query['estado']
					);
					$this->load->view('administrador/admin_update_view',$data);
				}else{
					redirect(base_url().'usuarios/');
				}
			}
		}else{
			redirect(base_url().'admin/');
		}
	}
	

	public function delete_usuario()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data = array(
				'usuario' => $session_data['usuario'],
				'titulo' => 'Delete User',
				'mensaje' => 'Usuario Eliminado con Exito'
			);
			$this->load->view('administrador/admin-home_view',$data);
		}else{
			redirect(base_url().'usuarios/', 'refresh');
		}
	}

	public function very_delete()
	{
		if ($this->input->post('delete_user')) {
			$this->form_validation->set_rules('usuario','Usuario','required|callback_very_user');

			$this->form_validation->set_message('required','<p class="text-warning">El campo  <b>%s</b>  es OBLIGATORIO.</p>');
			$this->form_validation->set_message('very_user','<p class="text-warning">El  <b>%s</b>  NO EXISTE, por favor Verifique.</p>');
			
			if ($this->form_validation->run() != FALSE) {
				if ($this->session->userdata('logged_in')) {
					$session_data = $this->session->userdata('logged_in');
					$this->usuarios_model->delete_user($this->input->post('usuario'));

					$data1 = array(
						'titulo' => 'HomePage',
						'usuario' => $session_data['usuario'],
						'mensaje' => 'Eliminado con Exito el Usuario: ',
						'usuario1' => $this->input->post('usuario')
					);
					$this->load->view('administrador/admin-home_view',$data1);
				}else{
					redirect(base_url().'usuarios/');
				}
			}else{
				if ($this->session->userdata('logged_in')) {
					$session_data = $this->session->userdata('logged_in');
					$data = array(
						'titulo' => 'HomePage',
						'usuario' => $session_data['usuario'],
						'mensaje1' => 'Hubo un Error | Verifique el Usuario Introducido'
					);
					$this->load->view('administrador/admin-home_view',$data);
				}else{
					redirect(base_url().'usuarios/');
				}
			}
		}else{
			redirect(base_url().'admin/delete_usuario');
		}
	}

	public function very_update()
	{
		if ($this->input->post('update_user')) {
			$this->form_validation->set_rules('usuario','Usuario','required|callback_very_user');

			$this->form_validation->set_message('required','<p class="text-warning">El campo  <b>%s</b>  es OBLIGATORIO.</p>');
			$this->form_validation->set_message('very_user','<p class="text-warning">El  <b>%s</b>  NO EXISTE, por favor Verifique.</p>');
			
			if ($this->form_validation->run() != FALSE) {
				if ($this->session->userdata('logged_in')) {
					$session_data = $this->session->userdata('logged_in');
					$query = $this->usuarios_model->get_all_user($this->input->post('usuario'));

					$data1 = array(
						'titulo' => 'Update User',
						'usuario' => $session_data['usuario'],

						'nombre' => $query['nombre'],
						'apellido' => $query['apellido'],
						'cedula' => $query['cedula'],
						'correo' => $query['correo'],
						'telefono' => $query['telefono'],
						'tipo' => $query['tipo'],
						'cargo' => $query['cargo'],
						'departamento' => $query['departamento'],
						'usuario1' => $query['usuario'],
						'pass' => $query['pass'],
						'estado' => $query['estado']
					);
					$this->load->view('administrador/admin_update_view',$data1);
				}else{
					redirect(base_url().'usuarios/');
				}
			}else{
				if ($this->session->userdata('logged_in')) {
					$session_data = $this->session->userdata('logged_in');
					$data = array(
						'titulo' => 'HomePage',
						'usuario' => $session_data['usuario'],
						'mensaje1' => 'Hubo un Error | Verifique el Usuario Introducido'
					);
					$this->load->view('administrador/admin-home_view',$data);
				}else{
					redirect(base_url().'usuarios/');
				}
			}
		}else{
			redirect(base_url().'admin/');
		}
	}

	public function very_user($user)
	{
		$variable = $this->usuarios_model->very($user,'usuario');
		if ($variable == true) {
			return true;
		}else{
			return false;
		}
	}

}

?>