<?php

require_once "vendor/autoload.php";

use \Slim\Slim;
use \NewTech\Page;
use \NewTech\PageAdmin;


$app = new Slim();

$app->config('debug', true);

################## ROTA HOME PAGE ###############
$app->get('/', function () {

 	$page = new Page();

 	$page->setTpl("index");

});
################## ROTA ADMIN INICIAL ###################
$app->get('/admin', function () {

 	$page = new PageAdmin();

 	$page->setTpl("index");

});
################## ROTA LOGIN ###################
$app->get('/admin/login', function () {

 	$page = new PageAdmin([
 		"header" => false,
 		"footer" => false
 	]);

 	$page->setTpl("login");

});

$app->run();
