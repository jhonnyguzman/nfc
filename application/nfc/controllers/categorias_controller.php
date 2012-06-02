<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('categorias_model');
			$this->config->load('categorias_settings');
			$data['flags'] = $this->basicauth->getPermissions('categorias');
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
			$this->load->view('categorias_view/home_categorias', $data);
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
		
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|alpha_numeric|xss_clean');

		if($this->form_validation->run())
		{	
			$data_categorias  = array();
			$data_categorias['descripcion'] = $this->input->post('descripcion');
			$data_categorias['updated_at'] = $this->basicrud->formatDateToBD();

			$id_categorias = $this->categorias_model->add_m($data_categorias);
			if($id_categorias){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('categorias_flash_add_message')); 
				redirect('categorias_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('categorias_flash_error_message')); 
				redirect('categorias_controller','location');
			}
		}
		$this->load->view('categorias_view/form_add_categorias',$data);

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
		$data['categorias'] = $this->categorias_model->get_m(array('_id' => $_id),$flag=1);
		
		$this->form_validation->set_rules('_id', '_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|alpha_numeric|xss_clean');

		if($this->form_validation->run()){
			$data_categorias  = array();
			$data_categorias['_id'] = $this->input->post('_id');
			$data_categorias['descripcion'] = $this->input->post('descripcion');
			$data_categorias['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->categorias_model->edit_m($data_categorias)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('categorias_flash_edit_message')); 
				redirect('categorias_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('categorias_flash_error_message')); 
				redirect('categorias_controller','location');
			}
		}
		$this->load->view('categorias_view/form_edit_categorias',$data);

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

		if($this->categorias_model->delete_m($_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('categorias_flash_delete_message')); 
			redirect('categorias_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('categorias_flash_error_delete_message')); 
			redirect('categorias_controller','location');
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
		$data_search_categorias = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->categorias_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_categorias[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_categorias['limit'] = $this->config->item('pag_perpage');
			$data_search_categorias['offset'] = $offset;
			$data_search_categorias['sortBy'] = '_id';
			$data_search_categorias['sortDirection'] = 'asc';

		
			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'categorias_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['categorias'] = $this->categorias_model->get_m($data_search_categorias);
	
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->categorias_model->getFieldsTable_m());
			$data['flag'] = $this->flags;
			$this->load->view('categorias_view/record_list_categorias',$data);
		}

	}

}