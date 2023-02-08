<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerAdmin extends CI_Controller {

    public function index(){

		$this->load->view('Template/index');

	}

    public function affichage(){
            $this->load->library('session');
            $this->load->model('Categorie','categorie');

            $creer = array();
            $creer['listesCategories'] = $this->categorie->get_listes();
            $creer['contents'] = 'Template/TemplateAdmin/acceuilAdmin.php';
            $creer['namePerson']=null;
			$this->load->helper('url_helper');
			$this->load->view('Template/TemplateAdmin/affichage',$creer);
	}

    public function redirectionCategorie($idCategories){
        $this->load->helper('url_helper');  
        $creer = array();
        $creer['contents'] = 'Template/TemplateAdmin/update.php';
        $creer['namePerson']=$idCategories;
        $this->load->view('Template/TemplateAdmin/affichage',$creer);
    }

    public function showCategoryPage(){
        $this->load->helper('url_helper');  
        $creer = array();
        $creer['contents'] = 'Template/TemplateAdmin/cart.php';
        $creer['namePerson']=null;
        $this->load->view('Template/TemplateAdmin/affichage',$creer);
    }

    public function addCategory(){
        $this->load->helper('url_helper');  
        $this->load->model('Categorie','categorie');
        $nom = $this->input->post('nomCategorie');
        $this->categorie->insertCategories($nom);
        redirect("ControllerAdmin/showCategoryPage");
    }
    public function updateCategory(){
        $this->load->helper('url_helper');  
        $nom = $this->input->post('nomCategorie');
        $id = $this->input->post('idCategorie');
        $this->load->model('Categorie','categorie');
        $this->categorie->update($id,$nom);
        $creer = array();
        $creer['contents'] = 'Template/TemplateAdmin/cart.php';
        $creer['namePerson']=null;
        $this->load->view('Template/TemplateAdmin/affichage',$creer);
    }

    public function showStatistiquePage(){
        $this->load->helper('url_helper');  
        $creer = array();
        $creer['contents'] = 'Template/TemplateAdmin/statistique.php';
        $this->load->view('Template/TemplateAdmin/affichage',$creer);
    }
    // public function stat(){
    //     $this->load->helper('url_helper');  
    //     $creer = array();
    //     $creer['contents'] = 'Template/TemplateAdmin/statistique.php';
    //     $this->load->view('Template/TemplateAdmin/affichage',$creer);
    // }

    public function stat(){
        $this->load->helper('url_helper');  
		$this->load->model('Person');
		$data['namePerson'] = array("namePerson"=>$this->Person->getAllUser());
        $data['contents'] = 'Template/TemplateAdmin/statistique.php';
        $this->load->view('Template/TemplateAdmin/affichage',$data);
	}

    

}