<?php

use \NewTech\Page;
use \NewTech\PageAdmin;
use \NewTech\Model\Local;
use \NewTech\Model\User;


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

?>