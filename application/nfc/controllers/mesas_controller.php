<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mesas_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('mesas_model');
			$this->load->model('tabgral_model');
			$this->config->load('mesas_settings');
			$data['flags'] = $this->basicauth->getPermissions('mesas');
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
			$data['title_header'] = $this->config->item('recordListTitle');
			$this->load->view('mesas_view/home_mesas', $data);
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
		$data['title_header'] = $this->config->item('recordAddTitle');
		
		$this->form_validation->set_rules('estado', 'estado', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|alpha_numeric|xss_clean');

		if($this->form_validation->run())
		{	
			$data_mesas  = array();
			$data_mesas['estado'] = $this->input->post('estado');
			$data_mesas['descripcion'] = $this->input->post('descripcion');
			$data_mesas['updated_at'] = $this->basicrud->formatDateToBD();

			$id_mesas = $this->mesas_model->add_m($data_mesas);
			if($id_mesas){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('mesas_flash_add_message')); 
				redirect('mesas_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('mesas_flash_error_message')); 
				redirect('mesas_controller','location');
			}
		}else{
			$data['estados'] = $this->tabgral_model->get_m(array('grupos_tabgral_id' => 2)); //obtener todos los estados de mesas
			$this->load->view('mesas_view/form_add_mesas',$data);	
		}
		

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
		$data['title_header'] = $this->config->item('recordEditTitle');
		$data['mesas'] = $this->mesas_model->get_m(array('_id' => $_id),$flag=1);
		
		$this->form_validation->set_rules('_id', '_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|alpha_numeric|xss_clean');

		if($this->form_validation->run()){
			$data_mesas  = array();
			$data_mesas['_id'] = $this->input->post('_id');
			$data_mesas['estado'] = $this->input->post('estado');
			$data_mesas['descripcion'] = $this->input->post('descripcion');
			$data_mesas['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->mesas_model->edit_m($data_mesas)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('mesas_flash_edit_message')); 
				redirect('mesas_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('mesas_flash_error_message')); 
				redirect('mesas_controller','location');
			}
		}else{
			$data['estados'] = $this->tabgral_model->get_m(array('grupos_tabgral_id' => 2)); //obtener todos los estados de mesas
			$this->load->view('mesas_view/form_edit_mesas',$data);
		}

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

		if($this->mesas_model->delete_m($_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('mesas_flash_delete_message')); 
			redirect('mesas_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('mesas_flash_error_delete_message')); 
			redirect('mesas_controller','location');
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
		$data_search_mesas = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->mesas_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_mesas[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_mesas['limit'] = $this->config->item('pag_perpage');
			$data_search_mesas['offset'] = $offset;
			$data_search_mesas['sortBy'] = '_id';
			$data_search_mesas['sortDirection'] = 'asc';
	
			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'mesas_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['mesas'] = $this->mesas_model->get_m($data_search_mesas);
		
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->mesas_model->getFieldsTable_m());
			$data['flag'] = $this->flags;
			$this->load->view('mesas_view/record_list_mesas',$data);

		}

	}

}