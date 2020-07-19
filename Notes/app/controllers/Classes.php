<?php

class Classes extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      if( ($_SESSION['user_role_id'])!=2)
      {
        redirect('pages');
      }
    
      //import du models
     $this->classeModel = $this->model('Classe');

    }



            //affichage
           public function index(){
            //trouver tous les classes
            $classes = $this->classeModel->getClasses();
            
                $data = [
                    'classes' => $classes
                ];
            
                $this->view('classes/index',$data);
            
            }
        

            //ajout
          public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              $data = [
                'classe'   =>trim($_POST["classe"]) 
              ];
              if($this->classeModel->addClasse($data)){
                redirect('classes');
              } else 
                die("Erreur d'ajout de classe !!! ");
            }
            else
              $this->view('classes/add');
      
          }

          //modification
          public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
           
              $data = [
                'id' => $id,
                'classe' => trim($_POST["classe"])
              ];
              if($this->classeModel->updateClasse($data)){
                redirect('classes');
              } else 
                die("Erreur de modification de classe !!!");
            } else {
              // Obtenir la classe existante à partir du model
              $classe = $this->classeModel->getClasseById($id);
              $data = [
                'id' => $id,
                'classe' => $classe->nom_classe
              ];
        
              $this->view('classes/edit', $data);
            }
          }
      
          //suppression
          public function delete($id){
              // Obtenir la classe existante à partir du model
            $classe = $this->classeModel->getClasseById($id);
      
            if($this->classeModel->deleteClasse($id)){
              redirect('classes');
            } else {
              die("Erreur de suppression de classe !!!");
            }
          }
      

    
      }











