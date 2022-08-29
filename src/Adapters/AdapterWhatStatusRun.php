<?php 

namespace App\Api\Adapters;
use App\Api\Infra\MYSQL\Connection;
use PDO;

class AdapterWhatStatusRun{
  
  public $con;
  public $query;

  public function queryStatusRun(int $id_user_create){
    $this->con = new Connection;
    $this->query = $this->con->connect()->prepare("SELECT * FROM speed_runs WHERE id_user_create =:id_user_create AND status IN(:status_runone,:status_runtwo)");
    $this->query->bindValue("id_user_create",$id_user_create);
    $this->query->bindValue("status_runone","find");
    $this->query->bindValue("status_runtwo","in_route");
    $this->query->execute();
    if($this->query->rowCount() > 0){
    return true;
    }else{
     return false;
    }
  }

  
}
