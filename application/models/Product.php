<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

class Product extends CI_Model{

    public function get_listes($idUser){
        $sql = "Select * from products join images on products.idimage = images.idimage where idPerson != %s";
        $sql = sprintf($sql,$idUser);
        $query = $this->db->query($sql);
        // echo $sql;

        $resultat = array();
        $i = 0;
        foreach ($query -> result_array() as $row){
            $resultat[$i]= $row;
            $i++;
        }

        return $resultat;

    }

    public function get_listes_Photos($idImage){
        $sql = "Select * from images where idImage = %s";
        $sql = sprintf($sql,$idImage);
        $query = $this->db->query($sql);

        $resultat = array();
        $i = 0;
        foreach ($query -> result_array() as $row){
            $resultat[$i]= $row;
            $i++;
        }

        return $resultat;

    }

    public function addproduct($nameproduct,$idPerson,$idCategories,$price,$idImage,$description,$titre){
        $sql="Insert into Products values (default,%s,%s,%s,%s,%s,%s,%s)";
        $s=sprintf($sql,$this->db->escape($nameproduct),$this->db->escape($idPerson),$this->db->escape($idCategories),$this->db->escape($price),$this->db->escape($idImage),$this->db->escape($description),$this->db->escape($titre));
        // echo $s;
        $this->db->query($s);
    
    }

    public function insertphoto($photo1,$photo2,$photo3){
        $sql = "insert into Images values (default,%s,%s,%s)";
        $sq = sprintf($sql,$this->db->escape($photo1),$this->db->escape($photo2),$this->db->escape($photo3));
        // echo $sq;
        $this->db->query($sq);
    }

    // public function insertProducts($nomProduct,$idPersonne,$idCategories,$price,$idImage,$desc,$titre){
    //     $sql = "insert into Product values (null,'%s','%s','%s','%s','%s','%s','%s')";
    //     $nomProduct = $this->db->escape($nomProduct);
    //     $idPersonne = $this->db->escape($idPersonne);
    //     $idCategories = $this->db->escape($idCategories);
    //     $price = $this->db->escape($price);
    //     $idImage = $this->db->escape($idImage);
    //     $desc = $this->db->escape($desc);
    //     $titre = $this->db->escape($titre);
    //     $sql = sprintf($sql,$nomProduct,$idPersonne,$idCategories,$price,$idImage,$desc,$titre);
    //     $this->db->query($sql);
    // }

    public function updateProduct($nomProduct,$idPersonne,$idCategories,$price,$idImage,$desc,$titre,$idProduct){
        $sql = "update product set nameProduct = '%s',idPerson = '%s', idCategories = '%s',price = '%s', idImage = '%s',descriptions = '%s', titre = '%s' where idProducts = '%s'";
        $nomProduct = $this->db->escape($nomProduct);
        $idPersonne = $this->db->escape($idPersonne);
        $idCategories = $this->db->escape($idCategories);
        $price = $this->db->escape($price);
        $idImage = $this->db->escape($idImage);
        $desc = $this->db->escape($desc);
        $titre = $this->db->escape($titre);
        $idProduct = $this->db->escape($idProduct);
        $sql = sprintf($nomProduct,$idPersonne,$idCategories,$price,$idImage,$desc,$titre,$idProduct);
        $this->db->query($sql);
    }

    public function deleteProduct($idProduct){
        $sql="delete from product where idProduct = '%s'";
        $sql = sprintf($sql,$idProduct);
        $this->db->query($sql);
    }

    // public function insertPhotos($photo1,$photo2,$photo3){
    //     $sql = "insert into Images values (null,'%s','%s','%s')";
    //     $photo1 = $this->db->escape($photo1);
    //     $photo2 = $this->db->escape($photo2);
    //     $photo3 = $this->db->escape($photo3);
    //     $sql = sprintf($sql,$photo1,$photo2,$photo3);
    //     $this->db->query($sql);
    // }

    /// ************* NEW *************** ///
    public function getlistesProductByPerson($idPerson){
        $sql = 'Select * from Products join images on products.idimage = images.idimage where idPerson = %s';
        $sql = sprintf($sql,$idPerson);
        $query = $this->db->query($sql);
        // echo $sql;
        $resultat = array();
        $i = 0;
        foreach ($query -> result_array() as $row){
            $resultat[$i]= $row;
            $i++;
        }

        return $resultat;

    }

    public function searchProduct($indice,$idCategories){
        $sql = "select * from Products where idCategories = ".$idCategories." and titre LIKE '%".$indice."%'";
        $query = $this->db->query($sql);
        // echo $sql;

        $resultat = array();
        $i = 0;
        foreach ($query -> result_array() as $row){
            $resultat[$i]= $row;
            $i++;
        }

        return $resultat;
    }

    public function get_listes_details($indice){
        $query = $this->db->query('Select * from products join images on products.idimage = images.idimage where idProducts = '.$indice);
        $resultat = $query -> row_array();
        return $resultat;

    }

    public function get_Images($indice){
        $query = $this->db->query('Select * from images where idImage = '.$indice);
        $resultat = $query -> row_array();
        return $resultat;

    }

    public function returnPrix($prixPrincipale,$prixProposer){
        $reponse = "";
        $prix = ($prixProposer-$prixPrincipale)/100;
        if($prix>0){
            $reponse = "+".$prix;
        }else if($prix<0){
            $reponse = $prix;
        }
        return $reponse;
    }

    public function getAllApproximation($idUser,$pourcentage,$prix){
        $prixMin = $prix - ($pourcentage*100);
        $prixMax = $prix + ($pourcentage*100);
        if($prixMin < 0){
            $prixMin = -1 * $prixMin;
        }

        $sql = "Select * from products join images on products.idimage = images.idimage where idPerson != %s and price>=%s and price<=%s";
        $sql = sprintf($sql,$idUser,$prixMin,$prixMax);
        $query = $this->db->query($sql);
        // echo $sql;

        $resultat = array();
        $i = 0;
        foreach ($query -> result_array() as $row){
            $resultat[$i]= $row;
            $resultat[$i]['difference'] = $this->returnPrix($prix,$row['price']);
            $i++;
        }

        return $resultat;
    }

}