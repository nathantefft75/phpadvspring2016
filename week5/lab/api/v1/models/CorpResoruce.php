<?php

class CorpResoruce implements IRestModel {
    
      private $db;

    function __construct() {
        
        $util = new Util();
        $dbo = new DB($util->getDBConfig());
        $this->setDb($dbo->getDB());        
    }

    private function getDb() {
        return $this->db;
    }

    private function setDb($db) {
        $this->db = $db;
    }

    
    
    
    
    public function getAll() {
        $stmt = $this->getDb()->prepare("SELECT * FROM corps");
        $results = array();      
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
    }
    
    public function get($id) {
       
        $stmt = $this->getDb()->prepare("SELECT * FROM corps where id = :id");
        $binds = array(":id" => $id);

        $results = array(); 
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        return $results;
                
    }
    
    public function post($serverData) {
        /* note you should validate before adding to the data base */
        $stmt = $this->getDb()->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = :incorp_dt, email = :email, owner =:owner, phone = :phone, location = :location ");
        $binds = array(
           ":corp" => $serverData['corp'],
             ":incorp_dt" => $serverData['incorp_dt'],
             ":email" => $serverData['email'],
             ":owner" => $serverData['owner'],
               ":phone" => $serverData['phone'],
                   ":location" => $serverData['location']
        );

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        } 
        return false;
    }
    public function delete ($id)
    {
         $stmt = $this->getDb()->prepare("Delete from corps where id = :id");
             $binds = array(
            ":id" => $id
        );
          if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        } 
    }
    public function put ($id, $serverData)
    {
       $stmt = $this->getDb()->prepare("update corps set corp = :corp, incorp_dt = :incorp_dt, email = :email, owner =:owner, phone = :phone, location = :location ");
             $binds = array(
            ":corp" => $serverData['corp'],
             ":incorp_dt" => $serverData['incorp_dt'],
             ":email" => $serverData['email'],
             ":owner" => $serverData['owner'],
               ":phone" => $serverData['phone'],
                   ":location" => $serverData['location']
        );
          if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        } 
    }
}