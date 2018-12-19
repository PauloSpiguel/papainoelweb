<?php

use \NewTech\Model\Local;
use \NewTech\Model\Report;
use \NewTech\Model\User;
use \NewTech\PageAdmin;

################## ROTA ADMIN INICIAL ###################
$app->get('/admin', function () {

    User::verifyLogin();

    $total = Report::countDelivery();

    $female = Report::countKidsFemale();

    $male = Report::countKidsMale();

    $page = new PageAdmin();

    $page->setTpl("index", [
        "total"  => $total,
        "female" => $female,
        "male"   => $male,
    ]);

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

    $page->setTpl("login", [
        'error' => User::getError(),
    ]);

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
################## ROTA INFO-FAMALE ###################
$app->get('/admin/info-famale', function () {

    User::verifyLogin();
    //1: FEMININO, 2: MASCULINO
    $countAgeSix    = Report::countAgeRange('2012', '2018', '1');
    $countAgeTen    = Report::countAgeRange('2008', '2011', '1');
    $countAgeBigger = Report::countAgeRange('1990', '2007', '1');

    //echo $countAgeSix;

    $countDayOne   = Report::countByDate('16', '1');
    $countDayTwo   = Report::countByDate('17', '1');
    $countDayThree = Report::countByDate('18', '1');

    $page = new PageAdmin();

    $page->setTpl("info-famale", [
        "countAgeSix"    => $countAgeSix,
        "countAgeTen"    => $countAgeTen,
        "countAgeBigger" => $countAgeBigger,
        "countDayOne"    => $countDayOne,
        "countDayTwo"    => $countDayTwo,
        "countDayThree"  => $countDayThree,
    ]);
});
################## ROTA INFO-MALE ###################
$app->get('/admin/info-male', function () {

    User::verifyLogin();

    $countAgeSix    = Report::countAgeRange('2012', '2018', '2');
    $countAgeTen    = Report::countAgeRange('2008', '2011', '2');
    $countAgeBigger = Report::countAgeRange('1990', '2007', '2');

    $countDayOne   = Report::countByDate('16', '2');
    $countDayTwo   = Report::countByDate('17', '2');
    $countDayThree = Report::countByDate('18', '2');

    $page = new PageAdmin();

    $page->setTpl("info-male", [
        "countAgeSix"    => $countAgeSix,
        "countAgeTen"    => $countAgeTen,
        "countAgeBigger" => $countAgeBigger,
        "countDayOne"    => $countDayOne,
        "countDayTwo"    => $countDayTwo,
        "countDayThree"  => $countDayThree,
    ]);

});
################## ROTA INFO-GERAL ###################
$app->get('/admin/info-geral', function () {

    User::verifyLogin();

    $locals = local::listAll();

    //$local = $locals[0]['deslocal'];

    $countLocal = array();

    foreach ($locals as $key => $value) {
        $local = $locals[$key]['deslocal'];
        //echo $local."<br>";
        $count = Local::countLocal($local);
        foreach ($count as $key => $value) {
            foreach ($value as $result) {
                array_push($countLocal, array(
                    'local' => $local,
                    'count' => $result,
                ));
            }
        }
    }

    $page = new PageAdmin();

    $page->setTpl("info-geral", [
        "locals" => $locals,
        "counts" => $countLocal,
    ]);

});
