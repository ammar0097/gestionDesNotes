<?php

class Statistiques extends Controller {
  
  
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      if( ($_SESSION['user_role_id'])!=2)
      {
        redirect('pages');
      }

      $this->statistiqueModel = $this->model('Statistique');

      
    }


    public function index(){

        $nbUsers =  $this->statistiqueModel->getNbUsers();
        $nbEtudiants = $this->statistiqueModel->getNbEtudiants();
        $NbEmployes =  $this->statistiqueModel->getNbEmployes();
        $nbAdmins =  $this->statistiqueModel->getNbAdmins();
  
        $data = [
          'nbUsers' => $nbUsers->nb,
          'nbEtudiants' => $nbEtudiants->nb,
          'NbEmployes' => $NbEmployes->nb,
          'nbAdmins' => $nbAdmins->nb
        ];
  
  
         $this->view('statistiques/index',$data);

     }



    }
  
 


  