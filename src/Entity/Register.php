<?php 
namespace App\Api\Entity;

use App\Api\Entity\Input;

class Register{
  //   Propriedades da Entitdade Register     //
       
  public $regex_name = '/[a-zA-Z\u00C0-\u00FF ]+/i';
  public $regex_phones = '/[0-9]{2}[9][6789][0-9]{3}[0-9]{4}/';


  // ----------------------------------- //

    public function getName(){
      return Input::setInput("nome");
    }
    public function getTell(){
      return Input::setInput("telefone");
    }
    public function getCargo(){
      return Input::setInput("cargo");
    }
    public function getRg(){
      return Input::setInput("rg");
    }
    public function getCnh(){
      return Input::setInput("cnh");
    }
    public function getNascimento(){
      return Input::setInput("nascimento");
    }
    public function getModelo(){
      return Input::setInput("modelo");
    }
    public function getPlaca(){
      return Input::setInput("placa");
    }
    public function getAnoVeiculo(){
      return Input::setInput("ano");
    }
  public function verifyName(){
      if($this->getName()===null){
        return false;
        }
        if(strlen($this->getName()) > 5){
          return preg_match($this->regex_name, $this->getName()) === 1 ? true : false;
        }else{
          return false;
        }
    }

    public function verifyCnh(){
      if($this->getCnh()===null){
        return false;
        }
        if(strlen($this->getCnh()) === 10){
          return is_numeric($this->getCnh()) ? true : false;
        }else{
          return false;
        }
    }

    public function verifyRg(){
      if($this->getRg()===null){
        return false;
        }
        if(strlen($this->getRg()) === 11){
          return is_numeric($this->getRg()) ? true : false;
        }else{
          return false;
        }
    }

    public function verifyTelefone(){
      if($this->getTell()===null){
        return false;
        }
        if(strlen($this->getTell()) === 15){
          return preg_match($this->regex_phones, preg_replace('/\D/', '', $this->getTell())) === 1 ? true : false;
        }else{
          return false;
        }
    }

    public function verifyPlaca(){
      if($this->getPlaca()===null){
        return false;
        }
        if(strlen($this->getPlaca()) === 7){
          return true;
        }else{
          return false;
        }
    }
    public function verifyModelo(){
      if($this->getModelo()!==null){
        return true;
        }else{
          return false;
        }
       
    }
    public function verifyNascimento(){
      if($this->getNascimento()===null){
        return false;
        }
        if(strlen($this->getNascimento()) === 10){
          return true;
        }else{
          return false;
        }
    }

    public function verifyAnoVeiculo(){
      if($this->getAnoVeiculo()===null){
        return false;
        }
        if(strlen($this->getAnoVeiculo()) === 4){
          return true;
        }else{
          return false;
        }
    }

    public function verifyCargo(){
      if($this->getCargo()===null){
        return false;
        }
        if($this->getCargo() === 'usuario' 
        || $this->getCargo() === 'mototaxi' 
        || $this->getCargo() === 'entregador'){ return true;}
    }


  }

