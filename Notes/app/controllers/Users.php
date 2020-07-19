<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
    }




    public function login()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
               //process form
            //init data
            $data =[
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'error' => false, 
              ];

              //validate email
              if(empty($data['email'])){
                  $data['error'] = true;
              }
          
            //validate password
            if(empty($data['password'])){
                $data['error'] = true;
            }

            // check user email

            if($this->userModel->findUserByEmail($data['email']))
            {
                //user found

            }else{
                //user not found
                $data['error'] = true;
            }           

            if((!$data['error']) && (!$data['error'])){
                //validated
                //check and set logged in user
                $loggedInUser= $this->userModel->login($data['email'],$data['password']);
                if($loggedInUser){
                    //create session
                    $this->createUserSession($loggedInUser);
                }
                else{
                    $data['error'] = true;
                    $this->view('users/login',$data);
                }
            }
            else{
                //load view with errors
                $this->view('/users/login',$data);
            }
        }

        else{

            $data =[
              'error' => false,
            ];

            //load view

            $this->view('users/login',$data);
        }

    }



    public function createUserSession($user){
      $_SESSION['id_user'] = $user->id_user;
      $_SESSION['user_username'] = $user->username;
      $_SESSION['user_role_id'] = $user->user_role_id;
      redirect('pages');
  
    }




    public function logout(){
      unset($_SESSION['id_user']);
      unset($_SESSION['user_username']);
      session_destroy();
      redirect('users/login');
    }
  }