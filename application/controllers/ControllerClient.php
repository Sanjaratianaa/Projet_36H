<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerClient extends CI_Controller {

    public function index(){

		$this->load->view('Template/index');

	}

    public function affichage(){
            $this->load->model('Categorie','categorie');
            $this->load->model('Product','product');

            $creer = array();
            $creer['listesCategories'] = $this->categorie->get_listes();
            $creer['produitDispo'] = $this->product->get_listes($_SESSION['idUser']);
            $creer['contents'] = 'Template/TemplateClient/acceuilClient.php';

			$this->load->helper('url_helper');
			$this->load->view('Template/TemplateClient/affichage',$creer);
		
	}

    public function resultatsSearch(){
            $this->load->model('Categorie','categorie');
            $this->load->model('Product','product');

            $indice = $this->input->get('indice');
            $categorie = $this->input->get('categorie');

            $creer = array();
            $creer['listesCategories'] = $this->categorie->get_listes();
            $creer['resultats'] = $this->product->searchProduct($indice,$categorie);
            $creer['produitDispo'] = $this->product->get_listes($_SESSION['idUser']);
            $creer['contents'] = 'Template/TemplateClient/acceuilClient.php';

			$this->load->helper('url_helper');
			$this->load->view('Template/TemplateClient/affichage',$creer);
    }

    public function redirectionCategorie($idCategories){

    }

    public function viewDetails($id){
    // public function viewDetails(){
        $this->load->model('Categorie','categorie');
        $this->load->model('Product','product');

        $creer = array();
        $creer['listesCategories'] = $this->categorie->get_listes();
        $creer['details'] = $this->product->get_listes_details($id);
        $creer['contents'] = 'Template/TemplateClient/detail.php';

		$this->load->helper('url_helper');
		$this->load->view('Template/TemplateClient/affichage',$creer);
    }

    public function ShowFicheProposition($idProduct,$idImage){
    // public function ShowFicheProposition(){
        $this->load->model('Categorie','categorie');
        $this->load->model('Product','product');

        $creer = array();
        $creer['listesCategories'] = $this->categorie->get_listes();
        $creer['ProduitAprendre'] = $this->product->getlistesProductByPerson($_SESSION['idUser']);
        $creer['ProduitProposer'] = $this->product->get_listes_details($idProduct);
        $creer['images'] = $this->product->get_Images($idImage);
        $creer['contents'] = 'Template/TemplateClient/ficheProposition.php';

		$this->load->helper('url_helper');
		$this->load->view('Template/TemplateClient/affichage',$creer);
    }


    public function ajout(){
		$this->load->model('Product');
        $tablePhoto = $this->upload();
        $temp1 = $this->Product->insertphoto($tablePhoto[0],$tablePhoto[1],$tablePhoto[2]);
        $sql="select max(idImage) from Images";
        $query = $this->db->query($sql);
		$row = $query->row_array();
		// echo $row['max(idImage)'];
		$temp = $this->Product->addproduct($this->input->post('nomproduit'),$_SESSION['idUser'],$this->input->post('categorie'),$this->input->post('prix'),$row['max(idImage)'],$this->input->post('descri'),$this->input->post('titre'));
        
		$this->pourProduit();
	}

	public function photo(){
		$this->load->model('Product');
		// echo $this->input->post('file[0]');
		$temp1 = $this->Product->insertphoto($this->input->post('file[0]'),$this->input->post('file[1]'),$this->input->post('file[2]'));
	}

	public function upload(){
		$imgstring = "";
        $table = array();
		for ($i=0; $i <count($_FILES['file']['name']); $i++) { 
			$nomfile = $_FILES['file']['name'][$i];
            $table[] = $nomfile;
			// $this->insertphoto($nomfile);
			if (in_array(strchr($nomfile, "."), array('.png','.jpg','.jpeg','.PNG','.JPG',))) {
				move_uploaded_file($_FILES['file']['tmp_name'][$i], './assets/img/'.$nomfile);
				$imgstring .= $nomfile;
				if ($i < $nomfile - 1) {
					$imgstring .= ",";
					
				}
			}
		}
        return $table;
	
	}

    public function pourProduit(){
        $this->load->model('Categorie','categorie');

        $creer = array();
        $creer['listesCategories'] = $this->categorie->get_listes();
        $creer['contents'] = 'Template/TemplateClient/ajoutProduit.php';

		$this->load->helper('url_helper');
		$this->load->view('Template/TemplateClient/affichage',$creer);
    }

    public function listeProduit(){
        $this->load->model('Categorie','categorie');
        $this->load->model('Product','product');

        $creer = array();
        $creer['listesCategories'] = $this->categorie->get_listes();
        $idUser = $_SESSION['idUser'];
        $creer['listeProduit'] = $this->product->getlistesProductByPerson($idUser);
        $creer['contents'] = 'Template/TemplateClient/myProduct.php';

		$this->load->helper('url_helper');
		$this->load->view('Template/TemplateClient/affichage',$creer);
    }

    // public function listePhotos($idImage){
    //     $this->load->model('Categorie','categorie');
    //     $this->load->model('Product','product');

    //     $creer = array();
    //     $creer['listesCategories'] = $this->categorie->get_listes();
    //     $idUser = $_SESSION['idUser'];
    //     $creer['listeProduit'] = $this->product->get_listes($idUser);
    //     $creer['contents'] = 'Template/TemplateClient/myProduct.php';

	// 	$this->load->helper('url_helper');
	// 	$this->load->view('Template/TemplateClient/affichage',$creer);
    // }

    public function Proposition(){
        $this->load->model('Categorie','categorie');
        $this->load->model('Proposition','proposition');

        $this->proposition->demandeProposition($this->input->get('monProduit'),$this->input->get('ProduitPropose'),$_SESSION['idUser'],$this->input->get('idProprio'));

		$this->load->helper('url_helper');
        $this->affichage();
    }

    public function showProposition(){
        $this->load->model('Categorie','categorie');
        $this->load->model('Proposition','proposition');

        $creer = array();
        $creer['listesCategories'] = $this->categorie->get_listes();
        $idUser = $_SESSION['idUser'];
        $creer['listeProposition'] = $this->proposition->getListProposition($idUser);
        $creer['contents'] = 'Template/TemplateClient/listeProposition.php';

		$this->load->helper('url_helper');
        $this->load->view('Template/TemplateClient/affichage',$creer);
    }

    public function historiser($idProposition){
		$this->load->model('Person');
		$this->Person->hist($idProposition);
        
	}

    public function Acceptation($idProposition){
        $this->load->model('Proposition','proposition');
        $this->load->model('Person');
        $this->historiser($idProposition);
        $this->proposition->ExchangeOwner($idProposition);
        $this->showProposition();
    }

    public function getApproximation($pourcentage,$prix){
        $this->load->model('Categorie','categorie');
            $this->load->model('Product','product');

            $creer = array();
            $creer['listesCategories'] = $this->categorie->get_listes();
            $creer['produitDispo'] = $this->product->getAllApproximation($_SESSION['idUser'],$pourcentage,$prix);
            $creer['contents'] = 'Template/TemplateClient/acceuilClient.php';

			$this->load->helper('url_helper');
			$this->load->view('Template/TemplateClient/affichage',$creer);
    }

    public function Refusation($idProposition){
        $this->load->model('Proposition','proposition');
        $this->proposition->Refus($idProposition);
        $this->showProposition();
    }
}