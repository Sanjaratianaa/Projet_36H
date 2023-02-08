<?php if ( ! defined('BASEPATH')) exit ('No direct script access allowed');

class Categorie extends CI_Model{

    public function get_listes(){

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
        $sql = "insert into categories (idCategories,nameCategories) values (null,%s)";
        $sql = sprintf($sql,$this->db->escape($nomCategorie));
        $this->db->query($sql);
    }

    public function get_listes_details($indice){

        $query = $this->db->query('Select actor_id,first_name,last_name,film_info from actor_info where actor_id = '.$indice);
        $resultat = $query -> row_array();
        return $resultat;

    }

    public function update($idcategorie,$nomCategorie){
        $sql = " update Categories set nameCategories=%s where idCategories = %s ";
        $sql = sprintf($sql,$this->db->escape($nomCategorie),$this->db->escape($idcategorie));
        $this->db->query($sql);
        // echo $sql;
    }

}