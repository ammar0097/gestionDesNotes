<?php
  class Filiere {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getFilieres(){
        $this->db->query('SELECT * from filieres ORDER BY (id_filiere)');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addFiliere($data){
      $this->db->query('INSERT INTO filieres (nom_filiere) VALUES (:filiere)');
      // Bind values
      $this->db->bind(':filiere', $data['filiere']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateFiliere($data){
      $this->db->query('UPDATE filieres SET nom_filiere=:filiere WHERE id_filiere=:id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':filiere', $data['filiere']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getFiliereById($id){
      $this->db->query('SELECT * FROM filieres WHERE id_filiere = :id');
      $this->db->bind(':id', $id);
      $row = $this->db->single();
      return $row;
    }

    public function deleteFiliere($id){
      $this->db->query('DELETE FROM filieres WHERE id_filiere = :id');
      // Bind values
      $this->db->bind(':id', $id);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }