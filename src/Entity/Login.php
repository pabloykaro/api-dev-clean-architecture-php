<?php 
namespace App\Api\Entity;

use App\Api\Entity\Input;

class Login{
  //   Propriedades da Entitdade Login     //

    public  $regex_email = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
    public $regex_pass = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w$@]{6,}$/";

  // ----------------------------------- //

    public function getEmail(){
      return Input::setInput("email");
    }
    public function getCpf(){
      return Input::setInput("cpf");
    }
    public function getPassword(){
    return Input::setInput("password");
   }
    public function verifyEmail(){

    if($this->getEmail()===null){
      return false;
    }
    if(preg_match($this->regex_email,$this->getEmail()) === 1){
      return true;
    }else{
    return false;
    }

      }

    public function verifyCpf(){
    if($this->getCpf()===null){
      return false;
      }
      if(strlen($this->getCpf()) === 11 AND preg_match("/[^0-9]/",$this->getCpf()) === 00){
        return true;
      }else{
        return false;
      }
      }

    public function verifyPassword(){
      if($this->getPassword()===null){
        return false;
        }
        if(strlen($this->getPassword()) === 8){
          return preg_match($this->regex_pass, $this->getPassword()) === 1 ? true : false;
        }else{
          return false;
        }
    }

  }

