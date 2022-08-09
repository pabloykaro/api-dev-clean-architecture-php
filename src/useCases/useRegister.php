<?php 

namespace App\Api\useCases;
use App\Api\Entity\Register;
use App\Api\Entity\Login;
use App\Api\Adapters\AdapterRegister;

class useRegister extends Register {
   public $EntityLogin;
   public $adapterRegister;
  
  public function isRegister(){
   
    if(parent::verifyCargo() === true AND parent::getCargo() === 'usuario'){
      return $this->queryRegisterUser();
    }
 
    if(parent::verifyCargo() === true AND (parent::getCargo() === 'mototaxi' || parent::getCargo() === 'entregador' )){
      return $this->queryRegisterUserPro();
    }
  } 

  public function queryRegisterUser(){
    $this->EntityLogin = new Login;

    if(
        !empty($this->EntityLogin->getCpf()) 
    AND !empty($this->EntityLogin->getPassword()) 
    AND !empty($this->EntityLogin->getEmail())
    AND !empty(parent::getName()) 
    AND !empty(parent::getTell()) 
    AND !empty(parent::getCargo()) 
    ){
     if(
         $this->EntityLogin->verifyCpf() === true 
     AND $this->EntityLogin->verifyPassword() === true 
     AND $this->EntityLogin->verifyEmail() === true 
     AND parent::verifyName() === true 
     AND parent::verifyTelefone() === true 
     AND parent::verifyCargo() === true 
     ){
       $this->adapterRegister = new AdapterRegister;
       $this->adapterRegister->queryRegisterWithUser(
        $this->EntityLogin->getEmail(),
        $this->EntityLogin->getPassword(),
        $this->EntityLogin->getCpf(),
        parent::getName(),
        parent::getTell(),
        parent::getCargo()
      );
     }
    }else{
      echo json_encode(["query" => "not_parameters"]);
    }

  }

  public function queryRegisterUserPro(){
    $this->EntityLogin = new Login;

    if(
        !empty($this->EntityLogin->getCpf()) 
    AND !empty($this->EntityLogin->getPassword()) 
    AND !empty($this->EntityLogin->getEmail())
    AND !empty(parent::getName()) 
    AND !empty(parent::getTell()) 
    AND !empty(parent::getCargo()) 
    AND !empty(parent::getNascimento()) 
    AND !empty(parent::getCnh()) 
    AND !empty(parent::getRg()) 
    AND !empty(parent::getPlaca()) 
    AND !empty(parent::getModelo()) 
    AND !empty(parent::getAnoVeiculo()) 
    ){
     if(
         $this->EntityLogin->verifyCpf() === true 
     AND $this->EntityLogin->verifyPassword() === true 
     AND $this->EntityLogin->verifyEmail() === true 
     AND parent::verifyName() === true 
     AND parent::verifyTelefone() === true 
     AND parent::verifyCargo() === true 
     AND parent::verifyNascimento() === true 
     AND parent::verifyCnh() === true 
     AND parent::verifyRg() === true 
     AND parent::verifyPlaca() === true 
     AND parent::verifyModelo() === true 
     AND parent::verifyAnoVeiculo() === true 
     ){
       $this->adapterRegister = new AdapterRegister;
       $this->adapterRegister->queryRegisterWithUserPro(
        $this->EntityLogin->getEmail(),
        $this->EntityLogin->getPassword(),
        $this->EntityLogin->getCpf(),
        parent::getName(),
        parent::getTell(),
        parent::getCargo(),
        parent::getNascimento(),
        parent::getCnh(),
        parent::getRg(),
        parent::getPlaca(),
        parent::getModelo(),
        parent::getAnoVeiculo()
      );
     }
    }else{
      echo json_encode(["query" => "not_parameters"]);
    }

  }
}