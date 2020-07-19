<?php

class Admins extends Controller {
  
  
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      if( ($_SESSION['user_role_id'])!=2)
      {
        redirect('pages');
      }

      $this->noteModel = $this->model('Note');
      $this->etudiantModel = $this->model('Etudiant');
      $this->semestreModel = $this->model('Semestre');
      $this->moduleModel = $this->model('Module');
      $this->filiereModel = $this->model('Filiere');
      $this->userModel = $this->model('User');
      $this->adminModel = $this->model('Admin');

    }




    public function index(){

      // Get admins
      $admins = $this->adminModel->getAdmins();
      $data = [
        'admins' => $admins,
      ];
      $this->view('admins/index',$data);//, $data
        

     }


    
      //ajout
  public function add(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $data = [
        'nom'       =>trim($_POST["nom"]),
        'prenom'    =>trim($_POST["prenom"]),
        'email'     =>trim($_POST["email"]),
        'password'  =>trim($_POST["password"])
      ];

      if($this->userModel->addUserAdm($data)){
        $id = $this->userModel->getUserByEmail($data['email']); 
        if($this->adminModel->addAdmin($data,$id)){
          redirect('admins');
        }
        else
        die("Erreur d'ajout de l'admin !!! ");
      } else 
        die("Erreur d'ajout de l'admin !!! ");
    }
    else
    {
        $this->view('admins/add');
    }
    
  }

    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = [
          'id' => $id,
          'nom'       =>$_POST["nom"],
          'prenom'    =>$_POST["prenom"],
          'email'     =>$_POST["email"],
          'password'  =>$_POST["password"],
          'id_user'   =>$this->adminModel->getAdminById($id)->id_user
        ];
        if(($this->adminModel->updateAdmin($data)) && ($this->userModel->updateUser($data))){
          redirect('admins');
        } else 
          die("Erreur de modification de l'admin !!!");
      } else {
        // Get existing admin from model
        $admin = $this->adminModel->getAdminById($id);
        $user = $this->userModel->getUserById($admin->id_user);
        $data = [
          'id' => $id,
          'nom'       =>$admin->nom,
          'prenom'    =>$admin->prenom,
          'email'     =>$user->email
        ];
  
        $this->view('admins/edit', $data);
      }
    }

    
    public function delete($id){
      // Get existing admin from model
      $admin = $this->adminModel->getAdminById($id);

      if(($this->adminModel->deleteAdmin($id)) && ($this->userModel->deleteUser($admin->id_user))){
        redirect('admins');
      } else {
        die("Erreur de suppression de l'admin !!!");
      }
    }
  }

 


  