<?php 

namespace App\Api\Adapters;
use App\Api\Infra\MYSQL\Connection;
use PDO;

class AdapterCreateRun{
  
  public $con;
  public $query;

  public function queryStatusRun(
  string $pagamento,
  string $valor_corrida,
  string $name_create,
  string $origem_name,
  string $destino_name,
  string $latitude_pa,
  string $longitude_pa,
  string $latitude_pb,
  string $longitude_pb,
  string $distancia_km,
  string $tempo_min,
  string $tempo_de_partida,
  string $email_user_create,
  int $id_user_create
  ){
    $this->con = new Connection;
    $this->query = $this->con->connect()->prepare(
      "INSERT INTO 
      speed_runs(pagamento,valor_corrida,name_create,origem_name,destino_name,latitude_pa,longitude_pa,latitude_pb,longitude_pb,distancia_km,
      tempo_min,tempo_de_partida,email_user_create,id_user_create) 
      VALUES
      (:pagamento,:valor_corrida,:name_create,:origem_name,:destino_name,:latitude_pa,:longitude_pa,:latitude_pb,:longitude_pb,:distancia_km,
      :tempo_min,:tempo_de_partida,:email_user_create,:id_user_create)
      ");
    $this->query->bindValue("pagamento",$pagamento);
    $this->query->bindValue("valor_corrida",$valor_corrida);
    $this->query->bindValue("name_create",$name_create);
    $this->query->bindValue("origem_name",$origem_name);
    $this->query->bindValue("destino_name",$destino_name);
    $this->query->bindValue("latitude_pa",$latitude_pa);
    $this->query->bindValue("longitude_pa",$longitude_pa);
    $this->query->bindValue("latitude_pb",$latitude_pb);
    $this->query->bindValue("longitude_pb",$longitude_pb);
    $this->query->bindValue("distancia_km",$distancia_km);
    $this->query->bindValue("tempo_min",$tempo_min);
    $this->query->bindValue("tempo_de_partida",$tempo_de_partida);
    $this->query->bindValue("email_user_create",$email_user_create);
    $this->query->bindValue("id_user_create",$id_user_create);
    $this->query->execute();
    if($this->query->rowCount() > 0){
    echo json_encode(["query" => "create_run"]);
    }else{
      echo json_encode(["query" => "not_create_run"]);
    }
  }

  
}
