<?php

class Devoirs extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      if( ($_SESSION['user_role_id'])!=2)
      {
        redirect('pages');
      }
    
     $this->devoirModel = $this->model('Devoir');

    }

    public function index(){
        //get devoirs
        $devoirs = $this->devoirModel->getDevoirs();
        
            $data = [
                'devoirs' => $devoirs
            ];
        
            $this->view('devoirs/index',$data);
        
        }
        
          public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              $data = [
                'devoir'   =>trim($_POST["devoir"]) 
              ];
              if($this->devoirModel->addDevoir($data)){
                redirect('devoirs');
              } else 
                die("Erreur d'ajout du devoir !!! ");
            }
            else
              $this->view('devoirs/add');
      
          }
          public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
           
              $data = [
                'id' => $id,
                'devoir' => trim($_POST["devoir"])
              ];
              if($this->devoirModel->updateDevoir($data)){
                redirect('devoirs');
              } else 
                die("Erreur de modification du devoir !!!");
            } else {
              // Get existing devoir from model
              $devoir = $this->devoirModel->getDevoirById($id);
              $data = [
                'id' => $id,
                'devoir' => $devoir->type_devoir
              ];
        
              $this->view('devoirs/edit', $data);
            }
          }
      
          public function delete($id){
            // Get existing devoirs from model
            $devoir = $this->devoirModel->getDevoirById($id);
      
            if($this->devoirModel->deleteDevoir($id)){
              redirect('devoirs');
            } else {
              die("Erreur de suppression du devoir !!!");
            }
          }
      

    
      }











