<?php
session_start();
require_once "vendor/autoload.php";
require_once "vendor/hcodebr/php-classes/src/DB/Secret.php";

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
##################### ROTA USERS #####################
$app->get('/admin/users', function () {

    User::verifyLogin();

    $users = User::listAll();

    $page = new PageAdmin();

    $page->setTpl("users", array(
        "users" => $users,
    ));

});
##################### ROTA USERS CREATE #####################
$app->get('/admin/users/create', function () {

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("users-create");

});
##################### ROTA DELETE USURS #####################
$app->get('/admin/users/:iduser/delete', function ($iduser) {

    User::verifyLogin();

    $user = new User();

    $user->get((int) $iduser);

    $user->delete();

    header("Location: /admin/users");
    exit;

});
##################### ROTA USERS UPDATE #####################
$app->get('/admin/users/:iduser', function ($iduser) {

    User::verifyLogin();

    $user = new User();

    $user->get((int) $iduser);

    $page = new PageAdmin();

    $page->setTpl("users-update", array(
        "user" => $user->getValues(),
    ));

});
##################### ROTA SAVE USERS #####################
$app->post('/admin/users/create', function () {

    User::verifyLogin();

    $user = new User();

    $_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

    $_POST['despassword'] = password_hash($_POST["despassword"], PASSWORD_DEFAULT, [

        "cost"=>12

    ]);

    $user->setData($_POST);

    $user->save();

    header("Location: /admin/users");
    exit;

});
##################### ROTA UPDATE USERS #####################
$app->post('/admin/users/:iduser', function ($iduser) {

    User::verifyLogin();

    $user = new User();

    $_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

    $user->get((int) $iduser);

    $user->setData($_POST);

    $user->update();

    header("Location: /admin/users");
    exit;

});
################## ROTA FORGOT ###################
$app->get('/admin/forgot', function () {

    $page = new PageAdmin([
        "header" => false,
        "footer" => false
    ]);

    $page->setTpl("forgot");

});
################## ROTA FORGOT-EMAIL ###################
$app->post('/admin/forgot', function(){

    $user = User::getForgot($_POST["email"]);

    header("Location: /admin/forgot/sent");
    exit;

});
################## ROTA FORGOT-SENT ###################
$app->get('/admin/forgot/sent', function(){

   $page = new PageAdmin([
    "header" => false,
    "footer" => false
]);

   $page->setTpl("forgot-sent");

});
################## ROTA FORGOT-RESET ###################
$app->get('/admin/forgot/reset', function(){

    $user = User::validForgotDecrypt($_GET["code"]);

    $page = new PageAdmin([
        "header" => false,
        "footer" => false
    ]);

    $page->setTpl("forgot-reset", array(
        "company"=>utf8_decode(COMPANY),
        "name"=>$user["desperson"],
        "code"=>$_GET["code"]
    ));

});

$app->run();
