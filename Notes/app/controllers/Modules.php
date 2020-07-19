<?php
  class Modules extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      if( ($_SESSION['user_role_id'])!=2)
      {
        redirect('pages');
      }

      $this->moduleModel = $this->model('Module');
      $this->filiereModel = $this->model('Filiere');
      $this->classeModel = $this->model('Classe');
    }

    public function index(){
      // Get modules
      $modules = $this->moduleModel->getModules();
      $data = [
        'modules' => $modules
      ];
      $this->view('modules/index',$data);
    }

    public function assign($id){
      // Get modules
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        redirect('modules');
      }
      else
      {
        $nom = $this->moduleModel->getModuleById($id);
        $modules = $this->moduleModel->getAssignsByModule($id);
        $filieres = $this->filiereModel->getFilieres();
        $classes = $this->classeModel->getClasses();
        $filieres = $this->filiereModel->getFilieres();
        $classes = $this->classeModel->getClasses();
        $data = [
          'id' => $id,
          'modules' => $modules,
          'nom' => $nom,
          'filieres' => $filieres,
          'classes' => $classes
        ];
        $this->view('modules/assign',$data);
      }
      
    }

    public function addAssign($id) {
      $data = [
        'id'          => $id,
        'filiere'     =>$_POST["filiere"], 
        'classe'      =>$_POST["classe"]
      ];
      if($this->moduleModel->addAssign($data)){
       $this->assign($id);
      } else 
        die("Erreur d'ajout du module !!! ");
    }

    public function deleteAssign($id,$id_filiere,$id_classe) {
      if($this->moduleModel->deleteAssign($id,$id_filiere,$id_classe)){
        $this->assign($id);
      } else {
        die("Erreur de suppression du module !!!");
      }
    }

    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = [
          'intitule'       =>$_POST["intitule"], 
        ];
        if($this->moduleModel->addModule($data)){
          redirect('modules');
        } else 
          die("Erreur d'ajout du module !!! ");
      }
      else
        $this->view('modules/add');
    }

    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = [
          'id' => $id,
          'intitule'       =>$_POST["intitule"],
        ];
        if($this->moduleModel->updateModule($data)){
          redirect('modules');
        } else 
          die("Erreur de modification du module !!!");
      } else {
        // Get existing module from model
        $module = $this->moduleModel->getModuleById($id);
        $data = [
          'id' => $id,
          'intitule'       =>$module->intitule,
        ];
  
        $this->view('modules/edit', $data);
      }
    }

    public function delete($id){
      // Get existing module from model
      $module = $this->moduleModel->getModuleById($id);

      if($this->moduleModel->deleteModule($id)){
        redirect('modules');
      } else {
        die("Erreur de suppression du module !!!");
      }
    }
  }