<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    

   //add user Employé
   public function addUserEmp($data){
    $this->db->query('INSERT INTO users (username,email,password,user_role_id) VALUES ( :username, :email, :password, :role )');
    // Bind values
    $this->db->bind(':username',$data['prenom']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':role', 1);
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }
  
  //add user Administrateur
  public function addUserAdm($data){
    $this->db->query('INSERT INTO users (username,email,password,user_role_id) VALUES ( :username, :email, :password, :role )');
    // Bind values
    $this->db->bind(':username',$data['prenom']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':role', 2);
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }
  
  //add user Etudiant
  public function addUserEtud($data){
    $this->db->query('INSERT INTO users (username,email,password,user_role_id) VALUES ( :username, :email, :password, :role )');
    // Bind values
    $this->db->bind(':username',$data['prenom']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':role', 3);
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

    //find user by email
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email=:email');
        $this->db->bind(':email',$email);
        $row = $this->db->single();

        //check row

        if($this->db->rowCount() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //get user by email
    public function getUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email=:email');
        $this->db->bind(':email',$email);
        $row = $this->db->single();

        //execute

        return $row;

    }


    //find user by id
    public function findUserById($id)
    {
        $this->db->query('SELECT * FROM users WHERE id_user=:id');
        $this->db->bind(':id',$id);
        $row = $this->db->single();

        // check row
        if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }

    //get user by id
    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM users WHERE id_user=:id');
        $this->db->bind(':id',$id);
        $row = $this->db->single();

        return $row;
    }

    //update user
    public function updateUser($data){
      $this->db->query('UPDATE users SET username=:username,email=:email,password=:password WHERE id_user=:id');
      // Bind values
      $this->db->bind(':username', $data['prenom']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':id',$data['id_user']);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function deleteUser($id){
      $this->db->query('DELETE FROM users WHERE id_user = :id');
      // Bind values
      $this->db->bind(':id', $id);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Login User
    public function login($email,$password)
    {
        $this->db->query("SELECT * FROM users WHERE email=:email");
        $this->db->bind(':email',$email);
        $row = $this->db->single();
        //$hashed_password = $row->password;
       // if(password_verify($password,$hashed_password)){
      
      
        // cette if pour tester sans hash
         if($password == $row->password){
          return $row;
         }

         
           
        else{
            return false;
        }
    }




    //nombre totale de users

    public function getNbUsers()
    {
      $this->db->query("SELECT  COUNT(*) as nbUsers FROM users");
      $row = $this->db->single();

      return $row;

    }

  



   }
    


  //}