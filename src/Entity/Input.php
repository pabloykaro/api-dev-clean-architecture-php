<?php

namespace App\Api\Entity;


class Input{
  public static $input;
  public static $decode;
  public static function setInput(string $name){
   
       self::$input = file_get_contents("php://input");
       self::$decode = json_decode(self::$input,true);
       if(is_array(self::$decode)){
       if(array_key_exists($name, self::$decode ) === true){
        return self::$decode[$name];
       }else{
        return null;
       }
      }else{
        return null;
       }
        
  }
 
}
