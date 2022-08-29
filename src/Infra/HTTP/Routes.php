<?php 

namespace App\Api\Infra\HTTP;
use App\Api\Infra\Security\JWT;

// Import Routes //

use App\Api\useCases\useLogin;
use App\Api\useCases\useRegister;
use App\Api\useCases\useNewRun;

// ----------- //

class Routes{
  public static $explode;
  public static $route;
  public static $pages;

  public static function getRoutes(){
     if(isset($_GET['routes'])){
      self::$route = $_GET['routes'];
      self::$explode = explode("/",self::$route);

     if(self::$explode[0]===JWT::getSignature()){
       if(count(self::$explode)>1){
        switch(self::$explode[1]){

          case 'SignIn':
          $SignIn = new useLogin;
          $SignIn->isLogin();
          break;

          case 'SignUp':
            $SignUp = new useRegister;
            $SignUp->isRegister();
            break;

            case 'SolicRun':
              $useNewRun = new useNewRun;
              $useNewRun->queryNewRun();
              break;
            
          default:
          echo json_encode(array("status" => "not_parameters"));
        }
      }else {
          echo json_encode(array("status" => "erro"));
      }
  }

  }else{
      echo json_encode(array("status" => "token invalid"));
  }
  
  }
  }

