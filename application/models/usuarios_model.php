<?php

class Usuarios_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function very($variable,$campo)
	{
		$consulta = $this->db->get_where('usuarios',array($campo=>$variable));
		if ($consulta->num_rows() == 1) {
			return true;
		}else{
			return false;
		}
	}

	public function add_user()
	{
		$this->db->insert('usuarios',array(
				'nombre'=>$this->input->post('nombre',TRUE),
				'apellido'=>$this->input->post('apellido',TRUE),
				'cedula'=>$this->input->post('cedula',TRUE),
				'correo'=>$this->input->post('correo',TRUE),
				'telefono'=>$this->input->post('telefono',TRUE),
				'usuario'=>$this->input->post('usuario',TRUE),
				'pass'=>$this->input->post('pass',TRUE),
				'departamento'=>$this->input->post('departamento',TRUE),
				'cargo'=>$this->input->post('cargo',TRUE),
				'tipo'=>$this->input->post('tipo',TRUE),
				'estado'=>'Activo'
		));
	}

	public function very_sesion()
	{
		$consulta = $this->db->get_where('usuarios',array(
			'usuario'=>$this->input->post('usuario',TRUE),
			'pass'=>$this->input->post('pass',TRUE)
		));

		if ($consulta->num_rows() == 1) {
			return true;
		}else{
			return false;
		}
	}

	public function get_tipo_usuario($user)
	{
		$this->db->select('tipo')->from('usuarios')->where('usuario',$user);
		$consulta = $this->db->get();
        if($consulta->num_rows() > 0 )
        {
            return $consulta->result();
        }
	}
}