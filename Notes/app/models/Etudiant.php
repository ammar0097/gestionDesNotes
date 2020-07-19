<?php
  class Etudiant {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getEtudiants(){
      $this->db->query("SELECT e.num,e.nom,e.prenom,e.id_user,f.nom_filiere,u.email,c.nom_classe
                        FROM etudiants e,filieres f,users u,classes c
                        WHERE e.id_filiere=f.id_filiere 
                        AND e.id_user=u.id_user
                        AND c.id_classe=e.id_classe
                        ORDER BY(num)");

      $results = $this->db->resultSet();

      return $results;
    }
    





    public function addEtudiant($data,$id){
      $this->db->query('INSERT INTO etudiants (nom,prenom,id_filiere,id_classe,id_user) VALUES ( :nom, :prenom, :id_filiere, :id_classe, :id_user)');
      // Bind values
      $this->db->bind(':nom', $data['nom']);
      $this->db->bind(':prenom', $data['prenom']);
      $this->db->bind(':id_filiere', $data['filiere']);
      $this->db->bind(':id_classe', $data['classe']);
      $this->db->bind(':id_user', $id->id_user);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateEtudiant($data){
      $this->db->query('UPDATE etudiants SET nom=:nom,prenom=:prenom,id_filiere=:id_filiere,id_classe=:id_classe WHERE num=:num');
      // Bind values
      $this->db->bind(':num', $data['num']);
      $this->db->bind(':nom', $data['nom']);
      $this->db->bind(':prenom', $data['prenom']);
      $this->db->bind(':id_filiere', $data['filiere']);
      $this->db->bind(':id_classe', $data['classe']);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getEtudiantByNum($num){
      $this->db->query('SELECT * FROM etudiants WHERE num = :num');
      $this->db->bind(':num', $num);

      $row = $this->db->single();

      return $row;
    }

    public function getEtudiantByChoice($filiere,$classe){
      $this->db->query('SELECT * FROM etudiants WHERE id_filiere = :filiere AND id_classe = :classe');
      $this->db->bind(':filiere', $filiere);
      $this->db->bind(':classe', $classe);

      $results = $this->db->resultSet();
      
      return $results;
    }

  

    public function deleteEtudiant($num){
      $this->db->query('DELETE FROM etudiants WHERE num = :num');
      // Bind values
      $this->db->bind(':num', $num);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


    
    //nombre totale des étudiants

    public function getNbEtudiants()
    {
      $this->db->query("SELECT  COUNT(*) as nbEtudiants FROM etudiants");
      $row = $this->db->single();

      return $row;

    }


  }