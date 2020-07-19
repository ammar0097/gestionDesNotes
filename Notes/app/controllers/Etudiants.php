<?php
  class Etudiants extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      if( ($_SESSION['user_role_id'])!=1)
      {
        redirect('pages');
      }

      $this->etudiantModel = $this->model('Etudiant');
      $this->filiereModel = $this->model('Filiere');
      $this->userModel = $this->model('User');
      $this->classeModel = $this->model('Classe');


    }

    public function index(){
      // Get etudiants
      $etudiants = $this->etudiantModel->getEtudiants();
      $data = [
        'etudiants' => $etudiants,
      ];
      $this->view('etudiants/index',$data);//, $data
    }



   

  //ajout
  public function add(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $data = [
        'nom'       =>trim($_POST["nom"]),
        'prenom'    =>trim($_POST["prenom"]),
        'filiere'   =>trim($_POST["filiere"]),
        'classe'   =>trim($_POST["classe"]),
        'email'     =>trim($_POST["email"]),
        'password'  =>trim($_POST["password"])
      ];

      if($this->userModel->addUserEtud($data)){
        $id = $this->userModel->getUserByEmail($data['email']); 
        if($this->etudiantModel->addEtudiant($data,$id)){
          redirect('etudiants');
        }
        else
        die("Erreur d'ajout de l'etudiant !!! ");
      } else 
        die("Erreur d'ajout de l'etudiant !!! ");
    }
    else
    {
      $filieres = $this->filiereModel->getFilieres();
      $classes= $this->classeModel->getClasses();

        $data = [
          'filieres' => $filieres,
          'classes' => $classes
        ];
        $this->view('etudiants/add',$data);
    }
    
  }

    public function edit($num){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = [
          'num' => $num,
          'nom'       =>trim($_POST["nom"]),
          'prenom'    =>trim($_POST["prenom"]),
          'filiere'   =>trim($_POST["filiere"]),
          'classe'   =>trim($_POST["classe"]),
          'email'     =>trim($_POST["email"]),
          'password'  =>$_POST["password"],
          'id_user'   =>$this->etudiantModel->getEtudiantByNum($num)->id_user
        ];
        if(($this->etudiantModel->updateEtudiant($data)) && ($this->userModel->updateUser($data))){
          redirect('etudiants');
        } else 
          die("Erreur de modification de l'étudiant !!!");
      } else {
        // Get existing etudiant from model
        $etudiant = $this->etudiantModel->getEtudiantByNum($num);
        $filieres = $this->filiereModel->getFilieres();
        $classes= $this->classeModel->getClasses();
        $user = $this->userModel->getUserById($etudiant->id_user);
        $data = [
          'num' => $num,
          'nom'       =>$etudiant->nom,
          'prenom'    =>$etudiant->prenom,
          'filieres'   =>$filieres,
          'classes' => $classes,
          'email'     =>$user->email
        ];
  
        $this->view('etudiants/edit', $data);
      }
    }

    public function delete($num){
      // Get existing etudiant from model
      $etudiant = $this->etudiantModel->getEtudiantByNum($num);

      if(($this->etudiantModel->deleteEtudiant($num)) && ($this->userModel->deleteUser($etudiant->id_user))){
        redirect('etudiants');
      } else {
        die("Erreur de suppression de l'étudiant !!!");
      }
    }
  }