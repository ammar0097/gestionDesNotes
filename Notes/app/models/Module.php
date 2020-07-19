<?php
  class Module {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getModules(){
      $this->db->query('SELECT id,intitule  from modules ORDER BY 1 ASC');

      $results = $this->db->resultSet();

      return $results;
    }

    public function getModulesByChoice($filiere,$classe){
      $this->db->query('SELECT * FROM modules where id in ( select id from filiere_classe where id_filiere = :id_filiere and id_classe = :id_classe)
      ORDER BY id');
      // Bind values
      $this->db->bind(':id_classe', $classe);
      $this->db->bind(':id_filiere', $filiere);

      $results = $this->db->resultSet();

      return $results;
    }

    public function getAssignsByModule($id){
      $this->db->query('SELECT fc.id_filiere,fc.id_classe,f.nom_filiere,c.nom_classe  from filiere_classe fc, filieres f, classes c 
      WHERE id = :id  
      AND fc.id_filiere = f.id_filiere
      AND fc.id_classe = c.id_classe
      ORDER BY 1 ASC');

      // Bind values
      $this->db->bind(':id', $id);

      $results = $this->db->resultSet();

      return $results;
    }

    public function addModule($data){
      $this->db->query('INSERT INTO modules (intitule) VALUES ( :intitule)');
      // Bind values
      $this->db->bind(':intitule', $data['intitule']);
      $this->db->bind(':intitule', $data['intitule']);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function addAssign ($data){
      $this->db->query('INSERT INTO filiere_classe (id_filiere, id_classe, id) VALUES ( :id_filiere, :id_classe, :id)');
      // Bind values
      $this->db->bind(':id_filiere', $data['filiere']);
      $this->db->bind(':id_classe', $data['classe']);
      $this->db->bind(':id', $data['id']);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateModule($data){
      $this->db->query('UPDATE modules SET intitule=:intitule WHERE id=:id');
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

    public function getModuleById($id){
      $this->db->query('SELECT * FROM modules WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function deleteModule($id){
      $this->db->query('DELETE FROM modules WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function deleteAssign($id,$id_filiere,$id_classe){
      $this->db->query('DELETE FROM filiere_classe WHERE id = :id AND id_filiere = :id_filiere AND id_classe = :id_classe ');
      // Bind values
      $this->db->bind(':id', $id);
      $this->db->bind(':id_filiere', $id_filiere);
      $this->db->bind(':id_classe', $id_classe);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }