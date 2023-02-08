<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

class Proposition extends CI_Model{

    public function get_listes_Propositions($id){

        $query = $this->db->query('Select * from categories');

        $resultat = array();
        $i = 0;
        foreach ($query -> result_array() as $row){
            $resultat[$i]= $row;
            $i++;
        }

        return $resultat;

    }

    public function insertCategories($nomCategorie){
        $sql = "insert into categories (idCategories,nomCategories) values (null,'%s')";
        $sql = sprintf($sql,$this->db->escape($nomCategorie));
        $this->db->query($sql);
    }

    // public function get_listes_details($indice){

    //     $query = $this->db->query('Select actor_id,first_name,last_name,film_info from actor_info where actor_id = '.$indice);
    //     $resultat = $query -> row_array();
    //     return $resultat;

    // }

    /// *************** NEW ************* ///

    public function getListProposition($idPerson){
        $sql = 'select IdProposition,price,titre,nameProduct,idProducts1,descriptions from proposition join products on proposition.idProducts1 = products.idproducts where idPerson2 =%s and dateResponse is null';
        $sql = sprintf($sql,$idPerson);
        // echo $sql;
        $query = $this->db->query($sql);
        $resultat = array();
        $i = 0;
        foreach ($query -> result_array() as $row){
            $resultat[$i]= $row;
            $i++;
        }

        return $resultat;
    }

    public function getOneProposition($idProposition){
        $sql = "select * from Proposition where idProposition = %s";
        $sql = sprintf($sql,$idProposition);
        $query = $this->db->query($sql);
        $resultat = $query -> row_array();
        return $resultat;
    }

    public function updateProduct($idPersonne,$idProduct){
        $sql = "update products set idPerson = %s where idProducts = %s";
        $idPersonne = $this->db->escape($idPersonne);
        $idProduct = $this->db->escape($idProduct);
        $sql = sprintf($sql,$idPersonne,$idProduct);
        // echo $sql;
        $this->db->query($sql);
    }

    public function ExchangeOwner($idProposition){
        $resultat = $this->getOneProposition($idProposition);
        $sql = 'update proposition set idPerson1=%s,idPerson2 =%s,idStatut =1,dateResponse = now() where idProposition = %s';
        $sql = sprintf($sql,$resultat['idPerson2'],$resultat['idPerson1'],$idProposition);
        // echo $sql;
        $this->updateProduct($resultat['idPerson2'],$resultat['idProducts1']);
        $this->updateProduct($resultat['idPerson1'],$resultat['idProduct2']);
        $this->db->query($sql);
    }

    public function CountExchange(){
        $sql = 'Select count(idProposition) as count from proposition as p join statut as s on p.idStatut = s.idStatut where p.dateResponse != NULL and s.idStatut = 11';
        $query = $this->db->query($sql);
        $resultat = $query -> row_array();
        return $resultat['count'];
    }

    public function demandeProposition($idProduit1,$idProduit2,$idPerson1,$idPerson2){
        $sql = 'insert into proposition values(null,%s,%s,%s,%s,11,now(),null)';
        $s = sprintf($sql,$idProduit1,$idProduit2,$idPerson1,$idPerson2);
        // echo $s;
        $query = $this->db->query($s);
    }

    public function Refus($idProposition){
        $sql = 'update proposition set idStatut =21 where idProposition = %s';
        $sql = sprintf($sql,$idProposition);
        // echo $sql;
        $this->db->query($sql);
    }

    

}