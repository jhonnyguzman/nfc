<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_Model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}


	/**
	 * This function saving the data in the db
	 *
	 * @access public
	 * @param array fields of the table
	 * @return integer  affected rows
	 */
	function add_m($options = array())
	{
		//code here
		$this->db->insert('usuarios', $options);
		return $this->db->insert_id();
	}


	/**
	 * This function editing the data in the db
	 *
	 * @access public
	 * @param array fields of the table
	 * @return integer  affected rows
	 */
	function edit_m($options = array())
	{
		//code here
		if(isset($options['username']))
			$this->db->set('username', $options['username']);
		if(isset($options['password']))
			$this->db->set('password', $options['password']);
		if(isset($options['nombre']))
			$this->db->set('nombre', $options['nombre']);
		if(isset($options['apellido']))
			$this->db->set('apellido', $options['apellido']);
		if(isset($options['email']))
			$this->db->set('email', $options['email']);
		if(isset($options['direccion']))
			$this->db->set('direccion', $options['direccion']);
		if(isset($options['telefono']))
			$this->db->set('telefono', $options['telefono']);
		if(isset($options['estado']))
			$this->db->set('estado', $options['estado']);
		if(isset($options['legajo']))
			$this->db->set('legajo', $options['legajo']);
		if(isset($options['perfiles_id']))
			$this->db->set('perfiles_id', $options['perfiles_id']);
		if(isset($options['activationcode']))
			$this->db->set('activationcode', $options['activationcode']);
		if(isset($options['tokenforgotpasswd']))
			$this->db->set('tokenforgotpasswd', $options['tokenforgotpasswd']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);

		$this->db->where('_id', $options['_id']);

		$this->db->update('usuarios');

		if($this->db->affected_rows()>0) return $this->db->affected_rows();
		else return $this->db->affected_rows() + 1;
	}


	/**
	 * This function deleting the data in the db
	 *
	 * @access public
	 * @param  integer $id primary key of record
	 * @return integer  affected rows
	 */
	function delete_m($id)
	{
		//code here
		$this->db->where('_id', $id);
		$this->db->delete('usuarios');
		return $this->db->affected_rows();
	}


	/**
	 * This function get the data of the db
	 *
	 * @access public
	 * @param array fields of the table
	 * @param integer	flag to indicate if return one record or more of one record
	 * @return array  result
	 */
	function get_m($options = array(),$flag=0)
	{
		//code here
		if(isset($options['_id']))
			$this->db->where('u._id', $options['_id']);
		if(isset($options['username']))
			$this->db->like('u.username', $options['username']);
		if(isset($options['password']))
			$this->db->like('u.password', $options['password']);
		if(isset($options['nombre']))
			$this->db->like('u.nombre', $options['nombre']);
		if(isset($options['apellido']))
			$this->db->like('u.apellido', $options['apellido']);
		if(isset($options['email']))
			$this->db->like('u.email', $options['email']);
		if(isset($options['direccion']))
			$this->db->like('u.direccion', $options['direccion']);
		if(isset($options['telefono']))
			$this->db->like('u.telefono', $options['telefono']);
		if(isset($options['estado']))
			$this->db->where('u.estado', $options['estado']);
		if(isset($options['legajo']))
			$this->db->where('u.legajo', $options['legajo']);
		if(isset($options['perfiles_id']))
			$this->db->where('u.perfiles_id', $options['perfiles_id']);
		if(isset($options['activationcode']))
			$this->db->like('u.activationcode', $options['activationcode']);
		if(isset($options['tokenforgotpasswd']))
			$this->db->like('u.tokenforgotpasswd', $options['tokenforgotpasswd']);
		if(isset($options['created_at']))
			$this->db->where('u.created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('u.updated_at', $options['updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);
		
		$this->db->select("u.*, p.descripcion as perfiles_descripcion, tg.descripcion as estado_descripcion");
		$this->db->from("usuarios as u");
		$this->db->join("perfiles as p","p._id = u.perfiles_id");
		$this->db->join("tabgral as tg","tg._id = u.estado");
		$query = $this->db->get();

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['_id']) && $flag==1){
				$query->row(0)->created_at = $this->basicrud->formatDateToHuman($query->row(0)->created_at);
				$query->row(0)->updated_at = $this->basicrud->formatDateToHuman($query->row(0)->updated_at);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->created_at = $this->basicrud->formatDateToHuman($row->created_at);
					$row->updated_at = $this->basicrud->formatDateToHuman($row->updated_at);
				}
				return $query->result();
			}
		}

	}


	/**
	 * This function getting all the fields of the table
	 *
	 * @access public
	 * @return array  fields of table
	 */
	function getFieldsTable_m()
	{
		//code here
		$fields=array();
		$fields[]='_id';
		$fields[]='username';
		$fields[]='password';
		$fields[]='nombre';
		$fields[]='apellido';
		$fields[]='email';
		$fields[]='direccion';
		$fields[]='telefono';
		$fields[]='estado';
		$fields[]='estado_descripcion';
		$fields[]='legajo';
		$fields[]='perfiles_id';
		$fields[]='perfiles_descripcion';
		$fields[]='activationcode';
		$fields[]='tokenforgotpasswd';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}
