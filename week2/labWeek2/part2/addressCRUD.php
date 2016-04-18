<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of addressCRUD
 *
 * @author 001315017
 */
class addressCRUD extends DB implements ICRUD {
      function __construct()
    {
        $this->setDns('mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2016');
        $this->setPassword('');
        $this->setUser('root');    
    }
   function create($values)
   {
     
        $db = $this->getDb();
        $stmt = $db->prepare("INSERT INTO address (fullname, email, address, city, state, zip, birthday) VALUES (:fullname, :email, :address, :city, :state, :zip, :birthday)");
        $bind = array(
             ":fullname"=> $values['fullname'],
             ":email"=> $values['email'],
             ":address"=> $values['address'],
             ":city"=> $values['city'],
             ":state"=> $values['state'],
             ":zip"=> $values['zip'],
             ":birthday"=> $values['birthday'],
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
         $stmt = $db->prepare("SELECT * FROM address");
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
      function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
    function addAddress($fullname, $addressline1, $email, $city, $state, $zip, $birthday ) {
    
    $db = $this->getDb();
    $stmt = $db->prepare("INSERT INTO address SET fullname = :fullname, addressline1 = :addressline1, email = :email, city = :city, state = :state, zip= :zip, birthday = :birthday");
    $binds = array(
        ":fullname" => $fullname,
        ":addressline1" => $addressline1,
         ":email" => $email,
         ":city" => $city,
         ":state" => $state,
         ":zip" => $zip,
         ":birthday" => $birthday,
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    
    return false;
}

}
