<?php

namespace App\Api\Infra\MYSQL;
use App\Api\Infra\Config\Conf;
use PDO;
use PDOException;


class Connection extends Conf{

  public $connection;     

  public function connect(){
    try{
      $this->connection = new PDO("mysql:host=".parent::getHost().";dbname=".parent::getDatabase(),parent::getUser(),parent::getPass());
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->connection;
    }catch(PDOException $e){
    echo json_encode(["status_server" => "off"]);
    }
  }
}