<?php
session_start();
require_once "vendor/autoload.php";

use \NewTech\Model\User;
use \NewTech\Page;
use \NewTech\PageAdmin;
use \Slim\Slim;

$app = new Slim();

$app->config('debug', true);

################## ROTA HOME PAGE ###############
$app->get('/', function () {

    $page = new Page();

    $page->setTpl("index");

});
################## ROTA ADMIN INICIAL ###################
$app->get('/admin', function () {

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("index");

});
################## ROTA LOGIN ###################
$app->get('/admin/login', function () {

    $page = new PageAdmin([
        "header" => false,
        "footer" => false,
    ]);

    $page->setTpl("login");

});
################ LOGIN ########################
$app->post('/admin/login', function () {

    User::login($_POST["login"], $_POST["password"]);

    header("Location: /admin");

    exit;
});

################## LOGOUT ###########################
$app->get('/admin/logout', function () {

    User::logout();

    header("Location: /admin/login");
    exit;

});

$app->run();
