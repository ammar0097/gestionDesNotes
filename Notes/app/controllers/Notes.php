<?php
  class Notes extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->noteModel = $this->model('Note');
      $this->etudiantModel = $this->model('Etudiant');
      $this->semestreModel = $this->model('Semestre');
      $this->moduleModel = $this->model('Module');
      $this->filiereModel = $this->model('Filiere');
      $this->classeModel = $this->model('Classe');
      $this->devoirModel = $this->model('Devoir');

    }

    public function index(){
      // Get all notes if user role == employée(1)
      if(($_SESSION['user_role_id'])==1){
      $notes = $this->noteModel->getNotes();
      $data = [
        'notes' => $notes
      ];
      $this->view('notes/index',$data);//, $data
    }
     // Get just notes of etudiant if user role == etudiant(3)
     if(($_SESSION['user_role_id'])==3){
      $notes = $this->noteModel->getNotesById($_SESSION['id_user']);
      $data = [
        'notes' => $notes
      ];
      $this->view('notes/index',$data);//, $data
    }

    }

    //methode pour choisir la filiere de note
   public function choix(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $semestres = $this->semestreModel->getSemestres();
      $devoirs = $this->devoirModel->getDevoirs();
      
      $classe = $this->classeModel->getClasseById(trim($_POST['classe']));
      $filiere = $this->filiereModel->getFiliereById(trim($_POST['filiere']));
      
      $modules = $this->moduleModel->getModulesByChoice(trim($_POST['filiere']),trim($_POST['classe']));
      $etudiants = $this->etudiantModel->getEtudiantByChoice(trim($_POST['filiere']),trim($_POST['classe']));

      $data = [
        'semestres' => $semestres,
        'modules'   => $modules,
        'etudiants' => $etudiants,
        'filiere'   => $filiere,
        'classe'    => $classe,
        'devoirs'   =>$devoirs
      ];
      $this->view('notes/add',$data);
      
    }
      else{
        $filieres = $this->filiereModel->getFilieres();
        $classes = $this->classeModel->getClasses();
        $data = [
          'filieres' => $filieres,
          'classes' => $classes
        ];
        $this->view('notes/choix',$data);
      }
  }

  
    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = [
          'note'          =>  trim($_POST["note"]),
          'etudiant'      =>  trim($_POST["etudiant"]),
          'semestre'      =>  trim($_POST["semestre"]),
          'module'        =>  trim($_POST["module"]), 
          'filiere'       =>  trim($_POST["filiere"]),
          'classe'        =>  trim($_POST["classe"]),
          'devoir'        =>  trim($_POST["devoir"])
        ];
        if($this->noteModel->addNote($data)){
          redirect('notes');
        } else 
          die("Erreur d'ajout de la note !!! ");
      }
      
    }

    

    public function delete($etudiant, $semestre, $module, $filiere, $classe, $devoir){

      if($this->noteModel->deleteNote($etudiant, $semestre, $module, $filiere, $classe, $devoir)){
        redirect('notes');
      } else {
        die("Erreur de suppression de la note!!!");
      }
    }
  }