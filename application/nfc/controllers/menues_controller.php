<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menues_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('menues_model');
			$this->config->load('menues_settings');
			$data['flags'] = $this->basicauth->getPermissions('menues');
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
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->menues_model->getFieldsTable_m());
			$this->load->view('menues_view/home_menues', $data);
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
		if($this->form_validation->run())
		{	
			$data_menues  = array();

			$id_menues = $this->menues_model->add_m($data_menues);
			if($id_menues){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('menues_flash_add_message')); 
				redirect('menues_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('menues_flash_error_message')); 
				redirect('menues_controller','location');
			}
		}
		$this->load->view('menues_view/form_add_menues',$data);

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
		$data['menues'] = $this->menues_model->get_m(array('_id' => $_id),$flag=1);
		$this->form_validation->set_rules('_id', '_id', 'trim|integer|xss_clean');
		if($this->form_validation->run()){
			$data_menues  = array();
			$data_menues['_id'] = $this->input->post('_id');

			if($this->menues_model->edit_m($data_menues)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('menues_flash_edit_message')); 
				redirect('menues_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('menues_flash_error_message')); 
				redirect('menues_controller','location');
			}
		}
		$this->load->view('menues_view/form_edit_menues',$data);

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

		if($this->menues_model->delete_m($_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('menues_flash_delete_message')); 
			redirect('menues_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('menues_flash_error_delete_message')); 
			redirect('menues_controller','location');
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
		$data_search_menues = array(); 
		$data_search_pagination = array(); 
		$flag = 0; 
		$data['flag'] = $this->flags;
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->menues_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_menues[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_menues['limit'] = $this->config->item('pag_perpage');
			$data_search_menues['offset'] = $offset;
			$data_search_menues['sortBy'] = 'menues_id';
			$data_search_menues['sortDirection'] = 'asc';

			if($flag==1){
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'menues_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
				$data['menues'] = $this->menues_model->get_m($data_search_menues);
			}else{
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'menues_model','perpage'=>$this->config->item('pag_perpage'),$data_search_pagination));
				$data['menues'] = $this->menues_model->get_m($data_search_menues);
			}
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->menues_model->getFieldsTable_m());
			$this->load->view('menues_view/record_list_menues',$data);
		}

	}

}