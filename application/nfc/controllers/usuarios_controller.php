<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_Controller extends CI_Controller {

	private $flagR;
	private $flagI;
	private $flagU;
	private $flagD;
	private $flags;

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in') == true) { 
			$this->load->model('usuarios_model');
			$this->load->model('perfiles_model');
			$this->load->model('tabgral_model');
			$this->config->load('usuarios_settings');
			$data['flags'] = $this->basicauth->getPermissions('usuarios');
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
		if($this->flagR)
		{
			$data['title_header'] = $this->config->item("recordListTitle");
			$data['flag'] = $this->flags;	
			$this->load->view('usuarios_view/home_usuarios', $data);
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
		$data['perfiles'] = $this->perfiles_model->get_m();

		$this->form_validation->set_rules('username', 'username', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|alpha_numeric|md5|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('apellido', 'apellido', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('direccion', 'direccion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('telefono', 'telefono', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('perfiles_id', 'perfiles_id', 'trim|required|integer|xss_clean');
	
		if($this->form_validation->run())
		{	
			$data_usuarios  = array();
			$data_usuarios['username'] = $this->input->post('username');
			$data_usuarios['password'] = $this->input->post('password');
			$data_usuarios['nombre'] = $this->input->post('nombre');
			$data_usuarios['apellido'] = $this->input->post('apellido');
			if($this->input->post('email'))
				$data_usuarios['email'] = $this->input->post('email');
			if($this->input->post('direccion'))
				$data_usuarios['direccion'] = $this->input->post('direccion');
			if($this->input->post('telefono'))
				$data_usuarios['telefono'] = $this->input->post('telefono');
			$data_usuarios['estado'] = $this->input->post('estado');
			$data_usuarios['perfiles_id'] = $this->input->post('perfiles_id');
			$data_usuarios['created_at'] = $this->basicrud->formatDateToBD();
			$data_usuarios['updated_at'] = $this->basicrud->formatDateToBD();

			$id_usuarios = $this->usuarios_model->add_m($data_usuarios);
			if($id_usuarios){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('flash_add_message')); 
				redirect('usuarios_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
				redirect('usuarios_controller','location');
			}
		}
		$this->load->view('usuarios_view/form_add_usuarios',$data);

	}


	/**
	 * This function validates and sends the data to the 
	 * method of the model responsible for updating 
	 * the data in the db
	 *
	 * @access public
	 * @return void
	 */
	function edit_c($usuarios_id)
	{
		//code here
		$data = array();
		$data['title_header'] = $this->config->item('recordEditTitle');
		$data['usuarios'] = $this->usuarios_model->get_m(array('_id' => $usuarios_id),$flag=1);
		$data['estados'] = $this->tabgral_model->get_m(array("grupos_tabgral_id" => 1));
		$data['perfiles'] = $this->perfiles_model->get_m();
		
		$this->form_validation->set_rules('_id', '_id', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('username', 'username', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|alpha_numeric|md5|xss_clean');
		$this->form_validation->set_rules('nombre', 'nombre', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('apellido', 'apellido', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('email', 'email', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('direccion', 'direccion', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('telefono', 'telefono', 'trim|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('estado', 'estado', 'trim|required|integer|xss_clean');
		$this->form_validation->set_rules('perfiles_id', 'perfiles_id', 'trim|required|integer|xss_clean');
		
		if($this->form_validation->run()){
			$data_usuarios  = array();
			$data_usuarios['_id'] = $this->input->post('_id');
			$data_usuarios['username'] = $this->input->post('username');
			if($this->input->post('password'))
				$data_usuarios['password'] = $this->input->post('password');
			$data_usuarios['nombre'] = $this->input->post('nombre');
			$data_usuarios['apellido'] = $this->input->post('apellido');
			if($this->input->post('email'))
				$data_usuarios['email'] = $this->input->post('email');
			if($this->input->post('direccion'))
				$data_usuarios['direccion'] = $this->input->post('direccion');
			if($this->input->post('telefono'))
				$data_usuarios['telefono'] = $this->input->post('telefono');
			$data_usuarios['estado'] = $this->input->post('estado');
			$data_usuarios['perfiles_id'] = $this->input->post('perfiles_id');
			$data_usuarios['updated_at'] = $this->basicrud->formatDateToBD();

			if($this->usuarios_model->edit_m($data_usuarios)){ 
				$this->session->set_flashdata('flashConfirm', $this->config->item('flash_edit_message')); 
				redirect('usuarios_controller','location');
			}else{
				$this->session->set_flashdata('flashError', $this->config->item('flash_error_message')); 
				redirect('usuarios_controller','location');
			}
		}
		$this->load->view('usuarios_view/form_edit_usuarios',$data);

	}


	/**
	 * This function sends the id of record to the
	 * method of the model responsible for deleting 
	 * the record in the db
	 *
	 * @access public
	 * @param $usuarios_id id of record
	 * @return void
	 */
	function delete_c($usuarios_id)
	{
		//code here
		if($this->usuarios_model->delete_m($usuarios_id)){ 
			$this->session->set_flashdata('flashConfirm', $this->config->item('flash_delete_message')); 
			redirect('usuarios_controller','location');
		}else{
			$this->session->set_flashdata('flashError', $this->config->item('flash_error_delete_message')); 
			redirect('usuarios_controller','location');
		}

	}

	function search_c($offset = 0)
	{
		//code here
		$data = array(); 
		$fieldSearch = array(); 
		$data_search_usuarios  = array();
		$data_search_pagination  = array();
		$flag = 0;
		
		if($this->flagR)
		{
			$fieldSearch = $this->basicrud->getFieldSearch($this->usuarios_model->getFieldsTable_m());
			foreach($fieldSearch as $field)
			{
				if($this->input->post($field) != '')
				{ 
					$data_search_usuarios[$field] = $this->input->post($field);
					$data_search_pagination[$field] = $this->input->post($field);
					$flag = 1;
				}
			}
			
			$data_search_pagination['count'] = true;
			$data_search_usuarios['limit'] = $this->config->item('pag_perpage');
			$data_search_usuarios['offset'] = $offset;
			$data_search_usuarios['sortBy'] = '_id';
			$data_search_usuarios['sortDirection'] = 'asc';

			$data['pagination'] = $this->basicrud->getPagination(array('nameModel'=>'usuarios_model','perpage'=>$this->config->item('pag_perpage')),$data_search_pagination);
			$data['usuarios'] = $this->usuarios_model->get_m($data_search_usuarios);
			
			$data['flag'] = $this->flags;	
			$data['fieldShow'] = $this->basicrud->getFieldToShow($this->usuarios_model->getFieldsTable_m());
			
			
			$this->load->view('usuarios_view/record_list_usuarios',$data);
		
			
		}

	}

	/**
	 * This function check if the user is validate
	 *
	 * @access public
	 * @return void
	 */
	function login_c()
	{
		//code here
		$data = array();
		
		$this->form_validation->set_rules('username', 'username', 'trim|required|alpha_numeric|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|alpha_numeric|md5|xss_clean');
		if($this->form_validation->run())
		{	
			$reponse = $this->basicauth->login(array('username'=>$this->input->post('username'),'password'=>$this->input->post('password')));
			if(!isset($reponse['error'])){
				$reponse_menu = $this->basicauth->checkMenuUser();
				if(!isset($reponse_menu['error'])){
					redirect('main_controller');
				}else {
					$data['error'] = $reponse_menu['error'];
					$this->load->view('view/form_login_usuarios',$data);
				}
			}else {
				$data['error'] = $reponse['error'];
				$this->load->view('view/form_login_usuarios',$data);
			}
		}else{
			$this->load->view('view/form_login_usuarios',$data);
		}
	}


	/**
	 * This function closes the user session
	 *
	 * @access public
	 * @return void
	 */
	function logout_c()
	{
		//code here
		$this->basicauth->logout();
		redirect('welcome/index');	
	}
}
