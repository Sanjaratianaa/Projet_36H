<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function login(){
		$this->load->model('log_model');
		$data = $this->log_model->signup($this->input->post('email'),$this->input->post('password'), $this->input->post('status'));
		if ($data!=null) {
			foreach ($data as $row) {
				$this->session->set_userdata('idPerson',$row['idPerson']);
			}
			if ($this->input->post('status')=='User') {
				redirect(site_url('index.php/controlleurAll/client'));	
			}
			redirect(site_url('index.php/controlleurAll/admin'));
		}
		if ($data==null) {
			$this->load->view('login');
		}
	}
	public function index(){
		$this->load->view('login');
	}
	
	public function ins(){
		$this->load->view('inscription');
	}
	public function inscr(){
		$this->load->model('log_model');
		$data = $this->log_model->sign($this->input->post('name'),$this->input->post('email'),$this->input->post('password'));
		$this->load->view('login');
    }
	public function ajout(){
		$this->load->model('ajouterproduit');
		$temp1 = $this->ajouterproduit->insertphoto($this->input->post('file[0]'),$this->input->post('file[1]'),$this->input->post('file[2]'));
        $sql="select max(idImage) from Images";
        $query = $this->db->query($sql);
		$row = $query->row_array();
		echo $row['max(idImage)'];
		
		$temp = $this->ajouterproduit->addproduct($this->input->post('nomproduit'),2,$this->input->post('categorie'),$this->input->post('prix'),$row['max(idImage)'],$this->input->post('descri'),$this->input->post('titre'));
	}
	

	public function photo(){
		$this->load->model('ajouterproduit');
		echo $this->input->post('file[0]');
		$temp1 = $this->ajouterproduit->insertphoto($this->input->post('file[0]'),$this->input->post('file[1]'),$this->input->post('file[2]'));
	}




	public function upload(){
		$imgstring = "";
		for ($i=0; $i <count($_FILES['file']['name']); $i++) { 
			$nomfile = $_FILES['file']['name'][$i];
			// $this->insertphoto($nomfile);
			if (in_array(strchr($nomfile, "."), array('.png','.jpg','.jpeg','.PNG','.JPG',))) {
				move_uploaded_file($_FILES['file']['tmp_name'][$i], './assets/img/'.$nomfile);
				$imgstring .= $nomfile;
				if ($i < $nomfile - 1) {
					$imgstring .= ",";
					
				}
			}
		}
	
	}
	
	

}
