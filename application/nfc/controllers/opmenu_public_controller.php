<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Opmenu_Public_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('opmenu_model');
		$this->load->model('categorias_model');
		$this->config->load('opmenu_settings');
	}


	/**
	 * This function show a record of opmenu and sends the data to the view
	 * to shows the found result
	 *
	 * @access public
	 * @return void
	 */
	function show()
	{
		$data['opmenu'] = $this->opmenu_model->get_m(array('categorias_id' => $categorias_id, '_id' => $_id),1);
		$data['categoria'] = $this->categorias_model->get_m(array('_id' => $categorias_id),1);
		$this->load->view('opmenu_view/form_show_opmenu_public',$data);
	}


	/**
	 * This function filter and sends the data to the view
	 * to shows the found result
	 *
	 * @access public
	 * @return void
	 */
	function search($categorias_id)
	{
		//code here
		$data = array(); 
		$data_search_opmenu = array(); 
		$data['title_header'] = 'Categorias';

		$data_search_opmenu['categorias_id'] = $categorias_id;
		$data_search_opmenu['sortBy'] = '_id';
		$data_search_opmenu['sortDirection'] = 'asc';

		$data['opmenu'] = $this->opmenu_model->get_m($data_search_opmenu);
		$data['categoria'] = $this->categorias_model->get_m(array('_id' => $categorias_id),1);
		$this->load->view('opmenu_view/record_list_opmenu_public',$data);
		

	}



	
}