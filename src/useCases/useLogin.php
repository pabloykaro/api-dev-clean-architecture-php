<?php 

namespace App\Api\useCases;

use App\Api\Entity\Login;
use App\Api\Adapters\AdapterLogin;

class useLogin extends Login {

  public $adapterLogin;
  public $query;
  public $dados;

  public function isLogin(){
  
       if(parent::getEmail() === null AND parent::getCpf() === null AND parent::getPassword() === null){
        echo json_encode(["query" => "no_parameters"]);
       }else{
        if(parent::getEmail() !== null){
          return $this->queryLoginEmail();
        }
        if(parent::getCpf() !== null){
          return $this->queryLoginCpf();
        }
       }
  } 
  public function queryLoginCpf(){
    if(parent::getCpf()!== null){
      if(parent::verifyCpf() === true AND parent::verifyPassword() === true){
      $this->adapterLogin = new AdapterLogin;
      return $this->adapterLogin->queryLoginWithCpf($this->getCpf(),$this->getPassword());
        }else{
          echo json_encode(["data"  => ["cpf" => parent::verifyCpf() === false ? "invalid" : true, "password" => parent::verifyPassword()===false ? "invalid" : true,"status" => false]]);
        }
      }else{
        
      }
  }

  public function queryLoginEmail(){
    if(parent::getEmail()!== null){
      if(parent::verifyEmail() === true AND parent::verifyPassword() === true){
        $this->adapterLogin = new AdapterLogin;
        return $this->adapterLogin->queryLoginWithEmail($this->getEmail(),$this->getPassword());
        }else{
          echo json_encode(["data"  => ["email" => parent::verifyEmail()=== false ? "invalid" : true, "password" => parent::verifyPassword()===false ? "invalid" : true, "status" => false]]);
        }
      }
  }
}