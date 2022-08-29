<?php 

namespace App\Api\Entity;
use App\Api\Entity\Input;

class Run{


  public function getPagamento(){
    return Input::setInput("pagamento");
  }
  public function getValorCorrida(){
    return Input::setInput("valor_corrida");
  }
  public function getOrigem(){
    return Input::setInput("origem_name");
  }
  public function getDestino(){
    return Input::setInput("destino_name");
  }
  public function getLatitudePA(){
    return Input::setInput("latitude_pa");
  }
  public function getLongitudePA(){
    return Input::setInput("longitude_pa");
  }
  public function getLatitudePB(){
    return Input::setInput("latitude_pb");
  }
  public function getLongitutdePB(){
    return Input::setInput("longitude_pb");
  }
  public function getDistanciaKM(){
    return Input::setInput("distancia_km");
  }
  public function getTempoMin(){
    return Input::setInput("tempo_min");
  }
  public function getTempoDePartida(){
    return Input::setInput("tempo_de_partida");
  }
  
}