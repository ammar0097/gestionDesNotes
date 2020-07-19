<?php
  class Semestre {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getSemestres(){
      $this->db->query('SELECT id,intitule  from semestres ORDER BY 1 DESC');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addSemestre($data){
      $this->db->query('INSERT INTO semestres (intitule) VALUES ( :intitule)');
      // Bind values
      $this->db->bind(':intitule', $data['intitule']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateSemestre($data){
      $this->db->query('UPDATE semestres SET intitule=:intitule WHERE id=:id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':intitule', $data['intitule']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getSemestreById($id){
      $this->db->query('SELECT * FROM semestres WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function deleteSemestre($id){
      $this->db->query('DELETE FROM semestres WHERE id = :id');
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