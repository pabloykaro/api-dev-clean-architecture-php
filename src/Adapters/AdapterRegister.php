<?php 

namespace App\Api\Adapters;
use App\Api\Infra\MYSQL\Connection;
use PDO;

class AdapterRegister{
  
  public $con;
  public $query;

  public function queryRegisterWithUser(string $email, string $password, string $cpf, string $nome, string $telefone, string $cargo){
    $this->con = new Connection;
    $this->query = $this->con->connect()->prepare("INSERT INTO speed_users (ano,nascimento,rg,modelo,senha,nome,email,telefone,cargo,cnh,placa,cpf) VALUES (:ano,:nascimento,:rg,:modelo,:senha,:nome,:email,:telefone,:cargo,:cnh,:placa,:cpf)");
    $this->query->bindValue("cpf",$cpf);
    $this->query->bindValue("placa","");
    $this->query->bindValue("cnh","");
    $this->query->bindValue("cargo",$cargo);
    $this->query->bindValue("telefone",$telefone);
    $this->query->bindValue("email",$email);
    $this->query->bindValue("nome",$nome);
    $this->query->bindValue("senha",$password);
    $this->query->bindValue("modelo","");
    $this->query->bindValue("rg","");
    $this->query->bindValue("nascimento","");
    $this->query->bindValue("ano","");
    $this->query->execute();
    if($this->query->rowCount() > 0 ){
      echo json_encode(["query" => "create_account_user"]);
    }else{
      echo json_encode(["query" => "not_create_account_user"]);
    }
  }

  public function queryRegisterWithUserPro(string $email, string $password, string $cpf, string $nome, string $telefone, string $cargo, string $nascimento, string $cnh, string $rg, string $placa, string $modelo, string $ano){
    $this->con = new Connection;
    $this->query = $this->con->connect()->prepare("INSERT INTO speed_users (ano,nascimento,rg,modelo,senha,nome,email,telefone,cargo,cnh,placa,cpf) VALUES (:ano,:nascimento,:rg,:modelo,:senha,:nome,:email,:telefone,:cargo,:cnh,:placa,:cpf)");
    $this->query->bindValue("cpf",$cpf);
    $this->query->bindValue("placa",$placa);
    $this->query->bindValue("cnh",$cnh);
    $this->query->bindValue("cargo",$cargo);
    $this->query->bindValue("telefone",$telefone);
    $this->query->bindValue("email",$email);
    $this->query->bindValue("nome",$nome);
    $this->query->bindValue("senha",$password);
    $this->query->bindValue("modelo",$modelo);
    $this->query->bindValue("rg",$rg);
    $this->query->bindValue("nascimento",$nascimento);
    $this->query->bindValue("ano",$ano);
    $this->query->execute();
    if($this->query->rowCount() > 0 ){
      echo json_encode(["query" => "create_account_user"]);
    }else{
      echo json_encode(["query" => "not_create_account_user"]);
    }
  }
 
}
