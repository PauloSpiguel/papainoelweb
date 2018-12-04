<?php

use \NewTech\Model\User;
use \NewTech\PageAdmin;

################## ROTA ADMIN INICIAL ###################
$app->get('/admin', function () {

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("index");

});
################## ROTA ADMIN INICIAL ###################
$app->get('/admin/', function () {

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

    //$page->setTpl("login",
    //    ['error'=>User::getError()
    //]);

    $page->setTpl("login");

});
################ LOGIN ########################
$app->post('/admin/login', function () {

    try {

        User::login($_POST["login"], $_POST["password"]);

    } catch (Exception $e) {

        User::setError($e->getMessage());

    }

    header("Location: /admin");
    exit;
});

################## LOGOUT ###########################
$app->get('/admin/logout', function () {

    User::logout();

    header("Location: /admin/login");
    exit;

});
