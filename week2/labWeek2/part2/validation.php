<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of validation
 *
 * @author 001315017
 */
class validation {
  
          
       
        
     public function isBoxFilledIn($text) {
        return ( preg_match('/^(?:[A-Za-z0-9]+)(?:[A-Za-z0-9 _]*)$/', $text));
    }
     public function isZipGood($text) {
        return ( preg_match('/^\d{5}(?:[-\s]\d{4})?$/', $text));
    }
      public function isCityGood($text) {
        return ( preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $text));
    }
     public function isNameGood($text) {
        return ( preg_match('/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/', $text));
    }
      public function isAddressGood($text) {
        return ( preg_match('/\d{1,5}\s\w.\s(\b\w*\b\s){1,2}\w*\./', $text));
    }
       public function isEmailGood($text) {
        return ( filter_var($text, FILTER_VALIDATE_EMAIL));
    }
}
