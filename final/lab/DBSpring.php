 <?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author 001315017
 */
class DBSpring extends DB {
     function __construct() {
        
        $this->setDns('mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2016');
        $this->setPassword('');
        $this->setUser('root');
        
    }
        function isPostRequest() {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
    }
      function getUsers($email)
    {
              $db = $this->getDb();
        $stmt = $db->prepare("select * from users WHERE email = :email");
        $bind = array(
           
             ":email"=> $email
          
         
                 );
         $userInfo = array();
            if ($stmt->execute($bind) && $stmt->rowCount() > 0) {
                        $userInfo = $stmt->fetchall(PDO::FETCH_ASSOC);
                }
                return  $userInfo;
    }
  function create($values)
   {
   
          
       $newPassword = password_hash($values['password'], PASSWORD_DEFAULT);
        $db = $this->getDb();
        $stmt = $db->prepare("INSERT INTO users ( email, password, created) VALUES ( :email, :password, now())");
        $bind = array(
           
             ":email"=> $values['email'],
             ":password"=> $newPassword
            
          
                 );
            if ($stmt->execute($bind) && $stmt->rowCount() > 0) {
                         return true;
                }
                return false;
   }
     function createImage($user_id, $filename, $title )
   {
   
          
      
        $db = $this->getDb();
        $stmt = $db->prepare("INSERT INTO photos ( user_id, filename, title, created) VALUES ( :user_id, :filename, :title, now())");
        $bind = array(
           
             ":user_id"=> $user_id,
             ":filename"=> $filename,
            ":title"=>$title
            
          
                 );
            if ($stmt->execute($bind) && $stmt->rowCount() > 0) {
                         return true;
                }
                return false;
   }
  
    function read($id)
    {
        
    }
    
    function readAll()
    {
         
    }
    function update($values)
    {
        
    }
       function allMeme()
   {
         $db = $this->getDb();
        $stmt = $db->prepare("select * from photos");
      
       
            if ($stmt->execute() && $stmt->rowCount() > 0) {
                        $userInfo = $stmt->fetchall(PDO::FETCH_ASSOC);
                }
                return  $userInfo;
   }
   function randomMeme($randomImageID)
   {
         $db = $this->getDb();
        $stmt = $db->prepare("select * from photos WHERE photo_id = :photo_id");
        $bind = array(
           
             ":photo_id"=> $randomImageID
          
         
                 );
         $userInfo = array();
            if ($stmt->execute($bind) && $stmt->rowCount() > 0) {
                        $userInfo = $stmt->fetchall(PDO::FETCH_ASSOC);
                }
             
                return  $userInfo;
   }
    function delete($filename)
    {
              $db = $this->getDb();
        $stmt = $db->prepare("DELETE FROM photos WHERE filename = :filename");
        $bind = array(
           
           
             ":filename"=> $filename
          
            
          
                 );
            if ($stmt->execute($bind) && $stmt->rowCount() > 0) {
                         return true;
                }
                return false;
    }
    function pullUserImages($user_id)
    {
            $db = $this->getDb();
        $stmt = $db->prepare("select * from photos WHERE user_id = :user_id");
        $bind = array(
           
             ":user_id"=> $user_id
          
         
                 );
         $userInfo = array();
            if ($stmt->execute($bind) && $stmt->rowCount() > 0) {
                        $userInfo = $stmt->fetchall(PDO::FETCH_ASSOC);
                }
                return  $userInfo;
    }
}
