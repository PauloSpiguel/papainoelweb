<?php

use \NewTech\PageAdmin;
use \NewTech\DB\Sql;
use \NewTech\Model\User;
use \NewTech\Model\Delivery;
use \NewTech\Model\Local;


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

    $locals = Local::listAll();

    $user = User::userSession();

    $page = new PageAdmin();

    $page->setTpl("deliveries-create", [
        "locals" => $locals
    ]);

});
################## ROTA DELIVERY-CRETE ###################
$app->post("/admin/deliveries/create", function () {

    User::verifyLogin();

    $user = User::userSession();

    $delivery = new Delivery(); 

    $delivery->setData(array(
        "iduser" => $user['iduser']
    ));

    $delivery->setData($_POST);

    var_dump($delivery);

    $delivery->save();  

    //header("Location: /admin/deliveries");
    //exit;

});

?>