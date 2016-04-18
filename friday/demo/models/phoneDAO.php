<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of phoneCRUD
 *
 * @author 001315017
 */
class phoneDAO extends DB implements IDAO {
    function __construct()
    {
        $this->setDns('mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2016');
        $this->setPassword('');
        $this->setUser('root');    
    }
    function create($values)
    {
       $phoneNumber = $values['phone'];
        $phoneType = $values['phonetype'];
         $db = $this->getDb();
         $stmt = $db->prepare("INSERT INTO phone (phone, phonetype) VALUES (:phone, :phoneType)");
         $bind = array(
                 ":phone"=> $values['phone'],
                 ":phoneType"=> $values['phonetype'],
                 );
            if ($stmt->execute($bind) && $stmt->rowCount() > 0) {
                         return true;
                }
    }
    function read($id)
    {
        
    }
    function readAll()
    {
         $db = $this->getDb();
         $stmt = $db->prepare("SELECT * FROM phone");
         $results = array();
         if ($stmt->execute() && $stmt->rowCount() > 0) 
          {
                 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
          }
    
           return $results;
    }
    function update($values)
    {
        
    }
    function delete($id)
    {
        
    }
    
}
