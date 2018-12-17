<?php

use \chillerlan\QRCode\QRCode;
use \chillerlan\QRCode\QROptions;
use \NewTech\Model\Delivery;
use \NewTech\Model\Local;
use \NewTech\Model\User;
use \NewTech\PageAdmin;
##################### ROTA DELETE DELIVERIES #####################
$app->get('/admin/deliveries/:iddemand/delete', function ($iddemand) {

    User::verifyLogin();

    $delivery = new Delivery();

    $delivery->get((int) $iddemand);

    $delivery->delete();

    header("Location: /admin/deliveries");
    exit;

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
##################### ROTA LOAD-DELIVERY UPDATE #####################
$app->get('/admin/deliveries/:iddemand', function ($iddemand) {

    User::verifyLogin();

    $delivery = new Delivery();

    $locals = Local::listAll();

    $delivery->get((int) $iddemand);

    $page = new PageAdmin();

    $page->setTpl("deliveries-update", array(
        "delivery" => $delivery->getValues(),
        "locals"   => $locals,
    ));

});
##################### ROTA SAVE-UPDATE DELIVERY #####################
$app->post('/admin/deliveries/:iduser', function ($iddemand) {

    User::verifyLogin();

    $user = User::userSession();

    $delivery = new Delivery();

    $delivery->get((int) $iddemand);

    $delivery->setData($_POST);

    //$delivery->setData(array(
    // "iduser"    => $user['iduser'],
    //"desqrcode" => 'QRCODE'
    //));

    //var_dump($delivery);

    $delivery->update();

    header("Location: /admin/deliveries");
    exit;

});
################## ROTA GERA-PDF ###################
$app->get("/admin/deliveries/print/:iddemand", function ($iddemand) {

    User::verifyLogin();

    $data = new Delivery();

    $data->get((int) $iddemand);

    $datetime = date('d/m/Y H:i:s');

    $dayW = $data->dateW();

    $options = new QROptions([
        'version'    => 5,
        'outputType' => QRCode::OUTPUT_IMAGE_PNG,
        'eccLevel'   => QRCode::ECC_L,
    ]);

    $qrData = $data->getdeskid() .
        " Autenticação de senha.
    Prefeitura de Centenário do Sul";
// invoke a fresh QRCode instance
    $qrcode = new QRCode($options);

// and dump the output
    $qrcode->render($qrData);

// ...with additional cache file
    $qrcode->render($qrData, 'res/admin/dist/img/qrcode.png');

    //echo utf8_encode($data->getdesperson());//Pega informações do gets

    $page = new PageAdmin([
        "header" => false,
        "footer" => false,
    ]);

    $page->setTpl("print", [
        "data"    => $data->getValues(),
        "dateNow" => $datetime,
        "dayW"    => $dayW,
        "qrcode"  => $qrcode,
    ]);

});
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
