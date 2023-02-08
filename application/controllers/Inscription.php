<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function ins(){
		$this->load->helper('url_helper');
		$this->load->view('Template/inscription');
	}

	// public function callLoginUser(){
	// 	$this->load->library('session');
	// 	$this->load->view('Template/loginUser');
	// }

	public function inscr(){
		$this->load->library('session');
		$this->load->model('Person');
		$this->load->helper('url_helper');
		$data = $this->Person->sign($this->input->post('name'),$this->input->post('email'),$this->input->post('password'),$_SESSION['status']);
		redirect("ControllerAll/");
    }
	
	
}
