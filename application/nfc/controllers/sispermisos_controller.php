<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sispermisos_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		$this->load->model('sispermisos_model');
		$this->load->model('perfiles_model');
		$this->config->load('sispermisos_settings');
		if($this->session->userdata('logged_in') == true) { 
			$data['flags'] = $this->basicauth->getPermissions('sispermisos');
			$this->flagR = $data['flags']['flag-read'];
			$this->flagI = $data['flags']['flag-insert'];
			$this->flagU = $data['flags']['flag-update'];
			$this->flagD = $data['flags']['flag-delete'];
			$this->flags = array('i'=>$this->flagI,'u'=>$this->flagU,'d'=>$this->flagD);
		}
	}

	function index()
	{
		//code here
		if($this->flagR){
			$data['flag'] = $this->flags;
			$data['subtitle'] = $this->config->item('recordListTitle');
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->sispermisos_model->getFieldsTable_m());
			$this->load->view('view/home_sispermisos', $data);
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
		$data = array();
		$data['subtitle'] = $this->config->item('recordAddTitle');
		
		$this->form_validation->set_rules('tabla', 'tabla', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('flag_read', 'flag_read', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('flag_insert', 'flag_insert', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('flag_update', 'flag_update', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('flag_delete', 'flag_delete', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('perfiles_id', 'perfiles_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('created_at', 'created_at', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run())
		{	
			$data_sispermisos  = array();
			if($this->input->post('tabla'))
				$data_sispermisos['tabla'] = $this->input->post('tabla');
			if($this->input->post('flag_read'))
				$data_sispermisos['flag_read'] = $this->input->post('flag_read');
			if($this->input->post('flag_insert'))
				$data_sispermisos['flag_insert'] = $this->input->post('flag_insert');
			if($this->input->post('flag_update'))
				$data_sispermisos['flag_update'] = $this->input->post('flag_update');
			if($this->input->post('flag_delete'))
				$data_sispermisos['flag_delete'] = $this->input->post('flag_delete');
			if($this->input->post('perfiles_id'))
				$data_sispermisos['perfiles_id'] = $this->input->post('perfiles_id');
			if($this->input->post('created_at'))
				$data_sispermisos['created_at'] = $this->basicrud->getFormatDateToBD($this->input->post('created_at'));
			if($this->input->post('updated_at'))
				$data_sispermisos['updated_at'] = $this->basicrud->getFormatDateToBD($this->input->post('updated_at'));

			$id_sispermisos = $this->sispermisos_model->add_m($data_sispermisos);
			if($id_sispermisos){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('flash_add_message')); 
				redirect('controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
				redirect('controller','location');
			}
		}
		$this->load->view('view/form_add_sispermisos',$data);

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for updating 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function edit_c($sispermisos_id)
	{
		//code here
		$data = array();
		$data['subtitle'] = $this->config->item('recordEditTitle');
		$data['sispermisos'] = $this->sispermisos_model->get_m(array('_id' => $sispermisos_id),$flag=1);
		$this->form_validation->set_rules('_id', '_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('tabla', 'tabla', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('flag_read', 'flag_read', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('flag_insert', 'flag_insert', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('flag_update', 'flag_update', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('flag_delete', 'flag_delete', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('perfiles_id', 'perfiles_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('created_at', 'created_at', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run()){
			$data_sispermisos  = array();
			if($this->input->post('_id'))
				$data_sispermisos['_id'] = $this->input->post('_id');
			if($this->input->post('tabla'))
				$data_sispermisos['tabla'] = $this->input->post('tabla');
			if($this->input->post('flag_read'))
				$data_sispermisos['flag_read'] = $this->input->post('flag_read');
			if($this->input->post('flag_insert'))
				$data_sispermisos['flag_insert'] = $this->input->post('flag_insert');
			if($this->input->post('flag_update'))
				$data_sispermisos['flag_update'] = $this->input->post('flag_update');
			if($this->input->post('flag_delete'))
				$data_sispermisos['flag_delete'] = $this->input->post('flag_delete');
			if($this->input->post('perfiles_id'))
				$data_sispermisos['perfiles_id'] = $this->input->post('perfiles_id');
			if($this->input->post('created_at'))
				$data_sispermisos['created_at'] = $this->basicrud->getFormatDateToBD($this->input->post('created_at'));
			if($this->input->post('updated_at'))
				$data_sispermisos['updated_at'] = $this->basicrud->getFormatDateToBD($this->input->post('updated_at'));

			if($this->sispermisos_model->edit_m($data_sispermisos)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('flash_edit_message')); 
				redirect('controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
				redirect('controller','location');
			}
		}
		$this->load->view('view/form_edit_sispermisos',$data);

	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $sispermisos_id id of record
	 * @return void
	 */
	function delete_c($sispermisos_id)
	{
		//code here
		if($this->sispermisos_model->delete_m($sispermisos_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('flash_delete_message')); 
			redirect('controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('flash_error_delete_message')); 
			redirect('controller','location');
		}

	}

	function search_c($offset = 0)
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_sispermisos  = array();
		$data_search_pagination  = array();
		$flag = 0;
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->sispermisos_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '')
				{ 
					$data_search_sispermisos[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}
			
			$data_search_pagination['count'] = true;
			$data_search_sispermisos['limit'] = $this->config->item('pag_perpage');
			$data_search_sispermisos['offset'] = $offset;
			$data_search_sispermisos['sortBy'] = '_id';
			$data_search_sispermisos['sortDirection'] = 'asc';

			if($flag==1){
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
				$data['sispermisos'] = $this->sispermisos_model->get_m($data_search_sispermisos);
			}else{
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
				$data['sispermisos'] = $this->sispermisos_model->get_m($data_search_sispermisos);
			}
					
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->sispermisos_model->getFieldsTable_m());
			$data['flag'] = $this->flags;
			$this->load->view('view/record_list_sispermisos',$data);
		}

	}

}
