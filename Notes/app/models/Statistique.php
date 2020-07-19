<?php
  class Statistique {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }


    
    //nombre totale des étudiants

    public function getNbEtudiants()
    {
      $this->db->query("SELECT  COUNT(*) as nb FROM etudiants");
      $row = $this->db->single();

      return $row;

    }

     


    //nombre totale de users

    public function getNbUsers()
    {
      $this->db->query("SELECT  COUNT(*) as nb FROM users");
      $row = $this->db->single();

      return $row;

    }
    //nombre totale des admins

    public function getNbAdmins()
    {
      $this->db->query("SELECT  COUNT(*) as nb FROM admins");
      $row = $this->db->single();

      return $row;

    }
      //nombre totale des emlpoyés

      public function getNbEmployes()
      {
        $this->db->query("SELECT  COUNT(*) as nb FROM employes");
        $row = $this->db->single();
  
        return $row;
  
      }

     

  }