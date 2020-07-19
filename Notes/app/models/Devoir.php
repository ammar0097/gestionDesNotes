<?php
  class Devoir {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getDevoirs(){
        $this->db->query('SELECT * from devoirs ORDER BY (id_devoir)');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addDevoir($data){
      $this->db->query('INSERT INTO devoirs (type_devoir) VALUES (:type_devoir)');
      // Bind values
      $this->db->bind(':type_devoir', $data['devoir']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateDevoir($data){
      $this->db->query('UPDATE devoirs SET type_devoir=:devoir WHERE id_devoir=:id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':devoir', $data['devoir']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    

    public function getDevoirById($id){
      $this->db->query('SELECT * FROM devoirs WHERE id_devoir = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;

    }

    public function deleteDevoir($id){
      $this->db->query('DELETE FROM devoirs WHERE id_devoir = :id');
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