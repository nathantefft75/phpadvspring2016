<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author 001315017
 */
class DB {
    
    protected $db = null;
   protected  $dns;
    protected  $user;
   protected  $password;
    
    
   

    function getDns() {
        return $this->dns;
    }

    function getUser() {
        return $this->user;
    }

    function getPassword() {
        return $this->password;
    }

    function setDns($dns) {
        $this->dns = $dns;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function __construct($dns, $user, $password) {
        $this->dns = $dns;
        $this->user = $user;
        $this->password = $password;
    }


    
 function getDb() {
   
  if(null != $this->$db)
  {
      return $this->$db;
  }
 
    try {
        /* Create a Database connection and 
         * save it into the variable */
        $db = new PDO($this->getDns(), $this->getUser(), $this->getPassword());
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (Exception $ex) {
        /* If the connection fails we will close the 
         * connection by setting the variable to null */
        closeDB();
        throw new Exception($message = $ex->getMessage());
      
    }

    
    return $this->db;
    }
    private function closeDB()
    {
        $this->db = null;
    }
}
