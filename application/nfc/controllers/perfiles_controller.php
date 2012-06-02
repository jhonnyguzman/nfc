<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfiles_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		$this->load->model('perfiles_model');
		$this->load->model('sisperfil_model');
		$this->load->model('tabgral_model');
		$this->config->load('perfiles_settings');
		if($this->session->userdata('logged_in') == true) { 
			$data['flags'] = $this->basicauth->getPermissions('perfiles');
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
		//code here
		if($this->flagR)
		{
			$data['title_header'] = $this->config->item("recordListTitle");
			$data['flag'] = $this->flags;	
			$this->load->view('perfiles_view/home_perfiles', $data);
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
		$data['title_header'] = $this->config->item('recordAddTitle');
		$data['estados'] = $this->tabgral_model->get_m(array("grupos_tabgral_id" => 1));
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|integer|xss_clean');

		if($this->form_validation->run())
		{	
			$data_perfiles  = array();
			
			$data_perfiles['descripcion'] = $this->input->post('descripcion');
			$data_perfiles['estado'] = $this->input->post('estado');
			$data_perfiles['updated_at'] = $this->basicrud->formatDateToBD();

			$id_perfiles = $this->perfiles_model->add_m($data_perfiles);
			if($id_perfiles){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('flash_add_message')); 
				redirect('perfiles_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
				redirect('perfiles_controller','location');
			}
		}
		$this->load->view('perfiles_view/form_add_perfiles',$data);

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for updating 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function edit_c($perfiles_id)
	{
		//code here
		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');
		$data['perfiles'] = $this->perfiles_model->get_m(array('_id' => $perfiles_id),$flag=1);
		$data['estados'] = $this->tabgral_model->get_m(array("grupos_tabgral_id" => 1));

		$this->form_validation->set_rules('_id', '_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|integer|xss_clean');
		if($this->form_validation->run()){
			$data_perfiles  = array();
			
			$data_perfiles['_id'] = $this->input->post('_id');
			$data_perfiles['descripcion'] = $this->input->post('descripcion');
			$data_perfiles['estado'] = $this->input->post('estado');
			$data_perfiles['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->perfiles_model->edit_m($data_perfiles)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('flash_edit_message')); 
				redirect('perfiles_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
				redirect('perfiles_controller','location');
			}
		}
		$this->load->view('perfiles_view/form_edit_perfiles',$data);

	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $perfiles_id id of record
	 * @return void
	 */
	function delete_c($perfiles_id)
	{
		//code here
		if($this->perfiles_model->delete_m($perfiles_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('flash_delete_message')); 
			redirect('perfiles_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('flash_error_delete_message')); 
			redirect('perfiles_controller','location');
		}

	}

	function search_c($offset = 0)
	{
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_perfiles = array(); 
		$data_search_pagination = array(); 

		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->perfiles_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '') 
				{
					$data_search_perfiles[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
				}
			}
			
			$data_search_pagination['count'] = true;
			$data_search_perfiles['limit'] = $this->config->item('pag_perpage');
			$data_search_perfiles['offset'] = $offset;
			$data_search_perfiles['sortBy'] = 'descripcion';
			$data_search_perfiles['sortDirection'] = 'asc';
			
			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'perfiles_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['perfiles'] = $this->perfiles_model->get_m($data_search_perfiles);
		
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->perfiles_model->getFieldsTable_m());
		
			$data['flag'] = $this->flags;

			$this->load->view('perfiles_view/record_list_perfiles',$data);
		
		}

	}


	/**
	 * This function show menu assing the perfil
	 *
	 * @access public
	 * @return void
	 */
	function showMenuPerfil_c()
	{
		//code here
		$data = array();
		$data['subtitle'] = $this->config->item('options_menu_title');
		$data['perfiles'] = $this->perfiles_model->get_m(array('sortBy'=>'nombre', 'sortDirection'=>'asc'));
		$this->load->view('view/set_menu_perfiles.php', $data);
	}


	/**
	 * This function gets all menu options of a perfil
	 *
	 * @access public
	 * @return void
	 */
	function getMenuPerfil_c()
	{
		//code here
		$menuAssigned = $this->sisperfil_model->getMenuAssignedToPerfil_m(array('perfiles_id'=>$this->input->post('perfiles_id')));
		$menuNoAssigned = $this->sisperfil_model->getMenuNotAssignedToPerfil_m(array('perfiles_id'=>$this->input->post('perfiles_id')));
		if(isset($menuAssigned) && is_array($menuAssigned) && count($menuAssigned)>0){
			foreach($menuAssigned as $menu){
			$data[] = array('menu' => array('cod'=>1,'sismenu_id'=>$menu->sismenu_id,'sismenu_descripcion'=>$menu->sismenu_descripcion));
			}
		}
		if(isset($menuNoAssigned) && is_array($menuNoAssigned) && count($menuNoAssigned)>0){
			foreach($menuNoAssigned as $menu){
			$data[] = array('menu' => array('cod'=>2,'sismenu_id'=>$menu->sismenu_id,'sismenu_descripcion'=>$menu->sismenu_descripcion));
			}
		}

		echo json_encode($data);
	}

	/**
	 * This function sets menu options of a perfil
	 *
	 * @access public
	 * @return void
	 */
	function setMenuPerfil_c()
	{
		//code here
		$perfiles_id = $this->input->post('perfiles_id');
		$array_sismenu_id = $this->input->post('array_sismenu_id');
		for($i=0; $i<count($array_sismenu_id); $i++){
			$sisperfil_id = $this->sisperfil_model->add_m(array('sismenu_id'=>$array_sismenu_id[$i],'perfiles_id'=>$perfiles_id,'estado'=>1));
			if(!$sisperfil_id){
				$status[] = false;
			}
		}
		if(isset($status) && is_array($status) && count($status)>0){
			$data[] = array('estado' => false);
		}else{
			$data[] = array('estado' => true);
		}
		echo json_encode($data);
	}

	/**
	 * This function quits menu options of a perfil
	 *
	 * @access public
	 * @return void
	 */
	function quitMenuPerfil_c()
	{
		//code here
		$perfiles_id = $this->input->post('perfiles_id');
		$array_sismenu_id = $this->input->post('array_sismenu_id');
		for($i=0; $i<count($array_sismenu_id); $i++){
			if(!$this->sisperfil_model->delete_m(array('sismenu_idsismenu'=>$array_sismenu_id[$i],'perfiles_id'=>$perfiles_id))){
				$status[] = false;
			}
		}
		if(isset($status) && is_array($status) && count($status)>0){
			$data[] = array('estado' => false);
		}else{
			$data[] = array('estado' => true);
		}
		echo json_encode($data);
	}
}
