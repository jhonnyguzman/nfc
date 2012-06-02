<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ordenes_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('ordenes_model');
			$this->config->load('ordenes_settings');
			$data['flags'] = $this->basicauth->getPermissions('ordenes');
			$this->flagR = $data['flags']['flag-read'];
			$this->flagI = $data['flags']['flag-insert'];
			$this->flagU = $data['flags']['flag-update'];
			$this->flagD = $data['flags']['flag-delete'];
			$this->flags = array('r'=>$this->flagR,'i'=>$this->flagI,'u'=>$this->flagU,'d'=>$this->flagD);
		}
	}

	function index()
	{
		//code here
		if($this->flagR){
			$data['flag'] = $this->flags;
			$data['subtitle'] = $this->config->item('recordListTitle');
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->ordenes_model->getFieldsTable_m());
			$this->load->view('ordenes_view/home_ordenes', $data);
			$this->search_c();
		}

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for saving 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function add_c()
	{
		//code here
		if(!$this->flagI){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['subtitle'] = $this->config->item('recordAddTitle');
		$this->form_validation->set_rules('_id', '_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('opmenu_id', 'opmenu_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('cantidad', 'cantidad', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('montotal', 'montotal', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('observacion', 'observacion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('mesas_id', 'mesas_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('created_at', 'created_at', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('updated_at', 'updated_at', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run())
		{	
			$data_ordenes  = array();
			$data_ordenes['opmenu_id'] = $this->input->post('opmenu_id');
			$data_ordenes['cantidad'] = $this->input->post('cantidad');
			$data_ordenes['montotal'] = $this->input->post('montotal');
			$data_ordenes['observacion'] = $this->input->post('observacion');
			$data_ordenes['estado'] = $this->input->post('estado');
			$data_ordenes['mesas_id'] = $this->input->post('mesas_id');
			$data_ordenes['created_at'] = $this->basicrud->getFormatDateToBD($this->input->post('created_at'));
			$data_ordenes['updated_at'] = $this->basicrud->getFormatDateToBD($this->input->post('updated_at'));

			$id_ordenes = $this->ordenes_model->add_m($data_ordenes);
			if($id_ordenes){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('ordenes_flash_add_message')); 
				redirect('ordenes_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('ordenes_flash_error_message')); 
				redirect('ordenes_controller','location');
			}
		}
		$this->load->view('ordenes_view/form_add_ordenes',$data);

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for updating 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function edit_c($_id)
	{
		//code here
		if(!$this->flagU){
			echo $this->config->item('accessTitle');
			exit();
		}

		$data = array();
		$data['subtitle'] = $this->config->item('recordEditTitle');
		$data['ordenes'] = $this->ordenes_model->get_m(array('_id' => $_id),$flag=1);
		$this->form_validation->set_rules('_id', '_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('opmenu_id', 'opmenu_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('cantidad', 'cantidad', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('montotal', 'montotal', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('observacion', 'observacion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('mesas_id', 'mesas_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('created_at', 'created_at', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('updated_at', 'updated_at', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run()){
			$data_ordenes  = array();
			$data_ordenes['_id'] = $this->input->post('_id');
			$data_ordenes['opmenu_id'] = $this->input->post('opmenu_id');
			$data_ordenes['cantidad'] = $this->input->post('cantidad');
			$data_ordenes['montotal'] = $this->input->post('montotal');
			$data_ordenes['observacion'] = $this->input->post('observacion');
			$data_ordenes['estado'] = $this->input->post('estado');
			$data_ordenes['mesas_id'] = $this->input->post('mesas_id');
			$data_ordenes['created_at'] = $this->basicrud->getFormatDateToBD($this->input->post('created_at'));
			$data_ordenes['updated_at'] = $this->basicrud->getFormatDateToBD($this->input->post('updated_at'));

			if($this->ordenes_model->edit_m($data_ordenes)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('ordenes_flash_edit_message')); 
				redirect('ordenes_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('ordenes_flash_error_message')); 
				redirect('ordenes_controller','location');
			}
		}
		$this->load->view('ordenes_view/form_edit_ordenes',$data);

	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $_id id of record
	 * @return void
	 */
	function delete_c($_id)
	{
		//code here
		if(!$this->flagD){
			echo $this->config->item('accessTitle');
			exit();
		}

		if($this->ordenes_model->delete_m($_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('ordenes_flash_delete_message')); 
			redirect('ordenes_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('ordenes_flash_error_delete_message')); 
			redirect('ordenes_controller','location');
		}

	}


	/**
	 * This function filter and sends the data to the view
	 * to shows the found result
	 *
	 * @access public
	 * @return void
	 */
	function search_c($offset = 0)
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_ordenes = array(); 
		$data_search_pagination = array(); 
		$flag = 0; 
		$data['flag'] = $this->flags;
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->ordenes_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_ordenes[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_ordenes['limit'] = $this->config->item('pag_perpage');
			$data_search_ordenes['offset'] = $offset;
			$data_search_ordenes['sortBy'] = 'ordenes_id';
			$data_search_ordenes['sortDirection'] = 'asc';

			if($flag==1){
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'ordenes_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
				$data['ordenes'] = $this->ordenes_model->get_m($data_search_ordenes);
			}else{
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'ordenes_model','perpage'=>$this->config->item('pag_perpage'),$data_search_pagination));
				$data['ordenes'] = $this->ordenes_model->get_m($data_search_ordenes);
			}
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->ordenes_model->getFieldsTable_m());
			$this->load->view('ordenes_view/record_list_ordenes',$data);
		}

	}

}