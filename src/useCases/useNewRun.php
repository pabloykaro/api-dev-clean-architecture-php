<?php

namespace App\Api\useCases;

use App\Api\Entity\Identity;
use App\Api\Entity\Register;
use App\Api\Entity\Login;
use App\Api\Entity\Run;
use App\Api\Adapters\AdapterWhatStatusRun;
use App\Api\Adapters\AdapterCreateRun;


class useNewRun extends Run{


public function CreateRun(){
  return new AdapterCreateRun;
}
public function Register(){
  return new Register;
}
public function Identity(){
  return new Identity;
}
public function Run(){
  return new Run;
}
public function Login(){
  return new Login;
}
public function WhatStatusRun(){
  return new AdapterWhatStatusRun;
}

public function queryNewRun(){
       if($this->queryRunInRoute() === false){
        $this->CreateRun()->queryStatusRun(
         $this->Run()->getPagamento(),
         $this->Run()->getValorCorrida(),
         $this->Register()->getName(),
         $this->Run()->getOrigem(),
         $this->Run()->getDestino(),
         $this->Run()->getLatitudePA(),
         $this->Run()->getLongitudePA(),
         $this->Run()->getLatitudePB(),
         $this->Run()->getLongitutdePB(),
         $this->Run()->getDistanciaKM(),
         $this->Run()->getTempoMin(),
         $this->Run()->getTempoDePartida(),
         $this->Login()->getEmail(),
         $this->Identity()->getIdUserCreate()
        );
        echo json_encode(["query" => "create_run"]);
       }else{
        echo json_encode(["query" => "not_create_run"]);
       }
}

public function queryRunInRoute(){
  if($this->Identity()->getIdUserCreate() !== false){
    return $this->WhatStatusRun()->queryStatusRun($this->Identity()->getIdUserCreate());
  }
}

}