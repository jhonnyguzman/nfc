<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sismenu_Model extends CI_Model {

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
		$this->db->insert('sismenu', $options);
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
		if(isset($options['descripcion']))
			$this->db->set('descripcion', $options['descripcion']);
		if(isset($options['estado']))
			$this->db->set('estado', $options['estado']);
		if(isset($options['parent']))
			$this->db->set('parent', $options['parent']);
		if(isset($options['iconpath']))
			$this->db->set('iconpath', $options['iconpath']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);

		$this->db->where('_id', $options['_id']);

		$this->db->update('sismenu');

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
		$this->db->delete('sismenu');
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
			$this->db->where('sm._id', $options['_id']);
		if(isset($options['descripcion']))
			$this->db->like('sm.descripcion', $options['descripcion']);
		if(isset($options['estado']))
			$this->db->where('sm.estado', $options['estado']);
		if(isset($options['parent']))
			$this->db->where('sm.parent', $options['parent']);
		if(isset($options['iconpath']))
			$this->db->where('sm.iconpath', $options['iconpath']);
		if(isset($options['created_at']))
			$this->db->where('sm.created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('sm.updated_at', $options['updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select('sm._id, sm.descripcion, sm.estado, sm.parent, sm.iconpath, sm.created_at, sv.link');
		$this->db->from('sismenu as sm');
		$this->db->join('sisvinculos as sv', 'sm._id = sv.sismenu_id');
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
		$fields[]='descripcion';
		$fields[]='estado';
		$fields[]='parent';
		$fields[]='iconpath';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}
