<?php 

namespace App\Api\Adapters;
use App\Api\Infra\MYSQL\Connection;
use PDO;

class AdapterLogin{
  
  public $con;
  public $query;

  public function queryLoginWithEmail(string $email, string $password){
    $this->con = new Connection;
    $this->query = $this->con->connect()->prepare("SELECT * FROM speed_users WHERE senha=:senha_dados AND email=:email_dados");
    $this->query->bindValue("senha_dados",$password);
    $this->query->bindValue("email_dados",$email);
    $this->query->execute();
    $this->dados = $this->query->fetch(PDO::FETCH_ASSOC);
    if($this->query->rowCount() === 1 ){
      echo json_encode(["query" =>[
        "status" => 1,
        "status_da_conta" => $this->dados['status_da_conta'],
        "email" => $this->dados['email'],
        "cpf" => $this->dados['cpf'],
        "cargo" => $this->dados['cargo'],
        "id_user" => $this->dados['id'],
        "nome" => $this->dados['nome'],
        "foto" => $this->dados['foto']
       ]]);
    }else{
      echo json_encode(["query" => ["status" => 0, "status_da_conta" => 0]]);
    }
  }
  public function queryLoginWithCpf(string $cpf, string $password){
    $this->con = new Connection;
    $this->query = $this->con->connect()->prepare("SELECT * FROM speed_users WHERE senha=:senha_dados AND cpf=:cpf_dados");
    $this->query->bindValue("senha_dados",$password);
    $this->query->bindValue("cpf_dados",$cpf);
    $this->query->execute();
    $this->dados = $this->query->fetch(PDO::FETCH_ASSOC);
    if($this->query->rowCount() === 1 ){
      echo json_encode(["query" =>[
        "status" => 1,
        "status_da_conta" => $this->dados['status_da_conta'],
        "email" => $this->dados['email'],
        "cpf" => $this->dados['cpf'],
        "cargo" => $this->dados['cargo'],
        "id_user" => $this->dados['id'],
        "nome" => $this->dados['nome'],
        "foto" => $this->dados['foto']
       ]]);
    }else{
      echo json_encode(["query" => ["status" => 0, "status_da_conta" => 0]]);
    }
  }
}
