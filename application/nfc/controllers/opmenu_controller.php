<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Opmenu_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;
	private $flag_override_img = FALSE;
	private $name_thumb = '';

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('opmenu_model');
			$this->load->model('categorias_model');
			$this->config->load('opmenu_settings');
			$data['flags'] = $this->basicauth->getPermissions('opmenu');
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
			$this->load->view('opmenu_view/home_opmenu', $data);
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
		
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('precio', 'precio', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('categorias_id', 'categorias_id', 'trim|required|integer|xss_clean');
		
		if($this->form_validation->run())
		{	
			$data_opmenu  = array();
			$data_opmenu['nombre'] = $this->input->post('nombre');
			$data_opmenu['descripcion'] = $this->input->post('descripcion');
			$data_opmenu['precio'] = $this->input->post('precio');
			$data_opmenu['categorias_id'] = $this->input->post('categorias_id');
			$data_opmenu['thumb'] = $this->upload();
			$data_opmenu['updated_at'] = $this->basicrud->formatDateToBD();

			$id_opmenu = $this->opmenu_model->add_m($data_opmenu);
			if($id_opmenu){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('opmenu_flash_add_message')); 
				redirect('opmenu_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('opmenu_flash_error_message')); 
				redirect('opmenu_controller','location');
			}

		}else{
			$data['categorias'] = $this->categorias_model->get_m();
			$this->load->view('opmenu_view/form_add_opmenu',$data);
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
		$data['opmenu'] = $this->opmenu_model->get_m(array('_id' => $_id),$flag=1);

		$this->form_validation->set_rules('_id', '_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('precio', 'precio', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('categorias_id', 'categorias_id', 'trim|integer|xss_clean');
		$this->form_validation->set_rules('created_at', 'created_at', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('updated_at', 'updated_at', 'trim|alpha_numeric|xss_clean');
		if($this->form_validation->run()){
			$data_opmenu  = array();
			$data_opmenu['_id'] = $this->input->post('_id');
			$data_opmenu['nombre'] = $this->input->post('nombre');
			$data_opmenu['descripcion'] = $this->input->post('descripcion');
			$data_opmenu['precio'] = $this->input->post('precio');
			$data_opmenu['categorias_id'] = $this->input->post('categorias_id');
			$data_opmenu['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->opmenu_model->edit_m($data_opmenu)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('opmenu_flash_edit_message')); 
				redirect('opmenu_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('opmenu_flash_error_message')); 
				redirect('opmenu_controller','location');
			}
		}else{
			$data['categorias'] = $this->categorias_model->get_m();
			$this->load->view('opmenu_view/form_edit_opmenu',$data);
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

		if($this->opmenu_model->delete_m($_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('opmenu_flash_delete_message')); 
			redirect('opmenu_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('opmenu_flash_error_delete_message')); 
			redirect('opmenu_controller','location');
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
		$data_search_opmenu = array(); 
		$data_search_pagination = array(); 
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->opmenu_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_opmenu[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}

			$data_search_pagination['count'] = true;
			$data_search_opmenu['limit'] = $this->config->item('pag_perpage');
			$data_search_opmenu['offset'] = $offset;
			$data_search_opmenu['sortBy'] = '_id';
			$data_search_opmenu['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'opmenu_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['opmenu'] = $this->opmenu_model->get_m($data_search_opmenu);
	
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->opmenu_model->getFieldsTable_m());
			$data['flag'] = $this->flags;
			$this->load->view('opmenu_view/record_list_opmenu',$data);
		}

	}



	function upload()
	{
		$this->load->helper('string');
		
		$config['upload_path'] = './thumbs/';
		$config['allowed_types'] = 'jpg|png';
		if($this->flag_override_img == FALSE){
			$config['file_name'] = 'thumb_'.random_string('alnum', 25);
		}else{
			if($this->name_thumb == ''){
				$config['file_name'] = 'thumb_'.random_string('alnum', 25);
			}else{
				$config['file_name'] = $this->name_thumb;
				$config['overwrite'] = $this->flag_override_img;
			}
		}

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('thumb'))
		{
			//$error = array('error' => $this->upload->display_errors());
			return null;
		}
		else
		{
			$data = $this->upload->data();
			return $data['file_name'];
		}
	}


	function editimg($opmenu_id)
	{
		$opmenu = $this->opmenu_model->get_m(array('_id' => $opmenu_id));

		if($opmenu[0]->thumb) $this->name_thumb = $opmenu[0]->thumb;
		$this->flag_override_img = TRUE;

		$data_opmenu['_id'] = $opmenu_id;
		$data_opmenu['thumb'] = $this->upload();

		if($this->opmenu_model->edit_m($data_opmenu)){
			$this->session->set_flashdata('flashConfirm', $this->config->item('opmenu_flash_edit_message')); 
			redirect('opmenu_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('opmenu_flash_error_message')); 
			redirect('opmenu_controller','location');
		}

	}
}