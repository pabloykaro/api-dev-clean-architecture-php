<?php 
namespace App\Api\Infra\Security;

class JWT{
  
   public static $header;
   public static $payload;
   public static $signature;


  public static function setHeader(){
    self::$header = [
      'alg' => 'HS256',
      'typ' => 'JWT',
    ];
    return base64_encode(json_encode(self::$header));
  }
    public static function getHeader(){
        return self::setHeader();
    }

    public static function setPayload(){
      self::$payload = [
        'iss' => 'speedymotoapp',
        'name' => 'speedy',
        'email' => 'support@speedymoto.net'
      ];
      return base64_encode(json_encode(self::$payload));
    }
      public static function getPayload(){
          return self::setPayload();
      }

        public static function getSignature(){
        self::$signature = base64_encode(hash_hmac('md5',self::getHeader().self::getPayload(),'speedysucess',true));
        //return strlen(self::$signature);
        return str_replace("==","",self::$signature);
        }

  
}

