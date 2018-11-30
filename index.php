<?php
session_start();
require_once "vendor/autoload.php";
require_once "vendor/hcodebr/php-classes/src/DB/Secret.php";

use \NewTech\Model\Delivery;
use \NewTech\Model\Local;
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
        "cost" => 12,
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
        "footer" => false,
    ]);

    $page->setTpl("forgot");

});
################## ROTA FORGOT-EMAIL ###################
$app->post('/admin/forgot', function () {

    $user = User::getForgot($_POST["email"]);

    header("Location: /admin/forgot/sent");
    exit;

});
################## ROTA FORGOT-SENT ###################
$app->get('/admin/forgot/sent', function () {

    $page = new PageAdmin([
        "header" => false,
        "footer" => false,
    ]);

    $page->setTpl("forgot-sent");

});
################## ROTA FORGOT-RESET ###################
$app->get('/admin/forgot/reset', function () {

    $user = User::validForgotDecrypt($_GET["code"]);

    $page = new PageAdmin([
        "header" => false,
        "footer" => false,
    ]);

    $page->setTpl("forgot-reset", array(
        "company" => utf8_decode(COMPANY),
        "name"    => $user["desperson"],
        "code"    => $_GET["code"],
    ));

});
################## ROTA FORGOT-RESET-POST ###################
$app->post('/admin/forgot/reset', function () {

    $userForgot = User::validForgotDecrypt($_POST["code"]);

    User::setForgotUsed($userForgot["idrecovery"]);

    $user = new User();

    $user->get((int) $userForgot["iduser"]);

    $password = password_hash($_POST["password"], PASSWORD_DEFAULT, [
        "cost" => 12,
    ]);

    $user->setPassword($password);

    $page = new PageAdmin([
        "header" => false,
        "footer" => false,
    ]);

    $page->setTpl("forgot-reset-success");

});
################## ROTA LOCALS ###################
$app->get("/admin/locals", function () {

    User::verifyLogin();

    $locals = Local::listAll();

    $page = new PageAdmin();

    $page->setTpl("locals", [
        "locals" => $locals,
    ]);

});
################## ROTA LOCALS-CREATE ###################
$app->get("/admin/locals/create", function () {

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("locals-create");

});
################## ROTA LOCALS-CREATE-POST ###################
$app->post("/admin/locals/create", function () {

    User::verifyLogin();

    $local = new Local();

    $local->setData($_POST);

    $local->save();

    header("Location: /admin/locals");
    exit;

});
################## ROTA LOCALS-DELETE ###################
$app->get("/admin/locals/:idlocal/delete", function ($idlocal) {

    User::verifyLogin();

    $local = new Local();

    $local->get((int) $idlocal);

    $local->delete();

    header("Location: /admin/locals");
    exit;

});
################## ROTA LOCALS-UPDATE ###################
$app->get("/admin/locals/:idlocal", function ($idlocal) {

    User::verifyLogin();

    $local = new Local();

    $local->get((int) $idlocal);

    $page = new PageAdmin();

    $page->setTpl("locals-update", [
        "local" => $local->getValues(),
    ]);

});
################## ROTA LOCALS-UPDATE-POST ###################
$app->post("/admin/locals/:idlocal", function ($idlocal) {

    User::verifyLogin();

    $local = new Local();

    $local->get((int) $idlocal);

    $local->setData($_POST);

    $local->save();

    header("Location: /admin/locals");
    exit;

});
################## ROTA DELIVERY ###################
$app->get("/admin/deliveries", function () {

    User::verifyLogin();

    $demands = Delivery::listAll();

    $page = new PageAdmin();

    $page->setTpl("deliveries", [
        'demands' => $demands,
    ]);

});
################## ROTA DELIVERY-CREATE ###################
$app->get("/admin/deliveries/create", function () {

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("deliveries-create");

});
################## ROTA LOCALS-UPDATE-POST ###################
$app->post("/admin/locals/create", function () {

    User::verifyLogin();

    $delivery = new Delivery();

    $delivery->setData($_POST);

    $delivery->save();

    header("Location: /admin/deliveries");
    exit;

});

$app->run();
