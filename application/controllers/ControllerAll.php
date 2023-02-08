<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerAll extends CI_Controller {

    public function index(){
		$this->load->helper('url_helper');
		$this->load->view('Template/index');
	}

    public function affichage(){
            $this->load->library('session');

            $this->session->set_userdata('status',$this->input->post("status"));
            $_SESSION['st'] = $this->input->post("status");
            $all['status'] = $this->input->post("status");
            
			$this->load->helper('url_helper');
            if($all['status'] == "Admin"){
                $this->load->view('Template/loginAdmin',$all);
            }else if($all['status'] == "Client"){
                $this->load->view('Template/loginUser',$all);
            }
	}

        public function login(){
            $this->load->library('session');
            $this->load->model('Person');
            $this->load->helper('url_helper');
            $data = $this->Person->signup($this->input->post('email'),$this->input->post('password'), $this->input->post('status'));
            if ($data!=null) {
                if($this->input->post('status') == "Admin"){
                    $_SESSION['idUser'] = $data['idPerson'];
                    redirect("ControllerAdmin/affichage");
                }else if($this->input->post('status') == "Client"){
                    $_SESSION['idUser'] = $data['idPerson'];
                    redirect("ControllerClient/affichage");
                }
            }
            else if ($data==null) {
                header("Location:../");
            }
        }

        public function deconnexion(){
            $this->load->library('session');
            $this->session->unset_userdata('idUser');
            $this->session->unset_userdata('status');
            $this->session->sess_destroy();

            header('Location:../');
        }

}