<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sismenu_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		$this->load->model('sismenu_model');
		$this->load->model('sisvinculos_model');
		$this->load->model('tabgral_model');
		$this->config->load('sismenu_settings');
		$data['flags'] = $this->basicauth->getPermissions('sismenu');
		$this->flagR = $data['flags']['flag-read'];
		$this->flagI = $data['flags']['flag-insert'];
		$this->flagU = $data['flags']['flag-update'];
		$this->flagD = $data['flags']['flag-delete'];
		$this->flags = array('i'=>$this->flagI,'u'=>$this->flagU,'d'=>$this->flagD);
	}

	function index()
	{
		//code here
		if($this->flagR){
			$data['subtitle'] = $this->config->item('recordListTitle');
			$data['flag'] = $this->flags;
			$data['fieldSearch'] = $this->basicrud->getFieldSearch($this->sismenu_model->getFieldsTable_m());
			$this->load->view('view/home_sismenu', $data);
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
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('parent', 'parent', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('created_at', 'created_at', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('sisvinculos_link', 'sisvinculos_link', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run())
		{	
			$data_sismenu  = array();
			$data_sismenu['descripcion'] = $this->input->post('descripcion');
			$data_sismenu['estado'] = $this->input->post('estado');
			if($this->input->post('parent'))
				$data_sismenu['parent'] = $this->input->post('parent');
			if($this->input->post('iconpath'))
				$data_sismenu['iconpath'] = $this->input->post('iconpath');
			$data_sismenu['updated_at'] = $this->basicrud->getFormatDateToBD($this->input->post('updated_at'));

			$id_sismenu = $this->sismenu_model->add_m($data_sismenu);
			if($id_sismenu){ 
				$id_sisvinculos = $this->sisvinculos_model->add_m(array('id'=>$id_sismenu,'sisvinculos_link'=>$this->input->post('sisvinculos_link'))); 
				if($id_sisvinculos){ 
					$this->session->set_flashdata('flashConfirm', $this->config->item('flash_add_message')); 
					redirect('controller','location');
				}else{ 
					$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
					redirect('controller','location');
				}
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
				redirect('controller','location');
			}
		}
		$this->load->view('view/form_add_sismenu',$data);

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for updating 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function edit_c($sismenu_id)
	{
		//code here
		$data = array();
		$data['subtitle'] = $this->config->item('recordEditTitle');
		$data['sismenu'] = $this->sismenu_model->get_m(array('_id' => $sismenu_id),$flag=1);
		$this->form_validation->set_rules('_id', '_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('parent', 'parent', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('created_at', 'created_at', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('sisvinculos_link', 'sisvinculos_link', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run()){
			$data_sismenu  = array();
			$data_sismenu['_id'] = $this->input->post('_id');
			$data_sismenu['descripcion'] = $this->input->post('descripcion');
			if($this->input->post('estado'))
				$data_sismenu['estado'] = $this->input->post('estado');
			if($this->input->post('parent'))
				$data_sismenu['parent'] = $this->input->post('parent');
			if($this->input->post('iconpath'))
				$data_sismenu['iconpath'] = $this->input->post('iconpath');
			
			$data_sismenu['updated_at'] = $this->basicrud->getFormatDateToBD($this->input->post('updated_at'));

			if($this->sismenu_model->edit_m($data_sismenu)){ 
				if($this->sisvinculos_model->edit_m(array('sismenu_id'=>$this->input->post('_id'),'link'=>$this->input->post('link')))){ 
					$this->session->set_flashdata('flashConfirm', $this->config->item('flash_edit_message')); 
					redirect('controller','location');
				}else{
					$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
					redirect('controller','location');
				}
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
				redirect('controller','location');
			}
		}
		$this->load->view('view/form_edit_sismenu',$data);

	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $sismenu_id id of record
	 * @return void
	 */
	function delete_c($sismenu_id)
	{
		//code here
		if($this->sismenu_model->delete_m($sismenu_id)){ 
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
		$data_search_sismenu  = array();
		$data_search_pagination  = array();
		$flag = 0;
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->sismenu_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '')
				{ 
					$data_search_sismenu[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}
			
			$data_search_pagination['count'] = true;
			$data_search_sismenu['limit'] = $this->config->item('pag_perpage');
			$data_search_sismenu['offset'] = $offset;
			$data_search_sismenu['sortBy'] = '_id';
			$data_search_sismenu['sortDirection'] = 'asc';

			if($flag==1){
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
				$data['sismenu'] = $this->sismenu_model->get_m($data_search_sismenu);
			}else{
				$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
				$data['sismenu'] = $this->sismenu_model->get_m($data_search_sismenu);
			}
					
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->sismenu_model->getFieldsTable_m());
			$data['flag'] = $this->flags;
			$this->load->view('view/record_list_sismenu',$data);
		}

	}

}
