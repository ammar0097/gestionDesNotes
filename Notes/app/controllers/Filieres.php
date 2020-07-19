<?php
class Filieres extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      if( ($_SESSION['user_role_id'])!=2)
      {
        redirect('pages');
      }
    
     $this->filiereModel = $this->model('Filiere');

    }

  

    
    public function index(){
  //get filieres
  $filieres = $this->filiereModel->getFilieres();
  
      $data = [
          'filieres' => $filieres
      ];
  
      $this->view('filieres/index',$data);
  
  }
  
    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = [
          'filiere'   =>trim($_POST["nom_filiere"]) 
        ];
        if($this->filiereModel->addFiliere($data)){
          redirect('filieres');
        } else 
          die("Erreur d'ajout du filiere !!! ");
      }
      else
        $this->view('filieres/add');

    }
    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
     
        $data = [
          'id' => $id,
          'filiere' => trim($_POST["filiere"])
        ];
        if($this->filiereModel->updateFiliere($data)){
          redirect('filieres');
        } else 
          die("Erreur de modification du filiere !!!");
      } else {
        // Get existing filiere from model
        $filiere = $this->filiereModel->getFiliereById($id);
        $data = [
          'id' => $id,
          'filiere' => $filiere->nom_filiere
        ];
  
        $this->view('filieres/edit', $data);
      }
    }

    public function delete($id){
      // Get existing filieres from model
      $filiere = $this->filiereModel->getFiliereById($id);

      if($this->filiereModel->deleteFiliere($id)){
        redirect('filieres');
      } else {
        die("Erreur de suppression du filiere !!!");
      }
    }

}