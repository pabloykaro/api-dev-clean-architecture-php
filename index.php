<?php 
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Cache-Control, Pragma, Accept, Accept-Encoding");
require_once(__DIR__."/vendor/autoload.php");
use App\Api\Infra\HTTP\Routes;
Routes::getRoutes();
?>