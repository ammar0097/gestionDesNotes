<?php
  class Classe {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getClasses(){
        $this->db->query('SELECT * from classes ORDER BY (id_classe)');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addClasse($data){
      $this->db->query('INSERT INTO classes (nom_classe) VALUES (:classe)');
      // Bind values
      $this->db->bind(':classe', $data['classe']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateClasse($data){
      $this->db->query('UPDATE classes SET nom_classe=:classe WHERE id_Classe=:id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':classe', $data['classe']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getClasseById($id){
      $this->db->query('SELECT * FROM classes WHERE id_Classe = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;

    }

    public function deleteClasse($id){
      $this->db->query('DELETE FROM classes WHERE id_classe = :id');
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