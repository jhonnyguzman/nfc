<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mesas_model');
		$this->load->model('categorias_model');
		$this->load->model('opmenu_model');
	}

	/**
	 *  
	*/
	function getMesas()
	{
		$mesas = array();
		$mesas = $this->mesas_model->get_m();
		print(json_encode($mesas));

	}

	/**
	 *  
	*/
	function getCategorias()
	{
		$categorias = array();
		$categorias = $this->categorias_model->get_m();
		print(json_encode($categorias));

	}

	/**
	 *  
	*/
	function getOpmenus()
	{
		$opmenus = array();
		$opmenus = $this->opmenu_model->get_m();
		print(json_encode($opmenus));

	}
}