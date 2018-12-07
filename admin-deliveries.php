<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

use \NewTech\Model\Delivery;
use \NewTech\Model\Local;
use \NewTech\Model\User;
use \NewTech\PageAdmin;

################## ROTA DELIVERY ###################
$app->get("/admin/deliveries", function () {

    User::verifyLogin();

    $search = (isset($_GET['search'])) ? $_GET['search'] : '';
    $page   = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

    if ($search != '') {

        $pagination = Delivery::getPage($page, $search);

    } else {

        $pagination = Delivery::getPage($page);
    }

    $pages = [];

    for ($x = 0; $x < $pagination['pages']; $x++) {

        array_push($pages, [
            'href' => '/admin/deliveries?' . http_build_query([
                'page'   => $x + 1,
                'search' => $search,
            ]),
            'text' => $x + 1,
        ]);
    }

    $page = new PageAdmin();

    $page->setTpl("deliveries", [
        "demands" => $pagination['data'],
        "search"  => $search,
        "pages"   => $pages,
    ]);

});
################## ROTA DELIVERY-CREATE ###################
$app->get("/admin/deliveries/create", function () {

    User::verifyLogin();

    $locals = Local::listAll();

    $user = User::userSession();

    $page = new PageAdmin();

    $page->setTpl("deliveries-create", [
        "locals" => $locals,
    ]);

});
################## ROTA DELIVERY-CRETE ###################
$app->post("/admin/deliveries/create", function () {

    User::verifyLogin();

    $user = User::userSession();

    $delivery = new Delivery();

    $delivery->setData(array(
        "iduser"    => $user['iduser'],
        "desqrcode" => 'QRCODE',
    ));

    $delivery->setData($_POST);

    //var_dump($delivery);

    $delivery->save();

    header("Location: /admin/deliveries");
    exit;

});
##################### ROTA DELIVERY UPDATE #####################
$app->get('/admin/deliveries/:iddemand', function ($iddemand) {

    User::verifyLogin();

    $delivery = new Delivery();

    $delivery->get((int) $iddemand);

    $page = new PageAdmin();

    $page->setTpl("deliveries-update", array(
        "delivery" => $delivery->getValues(),
    ));

});
################## ROTA GERA-PDF ###################
$app->get("/admin/deliveries/print/:iddemand", function ($iddemand) {

    User::verifyLogin();

    $data = new Delivery();

    $data->get((int) $iddemand);

    $datetime = date('d/m/Y H:i:s');

    $dayW = $data->dateW();

    //var_dump($data["deskid"]);

    /*for ( $a=0; count($data)<$a; $a++ ) {
    echo $data['idkid'][$a];
    }*/

    $page = new PageAdmin([
        "header" => false,
        "footer" => false,
    ]);

    $page->setTpl("print", [
        "data"    => $data->getValues(),
        "dateNow" => $datetime,
        "dayW"    => $dayW,

    ]);

});
