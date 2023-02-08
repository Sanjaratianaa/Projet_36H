<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends CI_Model{

	// public function signup($email, $pass, $status){
    //     $sql = "select * from Person where email = '%s' and pass = '%s' and statut = '%s'";
    //     $s = sprintf($sql,$email,$pass,$status);
    //     $query = $this->db->query($s);
    //     $data = $query->row_array();
    //     return $data;
    // }

    // public function sign($name,$email,$pass,$status){
    //     $sql = "Insert into Person values (null,%s,%s,%s,%s)";
    //     $s = sprintf($sql,$this->db->escape($name),$this->db->escape($email),$this->db->escape($pass),$this->db->escape($status));
    //     $this->db->query($s);
    // }

    // /// ********** NEW ********** ///
    // public function getAllUser(){

    //     $query = $this->db->query("Select * from Person where statut = 'Client'");

    //     $resultat = array();
    //     $i = 0;
    //     foreach ($query -> result_array() as $row){
    //         $resultat[$i]= $row;
    //         $i++;
    //     }

    //     return $resultat;

    // }

    // public function CountAllUser(){
    //     $query = $this->db->query("Select count(idPerson) as count from Person where statut = 'Client'");

    //     $resultat = $query->row_array();

    //     return $resultat['count'];
    // }


    public function signup($email, $pass, $status){
        $sql = "select * from Person where email = '%s' and pass = '%s' and statut = '%s'";
        $s = sprintf($sql,$email,$pass,$status);
        $query = $this->db->query($s);
        $data = $query->row_array();
        return $data;
    }

    public function sign($name,$email,$pass,$status){
        $sql = "Insert into Person values (null,%s,%s,%s,%s)";
        $s = sprintf($sql,$this->db->escape($name),$this->db->escape($email),$this->db->escape($pass),$this->db->escape($status));
        $this->db->query($s);
    }

    /// ********** NEW ********** ///
    public function getAllUser(){

        $query = $this->db->query("Select * from Person where statut = 'Client'");

        $resultat = array();
        $i = 0;
        foreach ($query -> result_array() as $row){
            $resultat[$i]= $row;
            $i++;
        }

        return $resultat;

    }

    public function CountAllUser(){
        $query = $this->db->query("Select count(idPerson) as count from Person where statut = 'Client'");

        $resultat = $query->row_array();

        return $resultat['count'];
    }


    public function gethisto($idpropostion){
        $sql ="Select idProducts1,idProduct2,idPerson1,idPerson2 from Proposition where idProposition = %s";
        $sql = sprintf($sql,$idpropostion);
        $query = $this->db->query($sql);
        $resultat = array();
        $i = 0;
        foreach ($query -> result_array() as $row){
            $resultat[$i]= $row;
            $i++;
        }

        return $resultat;

    }



    public function insertHistorique($idProduct,$idProprietaire)
    {
        $sql = "Insert into HistoriqueExchange values (null,%s,%s,now())";
        $s = sprintf($sql,$this->db->escape($idProduct),$this->db->escape($idProprietaire));
        $this->db->query($s);
    }

    public function hist($idpropostion){
        $data  = 
        $this->gethisto($idpropostion);
        foreach ($data as $values) {
        $this->insertHistorique($values['idProducts1'],$values['idPerson1']);
        $this->insertHistorique($values['idProduct2'],$values['idPerson2']);

        }
    }
	
}
