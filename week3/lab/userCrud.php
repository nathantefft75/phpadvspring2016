<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userCrud
 *
 * @author 001315017
 */
class userCrud{
    
  
  
      function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
      function getUser($email)
    {
            $db = $this->getDb();
        $stmt = $db->prepare("select * from users WHERE email = :email)");
        $bind = array(
           
             ":email"=> $values['email'],
          
         
                 );
         $userInfo = array();
            if ($stmt->execute($bind) && $stmt->rowCount() > 0) {
                        $userInfo = $stmt->fetchall(PDO::FETCH_ASSOC);
                }
                return  $userInfo;
    }

}
