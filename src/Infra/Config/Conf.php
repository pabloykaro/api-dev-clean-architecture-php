<?php

namespace App\Api\Infra\Config;

class Conf{

  public $host = "localhost";
  public $database = "db_speedmoto";
  public $user = "root";
  public $pass = 12345678;

  public function getHost(){
    return $this->host;
  }
  public function getDatabase(){
    return $this->database;
  }
  public function getUser(){
    return $this->user;
  }
  public function getPass(){
    return $this->pass;
  }

}