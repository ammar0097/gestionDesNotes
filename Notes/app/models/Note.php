<?php
  class Note {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getNotes(){
      $this->db->query('SELECT s.intitule as semestre,f.nom_filiere as filiere,m.intitule as module,e.nom,e.prenom,
                        n.note,c.nom_classe as classe,d.type_devoir as devoir,
                        n.num_etudiant as num_etudiant,n.id_semestre as id_semestre,n.id_module as id_module,
                        n.id_filiere as id_filiere,n.id_classe as id_classe, n.id_devoir as id_devoir
                        FROM notes n,etudiants e,semestres s,modules m,filieres f,classes c,devoirs d
                        WHERE n.num_etudiant=e.num
                        AND n.id_semestre=s.id
                        AND n.id_module=m.id
                        AND n.id_filiere=f.id_filiere 
                        AND n.id_classe=c.id_classe 
                        AND n.id_devoir=d.id_devoir 
                        ORDER BY s.intitule,m.intitule,e.nom,e.prenom;');

      $results = $this->db->resultSet();

      return $results;
    }

    public function getNotesById($id_user){
      $this->db->query('SELECT s.intitule as semestre,f.nom_filiere as filiere,m.intitule as module,e.nom,e.prenom,
                        n.note,c.nom_classe as classe,d.type_devoir as devoir,
                        n.num_etudiant as num_etudiant,n.id_semestre as id_semestre,n.id_module as id_module,
                        n.id_filiere as id_filiere,n.id_classe as id_classe, n.id_devoir as id_devoir
                        FROM notes n,etudiants e,semestres s,modules m,filieres f,classes c,devoirs d,users u
                        WHERE n.num_etudiant=e.num
                        AND n.id_semestre=s.id
                        AND n.id_module=m.id
                        AND n.id_filiere=f.id_filiere 
                        AND n.id_classe=c.id_classe 
                        AND n.id_devoir=d.id_devoir 
                        AND e.id_user = u.id_user
                        AND u.id_user=:id_user
                        ORDER BY s.intitule,m.intitule,e.nom,e.prenom;');
       $this->db->bind(':id_user',$id_user);
      $results = $this->db->resultSet();
      return $results;
    }

    public function addNote($data){
      $this->db->query('INSERT INTO notes VALUES ( :note, :etudiant, :semestre , :module , :filiere ,:classe ,:devoir)');
      // Bind values
      $this->db->bind(':note', $data['note']);
      $this->db->bind(':etudiant', $data['etudiant']);
      $this->db->bind(':semestre', $data['semestre']);
      $this->db->bind(':module', $data['module']);
      $this->db->bind('filiere', $data['filiere']);
      $this->db->bind('classe', $data['classe']);
      $this->db->bind('devoir', $data['devoir']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }




    public function deleteNote($etudiant, $semestre, $module, $filiere, $classe, $devoir){
      $this->db->query('DELETE FROM notes WHERE num_etudiant = :etudiant 
      AND id_semestre= :semestre 
      AND id_module= :module
      AND id_filiere = :filiere
      AND id_classe = :classe
      AND id_devoir = :devoir');
      // Bind values
      $this->db->bind(':etudiant', $etudiant);
      $this->db->bind(':semestre', $semestre);
      $this->db->bind(':module', $module);
      $this->db->bind(':filiere', $filiere);
      $this->db->bind(':classe', $classe);
      $this->db->bind(':devoir', $devoir);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }