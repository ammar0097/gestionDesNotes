<?php
  class Admin {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getAdmins(){
      $this->db->query("SELECT a.id_admin,a.nom,a.prenom,a.id_user,u.email
                        FROM admins a,users u
                        WHERE a.id_user=u.id_user
                        ORDER BY(id_admin)");

      $results = $this->db->resultSet();

      return $results;
    }
    





    public function addAdmin($data,$id){
      $this->db->query('INSERT INTO admins (nom,prenom,id_user) VALUES ( :nom, :prenom,:id_user)');
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

    public function updateAdmin($data){
      $this->db->query('UPDATE admins SET nom=:nom,prenom=:prenom WHERE id_admin=:id_admin');
      // Bind values
      $this->db->bind(':id_admin', $data['id']);
      $this->db->bind(':nom', $data['nom']);
      $this->db->bind(':prenom', $data['prenom']);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getAdminById($id){
      $this->db->query('SELECT * FROM admins WHERE id_admin = :id_admin');
      $this->db->bind(':id_admin', $id);

      $row = $this->db->single();

      return $row;
    }

  

    public function deleteAdmin($id){
      $this->db->query('DELETE FROM admins WHERE id_admin = :id_admin');
      // Bind values
      $this->db->bind(':id_admin', $id);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


    
   
  }