<?php

class Solicitante_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_num_ticket($user, $titulo)
	{
		$this->db->select('id');
		$this->db->from('ticket');
		$this->db->where('titular',$user);
		$this->db->where('titulo',$titulo);

		$consulta = $this->db->get();

        if ($consulta->num_rows() == 1 ) {
            return $consulta->row_array();
        }

        return null;
	}

	public function get_all_ticket($user, $num) {
		$this->db->select('id, descripcion, tipo, estado, titulo, titular, nivel, prioridad, origen, f_ingreso, solucion, observaciones, t_requerido, f_cierre, evaluacion');
		$this->db->from('ticket');
		$this->db->where('titular',$user);
		$this->db->where('id',$num);

		$consulta = $this->db->get();
		
		if ($consulta->num_rows() > 0 ) {
            return $consulta->row_array();
        }

        return null;
	}

	public function add_ticket()
	{
		$this->db->insert('ticket',array(
				'titulo'=>$this->input->post('titulo',TRUE),
				'titular'=>$this->input->post('usuario',TRUE),
				'descripcion'=>$this->input->post('descripcion',TRUE),
				'tipo'=>$this->input->post('tipo',TRUE),
				'nivel'=>$this->input->post('nivel',TRUE),
				'prioridad'=>$this->input->post('prioridad',TRUE),
				'origen'=>$this->input->post('departamento',TRUE),
				'estado'=>'Espera',
				'f_ingreso' =>$this->input->post('f_ingreso',TRUE)
		));
	}

	public function very($variable,$campo)
	{
		$consulta = $this->db->get_where('ticket',array($campo=>$variable));
		if ($consulta->num_rows() == 1) {
			return true;
		}else{
			return false;
		}
	}
}