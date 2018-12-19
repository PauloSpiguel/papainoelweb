<?php

use \NewTech\Model\Person;
use \NewTech\Model\User;
use \NewTech\PageAdmin;

################## ROTA LISTAR PESSOAS ######################
$app->get('/admin/persons', function () {

    User::verifyLogin();

    $search = (isset($_GET['search'])) ? $_GET['search'] : '';
    $page   = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

    if ($search != '') {

        $pagination = Person::getPage($page, $search);

    } else {

        $pagination = Person::getPage($page);
    }

    $pages = [];

    for ($x = 0; $x < $pagination['pages']; $x++) {

        array_push($pages, [
            'href' => '/admin/persons?' . http_build_query([
                'page'   => $x + 1,
                'search' => $search,
            ]),
            'text' => $x + 1,
        ]);
    }

    $page = new PageAdmin();

    $page->setTpl("persons", [
        "persons" => $pagination['data'],
        "search"  => $search,
        "pages"   => $pages,
    ]);

});
################## ROTA CREATE PESSOAS ######################
$app->get('/admin/persons/create', function () {

    User::verifyLogin();

    $page = new PageAdmin();

    $page->setTpl("persons-create");

});
################## DELETA PESSOA ######################
$app->get("/admin/persons/:idperson/delete", function ($idperson) {

    User::verifyLogin();

    $person = new Person();

    $person->get((int) $idperson);

    $person->delete();

    header('Location: /admin/persons');

    exit;

});
################## CRIA O PESSOAS ######################
$app->post('/admin/persons/create', function () {

    User::verifyLogin();

    $person = new Person();

    $person->setData($_POST);

    $person->save();

    header("Location: /admin/persons");

    exit;

});
################## UPDATE PESSOAS ######################
$app->get('/admin/persons/:idperson', function ($idperson) {

    User::verifyLogin();

    $person = new Person();

    $person->get((int) $idperson);

    $page = new PageAdmin();

    $page->setTpl("persons-update", array(
        "person" => $person->getValues(),
    ));

});
################## UPDATE PESSOA ######################
$app->post("/admin/persons/:idperson", function ($idperson) {

    User::verifyLogin();

    $person = new Person();

    $person->get((int) $idperson); //Select no db

    $person->setData($_POST); //Cria os Gets e Sets

    //var_dump($person);

    $person->update();

    header('Location: /admin/persons');

    exit;

});
################## UPDATE PESSOA MODAL######################
$app->post("/admin/persons/:idperson", function ($idperson) {

    User::verifyLogin();

    $person = new Person();

    $person->get((int) $idperson); //Select no db

    $person->setData($_POST); //Cria os Gets e Sets

    var_dump($person);

    //$person->update();

    //header('Location: /admin/persons');

    exit;

});
