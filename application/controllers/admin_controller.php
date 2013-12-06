<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this -> load -> model('admin_model');
		$this -> load -> helper('url');
		
	}

	public function index() {
		
		$data['contratados'] = $this -> admin_model -> getQuery('cliente',0);
		$data['despedidos'] = $this -> admin_model -> getQuery('cliente',1);
		$this -> load -> view('template/header', $data);
		$this -> load -> view('prueba');
		$this -> load -> view('template/footer');
	}//Fin index

	public function actualizar() {
		$this -> admin_model -> actualizarDatos();
	}//Fin actualizar

}//Fin class Admin_Controller
