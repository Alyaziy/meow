<?php
declare(strict_types = 1);
require_once'vendor/autoload.php';
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');
//$path = $_SERVER['DOCUMENT_ROOT'];
//include_once $path.'/popik/function.php';
//include_once $_SERVER['DOCUMENT_ROOT'].'/popik/formregister.php';
//include_once $_SERVER['DOCUMENT_ROOT'].'/registr/registr.php';

use NoahBuscher\Macaw\Macaw;
use Tracy\Debugger;
use Whoops\Run;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();



//require_once 'popik/function.php';
Debugger::enable();

Macaw::get('/', 'App\Controller\FrontEndController@articleList');
Macaw::post('/admin', 'App\Controller\BackEndController@login');
Macaw::get('/article/(:num)', 'App\Controller\FrontEndController@contentArticle');



Macaw::get('/login', 'App\Controller\FrontEndController@LoginView');
//Macaw::get('view/(:num)', 'App\Demo@view');
Macaw::dispatch();


