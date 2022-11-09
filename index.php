<?php

use App\Router\Router;
use App\Test\ConnectionTest;
use App\Test\AuthTest;
use App\Config\ConfigWeb;
use App\Controller\Controller;


require './vendor/autoload.php';
$configWeb = new ConfigWeb();
$RouterInstance = new Router();
$v = new Controller();

$RouterInstance->setDefaultDir($configWeb->defaultDir);

$RouterInstance->register('/', function () {
    $v = new Controller();
    $v->default();
});

$RouterInstance->register('/profile', function () {
    $v = new Controller();
    $v->profile();
});

$RouterInstance->register('/avions', function () {
    $v = new Controller();
    $v->avions();
});

$RouterInstance->register('/connection', function () {
    $v = new Controller();
    $v->connection();
});

$RouterInstance->register('/test', function () {
    new AuthTest();
});

echo $RouterInstance->resolve($_SERVER['REQUEST_URI']);

