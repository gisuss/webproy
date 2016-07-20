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

	public function update_user($user)
	{
		$data = array(
				'nombre'=>$this->input->post('nombre'),
				'apellido'=>$this->input->post('apellido'),
				'cedula'=>$this->input->post('cedula'),
				'correo'=>$this->input->post('correo'),
				'telefono'=>$this->input->post('telefono'),
				'usuario'=>$this->input->post('usuario'),
				'pass'=>$this->input->post('pass'),
				'departamento'=>$this->input->post('departamento'),
				'cargo'=>$this->input->post('cargo'),
				'tipo'=>$this->input->post('tipo'),
				'estado'=>$this->input->post('estado')
		);

		$this->db->where('usuario',$user);
		$this->db->update('usuarios',$data);
	}

	public function delete_user($user)
	{
		$this->db->where('usuario', $user);
   		$this->db->delete('usuarios');
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

	public function very_estado()
	{
		$consulta = $this->db->get_where('usuarios',array(
			'usuario' => $this->input->post('usuario',TRUE),
			'pass' => $this->input->post('pass',TRUE),
			'estado' => 'Activo'
		));

		if ($consulta->num_rows() == 1) {
			return true;
		}else{
			return false;
		}
	}

	public function get_tipo_usuario($user)
	{
		$this->db->select('tipo');
		$this->db->from('usuarios');
		$this->db->where('usuario',$user);

		$consulta = $this->db->get();

        if ($consulta->num_rows() == 1 ) {
            return $consulta->row_array();
        }

        return null;
	}

	public function get_departamento($user)
	{
		$this->db->select('departamento');
		$this->db->from('usuarios');
		$this->db->where('usuario',$user);

		$consulta = $this->db->get();

        if ($consulta->num_rows() == 1 ) {
            return $consulta->row_array();
        }

        return null;
	}

	public function get_all_user($user) {
		$this->db->select('nombre, apellido, tipo, estado, cedula, correo, telefono, cargo, departamento, usuario, pass');
		$this->db->from('usuarios');
		$this->db->where('usuario',$user);

		$consulta = $this->db->get();
		
		if ($consulta->num_rows() > 0 ) {
            return $consulta->row_array();
        }

        return null;
	}
}