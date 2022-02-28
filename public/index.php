<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require '../vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'cursophp',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();


  
function printElement( $job){
    // if($job->visible==false){
    //   return;
    // }
    echo '<li class="work-position">';
    echo '<h5>'. $job->title.'</h5>';
    echo '<p>'. $job->description.'</p>';
    echo '<p>'. $job->getDurationAsString().'</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '  <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '  <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '  <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>';
  }

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);
$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();
$map ->get('index', '/cursophp/',[
    'controller'=>'App\Controllers\IndexController',
    'action'=>'indexAction'
]);
$map ->get('addJobs', '/job/add/',[
    'controller'=>'App\Controllers\JobsController',
    'action'=>'getAddJobAction'
]);
$map ->get('addJob', '/cursophp/job/add','../addJob.php');
$map ->get('addProject', '/cursophp/project/add','../addProject.php');

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);
if(!$route){
    echo 'No route';
}else{
    
    $handlerData = $route->handler;
    $actionName= $handlerData['action'];
    $controllerName = $handlerData['controller'];

    $controller= new $controllerName;
    $controller->$actionName();

    // require $route->handler;
// var_dump($route->handler);
}


