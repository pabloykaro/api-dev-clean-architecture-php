<?php 

namespace App\Api\Entity;
use App\Api\Entity\Input;

interface IdentityProps{

  public function getIdUserCreate(): int;
  public function getIdAccept(): int;
  public function getIdRun(): int;
}

class Identity implements IdentityProps{


   
  public function getIdUserCreate(): int {
     $input = Input::setInput("id_user_create");
     if($input === null){
      return false;
     }
     if(is_numeric($input)){
      return $input;
     }
     return false;
  }

  public function getIdAccept(): int {
    $input = Input::setInput("id_accept");
    if($input === null){
     return false;
    }
    if(is_numeric($input)){
     return $input;
    }
    return false;
 }

 public function getIdRun(): int {
  $input = Input::setInput("id_run");
  if($input === null){
   return false;
  }
  if(is_numeric($input)){
   return $input;
  }
  return false;
}


}