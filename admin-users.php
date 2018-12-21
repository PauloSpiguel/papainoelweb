<?php

use \NewTech\Model\User;
use \NewTech\PageAdmin;

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

    $page->setTpl("users-create", [
        'errorRegister'  => User::getErrorRegister(),
        'registerValues' => (isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['desperson' => '', 'deslogin' => '', 'nrphone' => '', 'desemail' => ''],
    ]);

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

    $_SESSION['registerValues'] = $_POST;

    if (!isset($_POST['desperson']) || $_POST['desperson'] == '') {

        User::setErrorRegister("Preencha o seu nome completo.");
        header("location: /admin/users/create");
        exit;
    }

    if (!isset($_POST['deslogin']) || $_POST['deslogin'] == '') {

        User::setErrorRegister("Preencha o seu nome de usuário.");
        header("location: /admin/users/create");
        exit;
    }

    if (!isset($_POST['desemail']) || $_POST['desemail'] == '') {

        User::setErrorRegister("Preencha o seu nome e-mail.");
        header("location: /admin/users/create");
        exit;
    }

    if (!isset($_POST['despassword']) || $_POST['despassword'] == '') {

        User::setErrorRegister("Preencha uma senha.");
        header("location: /admin/users/create");
        exit;
    }

    if (User::checkLoginExist($_POST['deslogin']) === true) {

        User::setErrorRegister("Este login já está sendo utilizado por outro usuário.");
        header("location: /admin/users/create");
        exit;
    }

    $user = new User();

    $_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;

    // $_POST['despassword'] = password_hash($_POST["despassword"], PASSWORD_DEFAULT, [
    //     "cost" => 12,
    // ]);

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

    //var_dump($_POST);

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
