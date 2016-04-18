<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of implementMessage
 *
 * @author 001315017
 */
class Message implements IMessage {
    protected $msg = [];
    
    public function getAllMessages() {
       return $this->msg ;
    }
    public function addMessage($key, $msg) {
      $this->msg[$key] = $msg ;
    }
    public function removeMessage($key) {
        unset($this->msg[$key]) ;
    }   
    
}
