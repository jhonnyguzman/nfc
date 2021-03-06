<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ordenes_Model extends CI_Model {

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
		$this->db->insert('ordenes', $options);
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
		if(isset($options['opmenu_id']))
			$this->db->set('opmenu_id', $options['opmenu_id']);
		if(isset($options['cantidad']))
			$this->db->set('cantidad', $options['cantidad']);
		if(isset($options['montotal']))
			$this->db->set('montotal', $options['montotal']);
		if(isset($options['observacion']))
			$this->db->set('observacion', $options['observacion']);
		if(isset($options['estado']))
			$this->db->set('estado', $options['estado']);
		if(isset($options['mesas_id']))
			$this->db->set('mesas_id', $options['mesas_id']);
		if(isset($options['created_at']))
			$this->db->set('created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->set('updated_at', $options['updated_at']);

		$this->db->where('_id', $options['_id']);

		$this->db->update('ordenes');

		if($this->db->affected_rows()>0) return $this->db->affected_rows();
		else return $this->db->affected_rows() + 1;
	}


	/**
	 * This function deleting the data in the db
	 *
	 * @access public
	 * @param  integer $_id primary key of record
	 * @return integer  affected rows
	 */
	function delete_m($_id)
	{
		//code here
		$this->db->where('_id', $_id);
		$this->db->delete('ordenes');
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
			$this->db->where('o._id', $options['_id']);
		if(isset($options['opmenu_id']))
			$this->db->where('o.opmenu_id', $options['opmenu_id']);
		if(isset($options['cantidad']))
			$this->db->where('o.cantidad', $options['cantidad']);
		if(isset($options['montotal']))
			$this->db->where('o.montotal', $options['montotal']);
		if(isset($options['observacion']))
			$this->db->like('o.observacion', $options['observacion']);
		if(isset($options['estado']))
			$this->db->where('o.estado', $options['estado']);
		if(isset($options['mesas_id']))
			$this->db->where('o.mesas_id', $options['mesas_id']);
		if(isset($options['created_at']))
			$this->db->where('o.created_at', $options['created_at']);
		if(isset($options['updated_at']))
			$this->db->where('o.updated_at', $options['updated_at']);

		//limit / offset
		if(isset($options['limit']) && isset($options['offset']))
			$this->db->limit($options['limit'],$options['offset']);
		else if(isset($options['limit']))
			$this->db->limit($options['limit']);

		//sort
		if(isset($options['sortBy']) && isset($options['sortDirection']))
			$this->db->order_by($options['sortBy'],$options['sortDirection']);

		$this->db->select('o.*, m.descripcion as mesas_descripcion, op.nombre as opmenu_nombre, op.precio as opmenu_precio,
		 tg.descripcion as estado_descripcion');
		$this->db->from('ordenes as o');
		$this->db->join('mesas as m','m._id = o.mesas_id');
		$this->db->join('opmenu as op','op._id = o.opmenu_id');
		$this->db->join('tabgral as tg','tg._id = o.estado');
		$query = $this->db->get();

		if(isset($options['count'])) return $query->num_rows();

		//format field of type date if it exist for human 
		if($query->num_rows()>0){ 
			if(isset($options['_id']) && $flag==1){
				$query->row(0)->created_at = $this->basicrud->timesince($query->row(0)->created_at);
				$query->row(0)->updated_at = $this->basicrud->timesince($query->row(0)->updated_at);
				return $query->row(0);
			}else{
				foreach($query->result() as $row){ 
					$row->created_at = $this->basicrud->timesince($row->created_at);
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
		$fields[]='opmenu_id';
		$fields[]='opmenu_nombre';
		$fields[]='opmenu_precio';
		$fields[]='cantidad';
		$fields[]='montotal';
		$fields[]='observacion';
		$fields[]='estado';
		$fields[]='estado_descripcion';
		$fields[]='mesas_id';
		$fields[]='mesas_descripcion';
		$fields[]='created_at';
		$fields[]='updated_at';
		return $fields;
	}

}