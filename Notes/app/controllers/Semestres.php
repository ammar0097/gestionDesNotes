<?php
  class Semestres extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      if( ($_SESSION['user_role_id'])!=2 )
      {
        redirect('pages');
      }

      $this->semestreModel = $this->model('Semestre');
    }

    public function index(){
      // Get semestres
      $semestres = $this->semestreModel->getSemestres();
      $data = [
        'semestres' => $semestres
      ];
      $this->view('semestres/index',$data);
    }

    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = [
          'intitule'       =>$_POST["intitule"], 
        ];
        if($this->semestreModel->addSemestre($data)){
          redirect('semestres');
        } else 
          die("Erreur d'ajout du semestre !!! ");
      }
      else
        $this->view('semestres/add');
    }

    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = [
          'id' => $id,
          'intitule'       =>$_POST["intitule"],
        ];
        if($this->semestreModel->updateSemestre($data)){
          redirect('semestres');
        } else 
          die("Erreur de modification du semestre !!!");
      } else {
        // Get existing semestre from model
        $semestre = $this->semestreModel->getSemestreById($id);
        $data = [
          'id' => $id,
          'intitule'       =>$semestre->intitule,
        ];
  
        $this->view('semestres/edit', $data);
      }
    }

    public function delete($id){
      // Get existing semestre from model
      $semestre = $this->semestreModel->getSemestreById($id);

      if($this->semestreModel->deleteSemestre($id)){
        redirect('semestres');
      } else {
        die("Erreur de suppression du semestre !!!");
      }
    }
  }