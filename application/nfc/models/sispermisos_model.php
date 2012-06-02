<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sispermisos_Model extends CI_Model {

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
		$this->db->insert('sispermisos', $options);
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
		if(isset($options['tabla']))
			$this->db->set('tabla', $options['tabla']);
		if(isset($options['flag_read']))
			$this->db->set('flag_read', $options['flag_read']);
		if(isset($options['flag_insert']))
			$this->db->set('flag_insert', $options['flag_insert']);
		if(isset($options['flag_update']))
			$this->db->set('flag_update', $options['flag_update']);
		if(isset($options['flag_delete']))
			$this->db->set('flag_delete', $options['flag_delete']);
		if(isset($options['perfiles_id']))
			$this->db->set('perfiles_id', $options['perfiles_id']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);

		$this->db->where('_id', $options['_id']);

		$this->db->update('sispermisos');

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
		$this->db->delete('sispermisos');
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
			$this->db->where('_id', $options['_id']);
		if(isset($options['tabla']))
			$this->db->like('tabla', $options['tabla']);
		if(isset($options['flag_read']))
			$this->db->where('flag_read', $options['flag_read']);
		if(isset($options['flag_insert']))
			$this->db->where('flag_insert', $options['flag_insert']);
		if(isset($options['flag_update']))
			$this->db->where('flag_update', $options['flag_update']);
		if(isset($options['flag_delete']))
			$this->db->where('flag_delete', $options['flag_delete']);
		if(isset($options['perfiles_id']))
			$this->db->where('perfiles_id', $options['perfiles_id']);
		if(isset($options['created_at']))
			$this->db->where('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('updated_at', $options['updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$query = $this->db->get('sispermisos');

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
		$fields[]='tabla';
		$fields[]='flag_read';
		$fields[]='flag_insert';
		$fields[]='flag_update';
		$fields[]='flag_delete';
		$fields[]='perfiles_id';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}
