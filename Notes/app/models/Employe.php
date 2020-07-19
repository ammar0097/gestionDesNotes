<?php
  class Employe {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getEmployes(){
      $this->db->query("SELECT e.id_employe,e.nom,e.prenom,e.id_user,u.email
                        FROM employes e,users u
                        WHERE e.id_user=u.id_user
                        ORDER BY(id_employe)");

      $results = $this->db->resultSet();

      return $results;
    }
    





    public function addEmploye($data,$id){
      $this->db->query('INSERT INTO employes (nom,prenom,id_user) VALUES ( :nom, :prenom,:id_user)');
      // Bind values
      $this->db->bind(':nom', $data['nom']);
      $this->db->bind(':prenom', $data['prenom']);
      $this->db->bind(':id_user', $id->id_user);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateEmploye($data){
      $this->db->query('UPDATE employes SET nom=:nom,prenom=:prenom WHERE id_employe=:id_employe');
      // Bind values
      $this->db->bind(':id_employe', $data['id']);
      $this->db->bind(':nom', $data['nom']);
      $this->db->bind(':prenom', $data['prenom']);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getEmployeById($id){
      $this->db->query('SELECT * FROM employes WHERE id_employe = :id_employe');
      $this->db->bind(':id_employe', $id);

      $row = $this->db->single();

      return $row;
    }

  

    public function deleteEmploye($id){
      $this->db->query('DELETE FROM employes WHERE id_employe = :id_employe');
      // Bind values
      $this->db->bind(':id_employe', $id);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


  }