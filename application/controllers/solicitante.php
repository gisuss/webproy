<?php

class Solicitante extends CI_Controller
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
	     	$this->load->view("solicitante/solicitante-home_view",$data);
	     }else{
	     	redirect(base_url().'usuarios/', 'refresh');
	     }
	}

	public function show_ticket($numero)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			//$query = $this->solicitante_model->get_all_ticket($session_data['usuario']);
			$data = array(
				'usuario' => $session_data['usuario'],
				'titulo' => 'Ver Incidente'
			);
	     	$this->load->view("solicitante/solicitante-show-ticket_view",$data);
	     }else{
	     	redirect(base_url().'usuarios/', 'refresh');
	     }
	}

	public function new_ticket()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$dpto = $this->usuarios_model->get_departamento($session_data['usuario']);
			$data = array(
				'usuario' => $session_data['usuario'],
				'titulo' => 'Nuevo Ticket',
				'departamento' => $dpto['departamento']
			);
			$this->load->view('solicitante/new_ticket_view',$data);
		}else{
			redirect(base_url().'usuarios/', 'refresh');
		}
	}

	public function very_reg()
	{
		if ($this->input->post('submit_reg_ticket')) {
			$this->form_validation->set_rules('titulo','Titulo','required|callback_very_titulo');
			$this->form_validation->set_rules('usuario','Usuario','required');
			$this->form_validation->set_rules('departamento','Departamento','required');
			$this->form_validation->set_rules('descripcion','Descripcion','required');
			$this->form_validation->set_rules('prioridad','Prioridad','required');
			$this->form_validation->set_rules('nivel','Nivel','required');
			$this->form_validation->set_rules('tipo','Tipo','required');
			$this->form_validation->set_rules('f_ingreso','Fecha de Ingreso','required');

			$this->form_validation->set_message('required','<p class="text-warning">El campo  <b>%s</b>  es OBLIGATORIO.</p>');
			$this->form_validation->set_message('very_titulo','<p class="text-warning">El  <b>%s</b>  YA EXISTE, por favor indique otro.</p>');

			if ($this->form_validation->run() != FALSE) {
				if ($this->session->userdata('logged_in')) {
					$session_data = $this->session->userdata('logged_in');
					$this->solicitante_model->add_ticket();
					$num = $this->solicitante_model->get_num_ticket($session_data['usuario'],$this->input->post('titulo'));
					$dpto = $this->usuarios_model->get_departamento($session_data['usuario']);
					$query = $this->solicitante_model->get_all_ticket($session_data['usuario'],$num['id']);

					$data1 = array(
						//'mensaje'=>'Se registro correctamente el Incidente Nro: ',
						'titulo1' => 'Ticket',
						'usuario' => $session_data['usuario'],
						'departamento' => $dpto['departamento'],
						'numero' => $num['id'],

						'titulo' => $query['titulo'],
						'id' => $query['id'],
						'evaluacion' => $query['evaluacion'],
						'descripcion' => $query['descripcion'],
						'tipo' => $query['tipo'],
						'estado' => $query['estado'],
						'origen' => $query['origen'],
						'titular' => $query['titular'],
						'f_ingreso' => $query['f_ingreso'],
						'f_cierre' => $query['f_cierre'],
						'nivel' => $query['nivel'],
						'solucion' => $query['solucion'],
						'prioridad' => $query['prioridad'],
						'observaciones' => $query['observaciones'],
						't_requerido' => $query['t_requerido']
					);
					$this->load->view('solicitante/solicitante-show-ticket_view',$data1);
				}else{
					redirect(base_url().'usuarios/');
				}
			}else{
				if ($this->session->userdata('logged_in')) {
					$session_data = $this->session->userdata('logged_in');
					$dpto = $this->usuarios_model->get_departamento($session_data['usuario']);
					$data = array(
						'titulo' => 'Nuevo Ticket',
						'mensaje2' => 'Hubo un Error | Verifique el Formulario',
						'usuario' => $session_data['usuario'],
						'departamento' => $dpto['departamento']
					);
					$this->load->view('solicitante/new_ticket_view',$data);
				}else{
					redirect(base_url().'usuarios/');
				}
			}
		}else{
			if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$dpto = $this->usuarios_model->get_departamento($session_data['usuario']);
				$data = array(
					'usuario' => $session_data['usuario'],
					'titulo' => 'Nuevo Ticket',
					'usuario' => $session_data['usuario'],
					'departamento' => $dpto['departamento']
				);
				$this->load->view('solicitante/new_ticket_view',$data);
			}else{
				redirect(base_url().'usuarios/');
			}
		}
	}

	public function very_search()
	{
		if ($this->input->post('search_ticket')) {
			$this->form_validation->set_rules('numero','Numero de Incidente','required|callback_very_numero');

			$this->form_validation->set_message('required','<p class="text-warning">El campo  <b>%s</b>  es OBLIGATORIO.</p>');
			$this->form_validation->set_message('very_numero','<p class="text-warning">El  <b>%s</b>  NO EXISTE, por favor Verifique.</p>');
			
			if ($this->form_validation->run() != FALSE) {
				if ($this->session->userdata('logged_in')) {
					$session_data = $this->session->userdata('logged_in');
					$num = $this->input->post('numero');
					$query = $this->solicitante_model->get_all_ticket($session_data['usuario'],$num);

					$data1 = array(
						'titulo1' => 'Ticket',
						'usuario' => $session_data['usuario'],
						'numero' => $query['id'],

						'titulo' => $query['titulo'],
						'id' => $query['id'],
						'evaluacion' => $query['evaluacion'],
						'descripcion' => $query['descripcion'],
						'tipo' => $query['tipo'],
						'estado' => $query['estado'],
						'origen' => $query['origen'],
						'titular' => $query['titular'],
						'f_ingreso' => $query['f_ingreso'],
						'f_cierre' => $query['f_cierre'],
						'nivel' => $query['nivel'],
						'solucion' => $query['solucion'],
						'prioridad' => $query['prioridad'],
						'observaciones' => $query['observaciones'],
						't_requerido' => $query['t_requerido']
					);
					$this->load->view('solicitante/solicitante-show-ticket_view',$data1);
				}else{
					redirect(base_url().'usuarios/');
				}
			}else{
				if ($this->session->userdata('logged_in')) {
					$session_data = $this->session->userdata('logged_in');
					$data = array(
						'titulo' => 'HomePage',
						'usuario' => $session_data['usuario'],
						'mensaje' => 'Hubo un Error | Verifique el Formulario'
					);
					$this->load->view('solicitante/solicitante-home_view',$data);
				}else{
					redirect(base_url().'usuarios/');
				}
			}
		}else{
			redirect(base_url().'solicitante/');
		}
	}

	public function very_titulo($titulo)
	{
		$variable = $this->solicitante_model->very($titulo,'titulo');
		if ($variable == true) {
			return false;
		}else{
			return true;
		}
	}

	public function very_numero($numero)
	{
		$variable = $this->solicitante_model->very($numero,'id');
		if ($variable == true) {
			return true;
		}else{
			return false;
		}
	}

}

?>